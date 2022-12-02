<?php
namespace app\api\validate;

use think\Validate;

class UserUser extends Validate
{
    protected $rule = [
        'username' => 'require|max:32',
        'password' => 'require|min:6'
    ];

    protected $message = [
        'username.require' => '用户名不能为空',
        'username.max' => '用户名最多为32个字符',
        'password.require' => '密码不能为空',
        'password.min' => '密码最少为6位',
        'email.email' => '邮箱格式有误',
        'email.max' => '邮箱最多100个字符',
        'username.unique' => '用户名已存在'
    ];

    public function sceneRegister()
    {
        return $this->append('email', 'require|email|max:100')->append('username', 'unique:user_user,username');
    }
}
