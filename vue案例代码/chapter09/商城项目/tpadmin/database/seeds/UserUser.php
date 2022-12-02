<?php

use think\migration\Seeder;

class UserUser extends Seeder
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
        $password = md5(md5('123456') . $salt);
        $this->table('user_user')->insert([
            ['id' => 1, 'username' => 'test', 'password' => $password, 'salt' => $salt, 'email' => 'test@tpadmin.test'],
        ])->save();
    }    
}
