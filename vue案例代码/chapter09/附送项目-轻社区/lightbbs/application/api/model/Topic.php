<?php
namespace app\api\model;

use think\Model;

class Topic extends Model
{
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
