<?php
namespace app\api\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name' => 'require|min:3|max:25',
        'password' => 'require|min:6|max:18',
    ];

    protected $message = [
        'name.require' => '用户名不能为空',
        'name.min' => '用户名最少为3个字符',
        'name.max' => '用户名最多为25个字符',
        'password.require' => '密码不能为空',
        'password.min' => '密码最少为6位',
        'password.max' => '密码最多为18位',
        'email.email' => '邮箱格式有误',
        'email.max' => '邮箱最多128个字符',
        'name.unique' => '用户名已被注册，请换一个',
        'email.unique' => '邮箱已被注册，请换一个'
    ];

    public function sceneRegister()
    {
        return $this->append('email', 'require|email|max:128|unique:user')
          ->append('name', 'unique:user,name');
    }

    public function scenePassword()
    {
        return $this->remove('name');
    }

    public function sceneEmail()
    {
        return $this->remove('name')
          ->append('email', 'require|email|max:128|unique:user');
    }
}
