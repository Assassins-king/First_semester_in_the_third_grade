<?php
namespace app\api\model;

use app\common\library\Tree;
use think\Model;

class GoodsCategory extends Model
{
    public static function tree()
    {
        $model = new self;
        $data = $model->field('id,name,pid,image')->order('sort', 'asc')->select()->toArray();
        return new Tree($data);
    }
}
