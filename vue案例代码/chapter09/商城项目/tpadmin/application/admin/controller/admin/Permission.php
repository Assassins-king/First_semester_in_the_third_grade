<?php
namespace app\admin\controller\admin;

use app\admin\controller\Common;
use app\admin\model\AdminRole as RoleModel;
use app\admin\model\AdminPermission as PermissionModel;
use app\admin\validate\AdminPermission as PermissionValidate;

class Permission extends Common
{
    public function index()
    {
        $admin_role_id = $this->request->param('admin_role_id/d', 1);
        $roles = RoleModel::all();
        $role = [];
        foreach ($roles as $v) {
            if ($v['id'] === $admin_role_id) {
                // var_dump($v->toArray());
                // var_dump($v->adminPermission->toArray());
                $role = $v;
                break;
            }
        }
        $this->assign('role', $role);
        $this->assign('roles', $roles);
        $this->assign('admin_role_id', $admin_role_id);
        return $this->fetch();
    }

    public function edit()
    {
        $id = $this->request->param('id/d', 0);
        $admin_role_id = $this->request->param('admin_role_id/d', 0);
        $data = ['admin_role_id' => $admin_role_id, 'controller' => '', 'action' => ''];
        if ($id) {
            if (!$data = PermissionModel::get($id)) {
                $this->error('记录不存在。');
            }
        }
        $role = RoleModel::all();
        $this->assign('role', $role);
        $this->assign('data', $data);
        $this->assign('id', $id);
        return $this->fetch();
    }

    public function save()
    {
        $id = $this->request->post('id/d', 0);
        $data = [
            'admin_role_id' => $this->request->post('admin_role_id/d', 0),
            'controller' => $this->request->post('controller/s', '', 'trim'),
            'action' => $this->request->post('action/s', '', 'trim')
        ];
        $validate = new PermissionValidate();
        if ($id) {
            if (!$validate->scene('update')->check($data)) {
                $this->error('修改失败，' . $validate->getError() . '。');
            }
            if (!$permission = PermissionModel::get($id)) {
                $this->error('修改失败，记录不存在。');
            }
            $permission->save($data);
            $this->success('修改成功。');
        }
        if (!$validate->scene('insert')->check($data)) {
            $this->error('添加失败，' . $validate->getError() . '。');
        }
        PermissionModel::create($data);
        $this->success('添加成功。');
    }

    public function delete()
    {
        $id = $this->request->param('id/d', 0);
        if (!$permission = PermissionModel::get($id)) {
            $this->error('删除失败，记录不存在。');
        }
        $permission->delete();
        $this->success('删除成功。');
    }
}
