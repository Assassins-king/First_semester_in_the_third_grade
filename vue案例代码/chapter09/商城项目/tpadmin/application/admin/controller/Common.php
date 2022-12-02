<?php
namespace app\admin\controller;

use app\admin\library\Auth;
// use think\facade\Validate;
use think\facade\Session;
use think\Controller;

class Common extends Controller
{
    protected $auth;
    protected $checkLoginExclude = [];

    protected function initialize()
    {
        if ($this->request->isPost()) {
            /*
            $token = ['X-CSRF-TOKEN' => $this->request->header('X-CSRF-TOKEN')];
            if (!Validate::token(null, 'X-CSRF-TOKEN', $token)) {
                $this->request->token('X-CSRF-TOKEN');
                $this->error('令牌已过期，请重新提交。');
            }
            $token = $this->request->token('X-CSRF-TOKEN');
            */
            if ($this->request->isPost()) {
                $token = $this->getToken();
                header('X-CSRF-TOKEN: ' . $token);
                if ($token !== $this->request->header('X-CSRF-TOKEN')) {
                    $this->error('令牌已过期，请重新提交。');
                }
            }
        }
        $this->auth = Auth::getInstance();
        $controller = $this->request->controller();
        $action = $this->request->action();
        if (in_array($action, $this->checkLoginExclude)) {
            return;
        }
        if (!$this->auth->isLogin()) {
            $this->error('您还没有登录。', 'Index/login');
        }
        // 在判断为已登录后，验证用户是否有权限访问
        if (!$this->auth->checkAuth($controller, $action)) {
            $this->error('您没有权限访问。');
        }
        $loginUser = $this->auth->getLoginUser();
        $this->assign('layout_login_user', ['id' => $loginUser['id'],  'username' => $loginUser['username']]);
        if (!$this->request->isAjax()) {
            $this->view->engine->layout('common/layout');
            $this->assign('layout_menu', $this->auth->menu($controller));
            $this->assign('layout_token', $this->getToken());
        }
    }

    public function getToken()
    {
        $token = Session::get('X-CSRF-TOKEN');
        if (!$token) {
            $token = md5(uniqid(microtime(), true));
            Session::set('X-CSRF-TOKEN', $token);
        }
        return $token;
    }
}
