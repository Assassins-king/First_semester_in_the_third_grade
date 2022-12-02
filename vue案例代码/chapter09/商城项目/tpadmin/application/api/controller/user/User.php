<?php
namespace app\api\controller\user;

use app\api\controller\Common;
use app\api\validate\UserUser as UserValidate;

class User extends Common
{
    protected $checkLoginExclude = ['login', 'register'];

    public function login()
    {
        $data = [
            'username' => $this->request->post('username/s', '', 'trim'),
            'password' => $this->request->post('password/s', '')
        ];
        $validate = new UserValidate;
        if (!$validate->check($data)) {
            $this->error('登录失败：' . $validate->getError() . '。');
        }
        $result = $this->auth->login($data['username'], $data['password']);
        if (!$result) {
            $this->error('登录失败：' . $this->auth->getError() . '。');
        }
        $this->success('登录成功', null, $result);
    }

    public function userinfo()
    {
        $user = $this->auth->getLoginUser();
        $this->success('', null, [
            'id' => $user['id'],
            'username' => $user['username']
        ]);
    }

    public function logout()
    {
        $this->auth->logout();
    }

    public function register()
    {
        $data = [
            'username' => $this->request->post('username/s', '', 'trim'),
            'password' => $this->request->post('password/s', ''),
            'email' => $this->request->post('email/s', '')
        ];
        $validate = new UserValidate;
        if (!$validate->scene('register')->check($data)) {
            $this->error('注册失败：' . $validate->getError() . '。');
        }
        $result = $this->auth->register($data);
        if (!$result) {
            $this->error('注册失败：' . $this->auth->getError() . '。');
        }
        $this->success('注册成功', null, $result);
    }
}
