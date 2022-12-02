<?php

use think\migration\Migrator;
use think\migration\db\Column;

class UserUser extends Migrator
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
            'user_user',
            ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn(
            'username',
            'string',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '用户名']
        )
        ->addColumn(
            'password',
            'string',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '密码']
        )
        ->addColumn(
            'salt',
            'char',
            ['limit' => 32, 'null' => false, 'default' => '', 'comment' => '密码salt']
        )
        ->addColumn(
            'email',
            'char',
            ['limit' => 100, 'null' => false, 'default' => '', 'comment' => '邮箱']
        )
        ->addIndex(['username'], ['unique' => true])
        ->addTimestamps()
        ->create();
    }    
}
