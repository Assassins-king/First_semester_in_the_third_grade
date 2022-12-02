<?php
namespace app\api\validate;

use think\Validate;

class Reply extends Validate
{
    protected $rule = [
        'content' => 'checkText:65535'
    ];

    protected $message = [
    ];

    protected function checkText($value, $rule)
    {
        return strlen($value) <= $rule ? true : '内容最多65535个字节';
    }
}
