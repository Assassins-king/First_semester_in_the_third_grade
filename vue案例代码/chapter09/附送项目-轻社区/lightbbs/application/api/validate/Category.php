<?php
namespace app\api\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'name' => 'max:50',
        'sort' => 'number|max:99999999'
    ];

    protected $message = [
        'name.max' => '名称最多为50个字符',
        'sort.number' => '排序值为数字',
        'sort.max' => '排序值最大99999999',
    ];
}
