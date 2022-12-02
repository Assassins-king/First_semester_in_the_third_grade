<?php
namespace app\admin\controller\admin;

use app\admin\controller\Common;
use app\admin\model\AdminUser as UserModel;
use app\admin\model\AdminRole as RoleModel;
use app\admin\validate\AdminUser as UserValidate;

class User extends Common
{
    public function index()
    {
        $user = UserModel::with('adminRole')->field(['password', 'salt'], true)->all();
        // var_dump($user->toArray());
        $this->assign('user', $user);
        return $this->fetch();
    }

    public function edit()
    {
        $id = $this->request->param('id/d', 0);
        $data = ['username' => '', 'admin_role_id' => 0];
        if ($id) {
            if (!$data = UserModel::get($id)) {
                $this->error('记录不存在。');
            }
        }
        $role = RoleModel::all();
        $this->assign('data', $data);
        $this->assign('role', $role);
        $this->assign('id', $id);
        return $this->fetch();
    }

    public function save()
    {
        $id = $this->request->post('id/d', 0);
        $data = [
            'username' => $this->request->post('username/s', '', 'trim'),
            'admin_role_id' => $this->request->post('admin_role_id/d', 0),
            'password' => $this->request->post('password/s', '')
        ];
        if ($id && $data['password'] === '') {
            unset($data['password']);
        }
        $validate = new UserValidate();
        if ($id) {
            if (!$validate->scene('update')->check(array_merge($data, ['id' => $id]))) {
                $this->error('修改失败，' . $validate->getError() . '。');
            }
            if (!$user = UserModel::get($id)) {
                $this->error('修改失败，记录不存在。');
            }
            $user->save($data);
            $this->success('修改成功。');
        }
        if (!$validate->scene('insert')->check($data)) {
            $this->error('添加失败，' . $validate->getError() . '。');
        }
        UserModel::create($data);
        $this->success('添加成功。');
    }

    public function delete()
    {
        $id = $this->request->param('id/d', 0);
        if (!$user = UserModel::get($id)) {
            $this->error('删除失败，记录不存在。');
        }
        $user->delete();
        $this->success('删除成功。');
    }
}
