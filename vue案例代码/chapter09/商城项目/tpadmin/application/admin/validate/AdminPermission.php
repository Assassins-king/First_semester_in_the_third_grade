<?php
namespace app\admin\validate;

use app\admin\model\AdminRole as RoleModel;
use think\Validate;

class AdminPermission extends Validate
{
    protected $rule = [
        'controller' => 'require|max:32',
        'action' => 'require|max:255',
    ];

    protected $message = [
        'controller.require' => '控制器不能为空',
        'action.require' => '操作不能为空'
    ];

    public function sceneInsert()
    {
        return $this->append('admin_role_id', 'checkAdminRoleId');
    }

    public function sceneUpdate()
    {
        return $this->append('admin_role_id', 'checkAdminRoleId');
    }
    
    public function checkAdminRoleId($value, $rule)
    {
        if (!RoleModel::field('id')->get($value)) {
            return '角色不存在';
        }
        return true;
    }
}
