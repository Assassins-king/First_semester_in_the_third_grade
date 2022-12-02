<?php
namespace app\admin\controller;

use app\admin\validate\AdminUser as UserValidate;
use think\Controller;
use think\App;
use think\Db;

class Index extends Common
{
    protected $checkLoginExclude = ['login'];

    public function login()
    {
        if ($this->request->isPost()) {
            $data = [
                'username' => $this->request->post('username/s', '', 'trim'),
                'password' => $this->request->post('password/s', ''),
                'captcha' => $this->request->post('captcha/s', '', 'trim')
            ];
            // 验证表单
            $validate = new UserValidate;
            if (!$validate->scene('login')->check($data)) {
                $this->error('登录失败：' . $validate->getError() . '。');
            }
            // 执行到此处说明验证器验证成功
            if (!$this->auth->login($data['username'], $data['password'])) {
                $this->error('登录失败：' . $this->auth->getError() . '。');
            }
            $this->success('登录成功。');
        }
        // $this->assign('token', $this->request->token('X-CSRF-TOKEN'));
        $this->assign('token', $this->getToken());
        return $this->fetch();
    }

    public function index(App $app)
    {
        $this->assign('server_info', [
            'server_version' => $this->request->server('SERVER_SOFTWARE'),
            'thinkphp_version' => $app->version(),
            'mysql_version' => $this->getMySQLVer(),
            'server_time' => date('Y-m-d H:i:s', time()),
            'upload_max_filesize' => ini_get('file_uploads') ? ini_get('upload_max_filesize') : '已禁用',
            'max_execution_time' => ini_get('max_execution_time') . '秒'
        ]);
        return $this->fetch();
    }

    private function getMySQLVer()
    {
        $res = Db::query('SELECT VERSION() AS ver');
        return isset($res[0]) ? $res[0]['ver'] : '未知';
    }

    public function logout()
    {
        $this->auth->logout();
        $this->redirect('Index/login');
    }

    public function password()
    {
        if ($this->request->isPost()) {
            $password = $this->request->post('password/s', '');
            $this->auth->changePassword($password);
            $this->success('密码修改成功。');
        }
        return $this->fetch();
    }

    /*
    public function test1()
    {
        $this->success('成功');
    }

    public function test2()
    {
        $this->error('失败');
    }

    public function test1()
    {
        return $this->fetch();
    }

    public function test2()
    {
        return $this->fetch();
    }
    */
}
