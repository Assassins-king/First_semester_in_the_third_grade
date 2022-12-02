<?php
namespace app\api\library;

use app\api\model\User as UserModel;
use think\facade\Session;

class Auth
{
    protected static $instance;
    protected $sessionName = 'user';
    protected $loginUser;
    protected $error;

    public static function getInstance($options = [])
    {
        if (is_null(self::$instance)) {
            self::$instance = new static($options);
        }
        return self::$instance;
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

    public function register(array $data)
    {
        $data = array_merge([
            'salt' => $this->salt(),
            'password' => '',
            'is_active' => 0,
            'role' => 'user'
        ], $data);
        $data['password'] = $this->passwordMD5($data['password'], $data['salt']);
        $user = UserModel::create($data);
        Session::set($this->sessionName, ['id' => $user->id]);
        return [
            'session_id' => session_id(),
            'id' => $user->id,
            'name' => $user->name,
            'is_active' => $user->is_active,
            'role' => $user->role
        ];
    }

    public function salt()
    {
        return md5(microtime(true));
    }

    public function passwordMD5($password, $salt)
    {
        return md5(md5($password) . $salt);
    }

    public function login($name, $password)
    {
        $user = UserModel::get(['name' => $name]);
        if (!$user) {
            $this->setError('用户不存在');
            return false;
        }
        if ($user->password != $this->passwordMD5($password, $user->salt)) {
            $this->setError('用户名或密码不正确');
            return false;
        }
        Session::set($this->sessionName, ['id' => $user->id]);
        return [
            'session_id' => session_id(),
            'id' => $user->id,
            'name' => $user->name,
            'is_active' => $user->is_active,
            'role' => $user->role
        ];
    }

    protected function getSession()
    {
        if ($id = request()->header('Authorization')) {
            Session::init(['id' => $id]);
        }
        return Session::get($this->sessionName . '.id');
    }
    
    public function getLoginUser($field = null)
    {
        $id = $this->getSession();
        if (!$this->loginUser && $id) {
            $this->loginUser = UserModel::get($id);
        }
        return $field ? $this->loginUser[$field] : $this->loginUser;
    }

    public function logout()
    {
        return Session::delete($this->sessionName);
    }

    public function isLogin()
    {
        return $this->getLoginUser();
    }
}
