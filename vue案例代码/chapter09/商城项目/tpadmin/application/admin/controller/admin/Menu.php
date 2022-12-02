<?php
namespace app\admin\controller\admin;

use app\admin\model\AdminMenu as MenuModel;
use app\admin\validate\AdminMenu as MenuValidate;
use app\admin\controller\Common;

class Menu extends Common
{
    public function index()
    {
        $menu = MenuModel::tree()->getTreeList();
        $this->assign('menu', $menu);
        return $this->fetch();
    }

    public function sort()
    {
        $sort = $this->request->post('sort/a', []);
        $data = [];
        foreach ($sort as $k => $v) {
            $data[] = ['id' => (int)$k, 'sort' => (int)$v];
        }
        $menu = new MenuModel;
        $menu->saveAll($data);
        $this->success('改变排序成功。');
    }

    public function edit()
    {
        $id = $this->request->param('id/d', 0);
        $data = ['pid' => 0, 'name' => '', 'icon' => '', 'controller' => '', 'sort' => 0];
        if ($id) {
            if (!$data = MenuModel::get($id)) {
                $this->error('记录不存在。');
            }
        }
        $menu = MenuModel::tree()->getTreeList();
        $this->assign('menu', $menu);
        $this->assign('data', $data);
        $this->assign('id', $id);
        return $this->fetch();
    }

    public function save()
    {
        $id = $this->request->post('id/d', 0);
        $data = [
            'pid' => $this->request->post('pid/d', 0),
            'sort' => $this->request->post('sort/d', 0),
            'name' => $this->request->post('name/s', ''),
            'icon' => $this->request->post('icon/s', '', 'trim'),
            'controller' => $this->request->post('controller/s', '', 'trim')
        ];
        // if ($id) {
        //     MenuModel::get($id)->save($data);
        //     $this->success('修改成功。');
        // }
        // MenuModel::create($data);
        // $this->success('添加成功。');
        $validate = new MenuValidate();
        if ($id) {
            if (!$validate->scene('update')->check(array_merge($data, ['id' => $id]))) {
                $this->error('修改失败，' . $validate->getError() . '。');
            }
            if (!$menu = MenuModel::get($id)) {
                $this->error('修改失败，记录不存在。');
            }
            $menu->save($data);
            $this->success('修改成功。');
        }
        if (!$validate->scene('insert')->check($data)) {
            $this->error('添加失败，' . $validate->getError() . '。');
        }
        MenuModel::create($data);
        $this->success('添加成功。');
    }

    public function delete()
    {
        $id = $this->request->param('id/d', 0);
        $validate = new MenuValidate();
        if (!$validate->scene('delete')->check(['id' => $id])) {
            $this->error('删除失败，' . $validate->getError() . '。');
        }
        if (!$menu = MenuModel::get($id)) {
            $this->error('删除失败，记录不存在。');
        }
        $menu->delete();
        $this->success('删除成功。');
    }
}
