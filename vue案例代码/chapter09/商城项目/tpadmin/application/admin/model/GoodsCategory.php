<?php
namespace app\admin\model;

use app\common\library\Tree;
use think\Model;

class GoodsCategory extends Model
{
    public static function tree()
    {
        $model = new self;
        $data = $model->order('sort', 'asc')->select()->toArray();
        return new Tree($data);
    }
}
