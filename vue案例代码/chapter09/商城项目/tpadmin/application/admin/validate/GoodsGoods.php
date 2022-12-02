<?php
namespace app\admin\validate;

use app\admin\model\GoodsCategory as CategoryModel;
use think\Validate;

class GoodsGoods extends Validate
{
    protected $rule = [
        'name' => 'require|max:100',
        'sell_point' => 'max:255',
        'price' => 'regex:/^\d{1,8}(\.\d{1,2})?$/',
        'num' => 'number',
        'image' => 'max:255',
        'status' => 'between:0,1',
        'content' => 'max:65535',
        'album' => 'max:65535',
        'goods_category_id' => 'checkCategoryId'
    ];

    protected $message = [
        'name.require' => '名称不能为空',
        'name.max' => '名称不能超过100个字符',
        'sell_point.max' => '卖点不能超过255个字符',
        'price.regex' => '价格金额格式不合法，最多两位小数，最大99999999.99',
        'num.number' => '库存量不合法',
        'image.max' => '图片路径不能超过255个字符',
        'status.between' => '状态值不合法',
        'content.max' => '内容长度不能超过65535字节',
        'album.max' => '相册路径不能超过65535字节'
    ];

    public function checkCategoryId($value, $rule)
    {
        if ($value) {
            if (!$data = CategoryModel::field('pid')->get($value)) {
                return '所属分类不存在';
            }
            if ($data->pid === 0) {
                return '所属分类必须是二级分类';
            }
        }
        return true;
    }
    
    public function sceneChangeStatus()
    {
        return $this->only(['status']);
    }
}
