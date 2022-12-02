<?php

use think\migration\Seeder;

class AdminMenu extends Seeder
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
        $this->table('admin_menu')->insert([
            ['id' => 1, 'pid' => 0, 'name' => '首页', 'icon' => 'home', 'controller' => 'index', 'sort' => 1],
            ['id' => 2, 'pid' => 0, 'name' => '设置', 'icon' => 'cog', 'controller' => 'admin', 'sort' => 99],
            ['id' => 3, 'pid' => 2, 'name' => '菜单管理', 'icon' => 'list', 'controller' => 'admin.menu', 'sort' => 1],
            ['id' => 4, 'pid' => 2, 'name' => '角色管理', 'icon' => 'list-alt', 'controller' => 'admin.role', 'sort' => 2],
            ['id' => 5, 'pid' => 2, 'name' => '权限管理', 'icon' => 'tasks', 'controller' => 'admin.permission', 'sort' => 3],
            ['id' => 6, 'pid' => 2, 'name' => '用户管理', 'icon' => 'comments', 'controller' => 'admin.user', 'sort' => 4]
        ])->save();
        $this->table('admin_menu')->insert([
            ['id' => 7, 'pid' => 0, 'name' => '图库', 'icon' => 'book',
             'controller' => 'album', 'sort' => 2],
            ['id' => 8, 'pid' => 0, 'name' => '商品', 'icon' => 'list-alt',
             'controller' => 'goods', 'sort' => 3],
            ['id' => 9, 'pid' => 8, 'name' => '分类管理', 'icon' => 'list',
             'controller' => 'goods.category', 'sort' => 1],
            ['id' => 10, 'pid' => 8, 'name' => '商品管理', 'icon' => 'table',
             'controller' => 'goods.goods', 'sort' => 2],
            ['id' => 11, 'pid' => 8, 'name' => '回收站', 'icon' => 'trash-o',
             'controller' => 'goods.recycle', 'sort' => 3]
        ])->save();    
    }
}
