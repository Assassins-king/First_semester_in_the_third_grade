<?php
namespace app\admin\model;

use think\Model;

class AdminUser extends Model
{
    public function adminRole()
    {
        return $this->belongsTo('AdminRole');
    }

    public function setPasswordAttr($value)
    {
        $salt = md5(uniqid(microtime(), true));
        $this->data('salt', $salt);
        return md5(md5($value) . $salt);
    }

    public function adminPermission()
    {
        return $this->hasMany('AdminPermission', 'admin_role_id', 'admin_role_id');
    }
}
