<?php

use think\migration\Migrator;
use think\migration\db\Column;

class GoodsGoods extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table(
            'goods_goods',
            ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn(
            'goods_category_id',
            'integer',
            ['null' => false, 'default' => 0,  'comment' => '分类id']
        )
        ->addColumn(
            'name',
            'string',
            ['limit' => 100, 'null' => false, 'default' => '', 'comment' => '名称']
        )
        ->addColumn(
            'sell_point',
            'string',
            ['limit' => 255, 'null' => false, 'default' => '', 'comment' => '卖点']
        )
        ->addColumn(
            'price',
            'decimal',
            ['precision' => 10, 'scale' => 2, 'null' => false, 'default' => 0, 'comment' => '价格']
        )
        ->addColumn(
            'num',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '库存量']
        )
        ->addColumn(
            'image',
            'string',
            ['null' => false, 'default' => '', 'comment' => '图片']
        )
        ->addColumn(
            'status',
            'boolean',
            ['null' => false, 'default' => 0, 'comment' => '状态']
        )
        ->addColumn('content', 'text', ['null' => false, 'comment' => '详情'])
        ->addColumn('album', 'text', ['null' => false, 'comment' => '相册'])
        ->addColumn('delete_time', 'timestamp', ['null' => true, 'comment' => '删除时间'])
        ->addTimestamps()
        ->create();
    }
}
