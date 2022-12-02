<?php

use think\migration\Migrator;
use think\migration\db\Column;

class UserOrderGoods extends Migrator
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
            'user_order_goods',
            ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn(
            'user_order_id',
            'integer',
            ['null' => false, 'default' => 0,  'comment' => '订单id']
        )
        ->addColumn(
            'goods_goods_id',
            'integer',
            ['null' => false, 'default' => 0,  'comment' => '商品id']
        )
        ->addColumn(
            'count',
            'integer',
            ['null' => false, 'default' => 0,  'comment' => '购买数量']
        )
        ->addColumn(
            'price',
            'decimal',
            ['precision' => 10, 'scale' => 2, 'null' => false, 'default' => 0, 'comment' => '价格']
        )
        ->addTimestamps()
        ->create();
    }    
}
