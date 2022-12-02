<?php
namespace app\admin\validate;

use app\admin\model\AdminRole as RoleModel;
use app\admin\model\AdminUser as UserModel;
use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require|max:32',
        'password' => 'require|min:6',
    ];

    protected $message = [
        'username.require' => '用户名不能为空',
        'username.max' => '用户名最多为32个字符',
        'password.require' => '密码不能为空',
        'password.min' => '密码最少为6位',
        'captcha.require' => '验证码不能为空',
        'captcha.captcha' => '验证码有误',
        'username.unique' => '用户名已存在'
    ];

    public function sceneLogin()
    {
        return $this->append('captcha', 'require|captcha');
    }

    public function sceneInsert()
    {
        return $this->append('admin_role_id', 'checkAdminRoleId')
         ->append('username', 'unique:admin_user,username');
    }
    public function sceneUpdate()
    {
        return $this->append('admin_role_id', 'checkAdminRoleId')
        ->remove('password', 'require')
        ->append('username', 'unique:admin_user,username');
    }
    public function checkAdminRoleId($value, $rule)
    {
        if (!RoleModel::field('id')->get($value)) {
            return '角色不存在';
        }
        return true;
    }
}
