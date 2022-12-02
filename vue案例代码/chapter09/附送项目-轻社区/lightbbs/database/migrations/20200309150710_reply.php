<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Reply extends Migrator
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
            'reply',
            ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn(
            'topic_id',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '分类id']
        )
        ->addColumn(
            'user_id',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '用户id']
        )
        ->addColumn(
            'content',
            'text',
            ['null' => false, 'comment' => '回复内容']
        )
        ->addColumn(
            'is_show',
            'boolean',
            ['null' => false, 'default' => 0, 'comment' => '是否显示']
        )
        ->addTimestamps()
        ->create();
    }    
}
