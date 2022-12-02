<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Topic extends Migrator
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
            'topic',
            ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn(
            'title',
            'string',
            ['limit' => 100, 'null' => false, 'default' => '', 'comment' => '标题']
        )
        ->addColumn(
            'category_id',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '分类id']
        )
        ->addColumn(
            'content',
            'text',
            ['null' => false, 'comment' => '主题内容']
        )
        ->addColumn(
            'user_id',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '用户id']
        )
        ->addColumn(
            'is_show',
            'boolean',
            ['null' => false, 'default' => 0, 'comment' => '是否显示']
        )
        ->addColumn(
            'hits',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '点击量']
        )
        ->addColumn(
            'likenum',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '点赞量']
        )
        ->addTimestamps()
        ->create();
    }    
}
