<?php
namespace app\api\validate;

use think\Validate;

class UserOrder extends Validate
{
    protected $rule = [
        'note' => 'max:100'
    ];

    protected $message = [
        'note.max' => '订单备注不能超过100个字符',
    ];
}
