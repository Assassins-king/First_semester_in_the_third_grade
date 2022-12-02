<?php
namespace app\api\controller;

use app\api\library\Auth;
use think\Controller;

class Common extends Controller
{
    protected $auth;
    protected $user;
    protected $checkLoginExclude = [];
    protected $uploadPath = 'static/uploads';
    protected $checkActive = [];
    protected $checkAdmin = [];

    protected function initialize()
    {
        $this->auth = Auth::getInstance();
        $action = $this->request->action();
        if (!in_array($action, $this->checkLoginExclude)) {
            if (!$this->auth->isLogin()) {
                $this->error('您还没有登录。');
            }
            $this->user = $this->auth->getLoginUser();
            if (!$this->user->is_active && in_array($action, $this->checkActive)) {
                $this->error('操作失败，您的账号还没有激活。');
            }
            if ($this->user->role !== 'admin' && in_array($action, $this->checkAdmin)) {
                $this->error('操作失败，您不是管理员。');
            }
        }
    }

    protected function avatarUrl($path = '')
    {
        $domain = $this->request->domain();
        if ($path === '') {
            return $domain . '/static/avatar/noimg.png';
        }
        return $domain . '/' . $this->uploadPath . '/' . $path;
    }
}
