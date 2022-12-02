<?php
namespace app\admin\model;

use app\common\library\Tree;
use think\Model;

class Album extends Model
{
    public static function tree()
    {
        $data = self::order('sort', 'asc')->select()->toArray();
        return new Tree($data);
    }
}
