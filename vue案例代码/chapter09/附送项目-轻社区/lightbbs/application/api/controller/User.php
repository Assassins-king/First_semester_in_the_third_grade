<?php
namespace app\api\controller;

use app\api\model\User as UserModel;
use app\api\validate\User as UserValidate;
use app\api\library\Email;
use think\Facade\Cache;
use think\Facade\Config;
use think\Image;

class User extends Common
{
    protected $checkLoginExclude = ['login', 'register', 'activateaccount'];
    protected $imageExt = 'gif,jpg,jpeg,bmp,png';
    protected $avatarDir = 'avatar';
    protected $tempDir = 'temp';
    protected $avatarWidth = 120;
    protected $avatarHeight = 120;

    public function register()
    {
        $data = [
            'name' => $this->request->post('name/s', 'trim'),
            'password' => $this->request->post('password/s'),
            'email' => $this->request->post('email/s', 'trim')
        ];
        $validate = new UserValidate();
        if (!$validate->scene('register')->check($data)) {
            $this->error('注册失败：' . $validate->getError() . '。');
        }
        $user = $this->auth->register($data);
        if (!$user) {
            $this->error('注册失败：' . $this->auth->getError() . '。');
        }
        $this->success('您已成功注册。', null, $user);
    }

    public function login()
    {
        $data = [
            'name' => $this->request->post('name/s', '', 'trim'),
            'password' => $this->request->post('password/s', '')
        ];
        $validate = new UserValidate;
        if (!$validate->check($data)) {
            $this->error('登录失败：' . $validate->getError() . '。');
        }
        $result = $this->auth->login($data['name'], $data['password']);
        if (!$result) {
            $this->error('登录失败：' . $this->auth->getError() . '。');
        }
        $this->success('登录成功。', null, $result);
    }

    public function userinfo()
    {
        $user = $this->auth->getLoginUser();
        $this->success('', null, [
            'id' => $user->id,
            'name' => $user->name,
            'is_active' => $user->is_active,
            'role' => $user->role
        ]);
    }

    public function logout()
    {
        $this->auth->logout();
    }

    public function profile()
    {
        $data = UserModel::field('id,name,email,is_active,role,img_url,create_time,update_time')->get($this->user->id);
        $data['img_url'] = $this->avatarUrl($data['img_url']);
        $this->success('', null, $data);
    }

    public function updateAvatar()
    {
        if (!$file = $this->request->file('image')) {
            $this->error('上传失败，没有文件上传。');
        }
        $tempPath = './' . $this->uploadPath . '/' . $this->tempDir;
        $info = $file->validate(['ext' => $this->imageExt])->rule(function () {
            return md5(microtime(true));
        })->move($tempPath . '/');
        if (!$info) {
            $this->error('上传失败，' . $file->getError());
        }
        $subDir = $this->avatarDir . date('/Y/m/d');
        $createPath = './' . $this->uploadPath . '/' . $subDir;
        if (!file_exists($createPath) && !mkdir($createPath, 0777, true)) {
            $this->error('上传失败，服务器无法创建保存目录。');
        }
        $saveName = $info->getSaveName();
        $tempFilePath = $tempPath . '/' . $saveName;
        $image = Image::open($tempFilePath);
        $avatarPath = $createPath . '/' . $saveName;
        $image->thumb($this->avatarWidth, $this->avatarHeight, Image::THUMB_FILLED)->save($avatarPath);
        unset($image);
        // unlink($tempFilePath);
        $user = UserModel::get($this->user->id);
        $user->img_url = $subDir . '/' . $saveName;
        $user->save();
        $this->success('头像修改成功。', null, [
            'img_url' => $this->avatarUrl($user->img_url)
        ]);
    }

