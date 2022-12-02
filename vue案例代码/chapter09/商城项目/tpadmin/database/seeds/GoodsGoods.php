<?php

use think\migration\Seeder;

class GoodsGoods extends Seeder
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
        $data = [];
        for ($i = 1; $i <= 100; ++$i) {
            $data[] = ['id' => $i,  'name' => '商品' . $i, 'goods_category_id' => 2, 'content' => '', 'album' => '', 'status' => 1];
        }
        $this->table('goods_goods')->insert($data)->save();
    }
}
