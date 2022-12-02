<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Album extends Migrator
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
            'album',
            ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn(
            'pid',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '上级id']
        )
        ->addColumn(
            'path',
            'string',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '路径']
        )
        ->addColumn(
            'name',
            'string',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '名称']
        )
        ->addColumn(
            'sort',
            'integer',
            ['null' => false, 'default' => 0, 'comment' => '排序值']
        )
        ->addTimestamps()
        ->create();
    }
}
