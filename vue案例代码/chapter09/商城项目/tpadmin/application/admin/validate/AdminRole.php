<?php
namespace app\admin\validate;

use app\admin\model\AdminUser as UserModel;
use think\Validate;

class AdminRole extends Validate
{
    protected $rule = [
        'name' => 'require|max:32'
    ];
    
    protected $message = [
        'name.require' => '名称不能为空'
    ];

    public function sceneDelete()
    {
        return $this->only(['id'])->append('id', 'checkUserIsEmpty');
    }

    public function checkUserIsEmpty($value, $rule)
    {
        if (UserModel::field('id')->where('admin_role_id', $value)->find()) {
            return '该角色已被用户使用';
        }
        return true;
    }
}
