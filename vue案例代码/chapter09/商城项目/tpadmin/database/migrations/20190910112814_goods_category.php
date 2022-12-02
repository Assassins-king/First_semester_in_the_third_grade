<?php

use think\migration\Migrator;
use think\migration\db\Column;

class GoodsCategory extends Migrator
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
            'goods_category',
            ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn(
            'pid',
            'integer',
            ['null' => false, 'default' => 0,  'comment' => '上级id']
        )
        ->addColumn(
            'name',
            'string',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '分类名']
        )
        ->addColumn(
            'sort',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '排序值']
        )
        ->addColumn(
            'image',
            'string',
            ['limit' => 255, 'null' => false, 'default' => '', 'comment' => '图片']
        )
        ->addTimestamps()
        ->create();
    }
}
