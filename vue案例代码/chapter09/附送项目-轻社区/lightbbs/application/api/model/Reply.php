<?php
namespace app\api\model;

use think\Model;

class Reply extends Model
{
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
