<?php
namespace app\api\model;

use think\Model;

class UserOrderGoods extends Model
{
    public function goodsGoods()
    {
        return $this->belongsTo('GoodsGoods');
    }
}
