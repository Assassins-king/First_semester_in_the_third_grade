<?php
namespace app\api\model;

use think\Model;

class UserOrder extends Model
{
    public function userOrderGoods()
    {
        return $this->hasMany('UserOrderGoods');
    }
}
