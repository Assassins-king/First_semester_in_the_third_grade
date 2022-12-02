<?php
namespace app\admin\validate;

use app\admin\model\GoodsCategory as CategoryModel;
use think\Validate;

class GoodsCategory extends Validate
{
    protected $rule = [
        'name' => 'require|max:32',
        'image' => 'max:255'
    ];

    protected $message = [
        'name.require' => '名称不能为空',
        'name.max' => '名称不能超过32个字符',
        'image.max' => '图片路径不能超过255个字符',
        'pid.different' => '不能选择自己作为上级分类'
    ];

    public function sceneInsert()
    {
        return $this->append('pid', 'checkPidIsTop');
    }

    public function sceneUpdate()
    {
        return $this->append('pid', 'checkPidIsTop')->append('pid', 'different:id');
    }

    public function checkIdIsLeaf($value, $rule)
    {
        $data = CategoryModel::field('id')->where('pid', $value)->find();
        return $data ? '存在子项' : true;
    }

    public function checkPidIsTop($value, $rule)
    {
        if ($value !== 0) {
            if (!$data = CategoryModel::field('pid')->get($value)) {
                return '上级分类不存在';
            }
            if ($data->pid) {
                return '上级分类不能使用子项';
            }
        }
        return true;
    }

    public function sceneDelete()
    {
        return $this->only(['id'])->append('id', 'checkIdIsLeaf');
    }
}
