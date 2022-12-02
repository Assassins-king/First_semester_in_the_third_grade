<?php

use think\migration\Seeder;

class AlbumSwiper extends Seeder
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
        $this->table('album')->insert([
            ['id' => 6, 'pid' => 1, 'path' => 'goods/swiper', 'name' => '轮播图', 'sort' => 5],
         ])->save();
        $this->table('album_image')->insert([
            ['id' => 71, 'album_id' => 6, 'admin_user_id' => 1, 'path' => '2019/09/17/eef7e476a7422fecd637217d85d77f68.jpg'],
            ['id' => 72, 'album_id' => 6, 'admin_user_id' => 1, 'path' => '2019/09/17/51a9f9975be5cc0e99e52ba8e055c6d0.jpg'],
            ['id' => 73, 'album_id' => 6, 'admin_user_id' => 1, 'path' => '2019/09/17/e21a4de87360bc2f354529920444a0f0.jpg'],
        ])->save();        
    }
}