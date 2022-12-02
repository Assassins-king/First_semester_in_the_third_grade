<?php
namespace app\api\controller;

use app\api\model\Category as CategoryModel;
use app\api\validate\Category as CategoryValidate;
use app\api\model\Topic as TopicModel;

class Category extends Common
{
    protected $checkAdmin = ['save', 'del'];

    public function index()
    {
        $data = CategoryModel::order('sort', 'desc')->select();
        $this->success('', null, $data);
    }

    public function save()
    {
        $id = $this->request->post('id/d', 0);
        $data = [];
        foreach (['sort' => '/d', 'name' => '/s'] as $name => $type) {
            $input = $this->request->post($name . $type, false);
            if ($input !== false) {
                $data[$name] = $input;
            }
        }
        $validate = new CategoryValidate();
        if (!$validate->check($data)) {
            $this->error('操作失败，' . $validate->getError() . '。');
        }
        if ($id) {
            if ($category = CategoryModel::get($id)) {
                $category->save($data);
                $this->success('修改成功。', null, ['id' => $id]);
            }
            $this->error('修改失败，记录不存在。');
        } else {
            $newId = CategoryModel::create($data);
            $this->success('添加成功。', null, ['id' => $newId]);
        }
    }

    public function del()
    {
        $id = $this->request->post('id/d', 0);
        if ($category = CategoryModel::get($id)) {
            $category->delete();
            TopicModel::where('category_id', $id)->update(['category_id' => 0]);
            $this->success('删除成功。');
        }
        $this->error('删除失败，记录不存在。');
    }
}
