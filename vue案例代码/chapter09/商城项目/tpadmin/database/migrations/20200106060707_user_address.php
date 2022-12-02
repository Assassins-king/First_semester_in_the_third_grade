<?php

use think\migration\Migrator;
use think\migration\db\Column;

class UserAddress extends Migrator
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
            'user_address',
            ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn(
            'user_user_id',
            'integer',
            ['null' => false, 'default' => 0,  'comment' => '用户id']
        )
        ->addColumn(
            'name',
            'string',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '收件人']
        )
        ->addColumn(
            'tel',
            'string',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '联系电话']
        )
        ->addColumn(
            'area',
            'string',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '所在地区']
        )
        ->addColumn(
            'detail',
            'string',
            ['limit' => 100, 'null' => false, 'default' => '', 'comment' => '详细地址']
        )
        ->addTimestamps()
        ->create();
    }    
}
