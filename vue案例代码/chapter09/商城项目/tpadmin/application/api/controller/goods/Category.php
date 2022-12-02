<?php
namespace app\api\controller\goods;

use app\api\model\GoodsCategory as CategoryModel;
use app\api\controller\Common;

class Category extends Common
{
    protected $checkLoginExclude = ['index'];
    
    public function index()
    {
        $category = CategoryModel::tree();
        $data = $category->getData();
        $data = array_map(function ($v) {
            $v['image'] = $this->imgUrl($v['image']);
            return $v;
        }, $data);
        $this->success('', null, $category->data($data)->getTree());
    }
}
