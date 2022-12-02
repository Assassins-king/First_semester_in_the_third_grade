<?php

use think\migration\Seeder;

class Album extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $this->table('album')->insert([
           ['id' => 1, 'pid' => 0, 'path' => 'goods', 'name' => '商品图库', 'sort' => 1],
           ['id' => 2, 'pid' => 1, 'path' => 'goods/category_image', 'name' => '分类列表图', 'sort' => 1],
           ['id' => 3, 'pid' => 1, 'path' => 'goods/goods_image', 'name' => '商品列表图', 'sort' => 2],
           ['id' => 4, 'pid' => 1, 'path' => 'goods/goods_album', 'name' => '商品预览图', 'sort' => 3],
           ['id' => 5, 'pid' => 1, 'path' => 'goods/goods_editor', 'name' => '商品详情图', 'sort' => 4]
          ])->save();
    }
}
