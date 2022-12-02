<?php
namespace app\api\validate;

use think\Validate;

class UserAddress extends Validate
{
    protected $rule = [
        'name' => 'require|max:32',
        'tel' => 'require|max:32',
        'area' => 'require|max:32',
        'detail' => 'require|max:100'
    ];
    protected $message = [
        'name.require' => '收件人不能为空',
        'name.max' => '收件人不能超过32个字符',
        'tel.require' => '联系方式不能为空',
        'tel.max' => '联系方式不能超过32个字符',
        'area.require' => '所在地区不能为空',
        'area.max' => '所在地区不能超过32个字符',
        'detail.require' => '详细地址不能为空',
        'detail.max' => '详细地址不能超过100个字符',
    ];
}
