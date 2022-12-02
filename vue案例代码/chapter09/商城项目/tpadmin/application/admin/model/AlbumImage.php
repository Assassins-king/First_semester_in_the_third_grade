<?php
namespace app\admin\model;

use think\Model;

class AlbumImage extends Model
{
    public function album()
    {
        return $this->belongsTo('album');
    }
}
