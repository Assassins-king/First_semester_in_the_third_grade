<?php
namespace app\api\validate;

use think\Validate;

class Topic extends Validate
{
    protected $rule = [
        'title' => 'require|max:100',
        'content' => 'checkText:65535'
    ];

    protected $message = [
        'title.require' => '标题不能为空',
        'title.max' => '标题最多为100个字符'
    ];

    protected function checkText($value, $rule)
    {
        return strlen($value) <= $rule ? true : '内容最多65535个字节';
    }
}
