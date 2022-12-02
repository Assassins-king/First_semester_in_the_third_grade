<?php

use think\migration\Seeder;

class AdminPermission extends Seeder
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
        $this->table('admin_permission')->insert([
            ['id' => 1, 'admin_role_id' => 1, 'controller' => '*', 'action' => '*'],
            ['id' => 2, 'admin_role_id' => 2, 'controller' => 'index', 'action' => '*'],
            ['id' => 3, 'admin_role_id' => 2, 'controller' => 'admin', 'action' => 'index'],
            ['id' => 4, 'admin_role_id' => 2, 'controller' => 'admin.menu', 'action' => 'index'],
            ['id' => 5, 'admin_role_id' => 2, 'controller' => 'admin.role', 'action' => 'index']
          ])->save();
    }
}
