<?php
namespace app\api\controller;

use app\api\library\Auth;
use think\Controller;

class Common extends Controller
{
    protected $auth;
    protected $user;
    protected $checkLoginExclude = [];
    
    protected function initialize()
    {
        ini_set('session.use_cookies', 0);
        $this->auth = Auth::getInstance();
        $action = $this->request->action();
        if (in_array($action, $this->checkLoginExclude)) {
            return;
        }
        if (!$this->auth->isLogin()) {
            $this->result('', 2, '您还没有登录。');
        }
        $this->user = $this->auth->getLoginUser();
    }

    protected function imgUrl($img)
    {
        $domain = $this->request->domain();
        if ($img === '') {
            $img = $domain . '/static/api/goods/img/noimg.png';
        } else {
            $img = $domain . '/static/uploads/' . $img;
        }
        return $img;
    }
}
