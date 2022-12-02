<?php
namespace app\admin\library;

use app\admin\model\AdminUser as UserModel;
use app\admin\model\AdminMenu as MenuModel;
use think\facade\Session;

class Auth
{
    protected static $instance;
    protected $error;
    protected $sessionName = 'admin';
    protected $loginUser;

    public static function getInstance($options = [])
    {
        if (is_null(self::$instance)) {
            self::$instance = new static($options);
        }
        return self::$instance;
    }

    public function login($username, $password)
    {
        $user = UserModel::get(['username' => $username]);
        if (!$user) {
            $this->setError('用户不存在');
            return false;
        }
        if ($user->password != $this->passwordMD5($password, $user->salt)) {
            $this->setError('用户名或密码不正确');
            return false;
        }
        // 执行到此处说明用户名和密码正确，登录成功
        Session::set($this->sessionName, ['id' => $user->id]);
        return true;
    }

    public function isLogin()
    {
        // return Session::has($this->sessionName . '.id');
        return Session::has($this->sessionName . '.id') && $this->getLoginUser();
    }
    
    public function logout()
    {
        Session::delete($this->sessionName);
        return true;
    }

    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    public function getError()
    {
        return $this->error;
    }

    public function passwordMD5($password, $salt)
    {
        return md5(md5($password) . $salt);
    }
    
    public function menu($controller)
    {
        // return MenuModel::tree()->getTree(strtolower($controller));
        $user = $this->getLoginUser();
        $menu = MenuModel::tree();
        $data = $menu->getData();
        $result = [];
        foreach ($user['admin_permission'] as $v) {
            if ($v['controller'] === '*') {
                $result = $data;
                break;
            }
            foreach ($data as $vv) {
                if (strtolower($v['controller']) === strtolower($vv['controller'])) {
                    $result[] = $vv;
                    break;
                }
            }
        }
        return $menu->data($result)->getTree(strtolower($controller));
    }

    public function changePassword($password)
    {
        $id = Session::get($this->sessionName . '.id');
        userModel::get($id)->save(['password' => $password]);
    }

    public function getLoginUser($field = null)
    {
        if (!$this->loginUser) {
            $id = Session::get($this->sessionName . '.id');
            $this->loginUser = UserModel::with('adminPermission')->get($id);
        }
        return $field ? $this->loginUser[$field] : $this->loginUser;
    }

    public function checkAuth($controller, $action)
    {
        $user = $this->getLoginUser();
        foreach ($user['admin_permission'] as $v) {
            if ($v['controller'] === '*') {
                return true;
            }
            if (strtolower($v['controller']) === strtolower($controller)) {
                if ($v['action'] === '*') {
                    return true;
                }
                if (in_array($action, explode(',', $v['action']))) {
                    return true;
                }
            }
        }
        return false;
    }
}
