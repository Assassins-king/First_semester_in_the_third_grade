<?php

use think\migration\Seeder;

class AdminUser extends Seeder
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
        $salt = md5(uniqid(microtime(), true));
        $password = md5(md5('123456'). $salt);
        $this->table('admin_user')->insert([
          ['id' => 1, 'admin_role_id' => 1, 'username' => 'admin', 'password' => $password, 'salt' => $salt],
          ['id' => 2, 'admin_role_id' => 2, 'username' => 'test', 'password' => $password, 'salt' => $salt]
        ])->save();
    }
}