    public function updatePassword()
    {
        $old_password = $this->request->post('old_password/s', '');
        $password = $this->request->post('password/s', '');
        $validate = new UserValidate;
        if (!$validate->scene('password')->check(['password' => $old_password])) {
            $this->error('修改失败，原密码格式有误：' . $validate->getError() . '。');
        }
        if (!$validate->scene('password')->check(['password' => $password])) {
            $this->error('修改失败，新密码格式有误：' . $validate->getError() . '。');
        }
        if ($old_password === $password) {
            $this->error('修改失败，原密码和新密码相同，请换一个新密码。');
        }
        $id = $this->user->id;
        $user = UserModel::get($id);
        if (!$user) {
            $this->error('修改失败，用户不存在。');
        }
        if ($user->password != $this->auth->passwordMD5($old_password, $user->salt)) {
            $this->error('修改失败，原密码不正确。');
        }
        $user->salt = $this->auth->salt();
        $user->password = $this->auth->passwordMD5($password, $user->salt);
        if (!$user->save()) {
            $this->error('修改密码失败。');
        }
        $this->success('修改密码成功。');
    }

    public function sendActivateEmail()
    {
        $id = $this->user->id;
        $limitMinute = Config::get('lightbbs.sendEmail.limitMinute');
        $maxRetry = Config::get('lightbbs.sendEmail.maxRetry');
        $time = Cache::get('send_activate_email_time_' . $id, 0);
        if ($time + $limitMinute * 60 > time()) {
            $this->error($limitMinute . '分钟内只能发送一次邮件。');
        }
        if (date('d', $time) !== date('d')) {
            Cache::set('send_activate_email_count_' . $id, 0);
        }
        $count = Cache::get('send_activate_email_count_' . $id, 0);
        if ($count >= $maxRetry) {
            $this->error('每天最多只能发送' . $maxRetry . '次邮件，您已经达到上限，请明天再试。');
        }
        Cache::set('send_activate_email_time_' . $id, time(), 86400);
        Cache::set('send_activate_email_count_' . $id, $count + 1, 86400);
        $user = UserModel::get($id);
        if (!$user) {
            $this->error('用户不存在。');
        }
        $key = md5(microtime(true));
        $url = Config::get('lightbbs.sendEmail.clientURL');
        $url .= '/activate_account?key=' . $key;
        $subject = '用户帐号激活';
        $body = '亲爱的' . $user->name . '：<br>感谢您在我站注册了新帐号。<br>请点击链接激活您的帐号。<br>';
        $body .= '<a href="' . $url . '" target="_blank">' . $url . '</a><br>';
        $body .= '如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。';
        $email = new Email();
        $res = $email->sendEmail($user->email, $user->name, $subject, $body);
        if ($res === true) {
            Cache::set('activate_email_url_' . $key, $user->id, 24 * 60 * 60);
        } else {
            $this->error('发送激活邮件失败，请联系网站管理员。');
        }
        $this->success('发送激活邮件成功，请登录您的邮箱查看。');
    }

    public function activateAccount()
    {
        $key = $this->request->post('key/s');
        $id = Cache::get('activate_email_url_' . $key);
        if (!$id) {
            $this->error('激活链接无效或已过期。');
        }
        $user = UserModel::get($id);
        if (!$user) {
            $this->error('用户不存在');
        }
        $user->is_active = 1;
        $user->save();
        $this->success('用户账号激活成功。');
    }

    public function updateEmail()
    {
        $data = [
            'email' => $this->request->post('email/s', ''),
            'password' => $this->request->post('password/s', '')
        ];
        $validate = new UserValidate;
        if (!$validate->scene('email')->check($data)) {
            $this->error('修改失败：' . $validate->getError() . '。');
        }
        $id = $this->user->id;
        $user = UserModel::get($id);
        if (!$user) {
            $this->error('修改失败，用户不存在。');
        }
        if ($user->password != $this->auth->passwordMD5($data['password'], $user->salt)) {
            $this->error('修改失败，原密码不正确。');
        }
        $user->is_active = 0;
        $user->email = $data['email'];
        if (!$user->save()) {
            $this->error('修改邮箱失败。');
        }
        $this->success('修改邮箱成功。');
    }
}
