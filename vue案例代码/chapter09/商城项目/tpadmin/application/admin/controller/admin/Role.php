<?php
namespace app\admin\controller\admin;

use app\admin\controller\Common;
use app\admin\model\AdminRole as RoleModel;
use app\admin\validate\AdminRole as RoleValidate;

class Role extends Common
{
    public function index()
    {
        $role = RoleModel::all();
        $this->assign('role', $role);
        return $this->fetch();
    }

    public function edit()
    {
        $id = $this->request->param('id/d', 0);
        $data = ['name' => ''];
        if ($id) {
            if (!$data = RoleModel::get($id)) {
                $this->error('记录不存在。');
            }
        }
        $this->assign('data', $data);
        $this->assign('id', $id);
        return $this->fetch();
    }

    public function save()
    {
        $id = $this->request->post('id/d', 0);
        $data = [
            'name' => $this->request->post('name/s', '')
        ];
        $validate = new RoleValidate();
        if ($id) {
            if (!$validate->check($data)) {
                $this->error('修改失败，' . $validate->getError() . '。');
            }
            if (!$role = RoleModel::get($id)) {
                $this->error('修改失败，记录不存在。');
            }
            $role->save($data);
            $this->success('修改成功。');
        }
        if (!$validate->check($data)) {
            $this->error('添加失败，' . $validate->getError() . '。');
        }
        RoleModel::create($data);
        $this->success('添加成功。');
    }

    public function delete()
    {
        $id = $this->request->param('id/d', 0);
        $validate = new RoleValidate();
        if (!$validate->scene('delete')->check(['id' => $id])) {
            $this->error('删除失败，' . $validate->getError() . '。');
        }
        // if (!$role = RoleModel::get($id)) {
        //     $this->error('删除失败，记录不存在。');
        // }
        // $role->delete();
        // $this->success('删除成功。');

        if (!$role = RoleModel::get($id, 'adminPermission')) {
            $this->error('删除失败，记录不存在。');
        }
        $role->together('admin_permission')->delete();
        $this->success('删除成功。');
    }
}
