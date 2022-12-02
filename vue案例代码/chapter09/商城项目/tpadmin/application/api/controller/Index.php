<?php
namespace app\api\controller;

use app\admin\model\AlbumImage as ImageModel;

class Index extends Common
{
    protected $checkLoginExclude = ['imglist'];
    
    public function imglist()
    {
        $data = ImageModel::field('id,path')->where('album_id', 6)->order('id', 'desc')->select()->toArray();
        $result = [];
        $baseUrl = $this->request->domain() . '/static/uploads/goods/swiper/';
        foreach ($data as $v) {
            $result[] = [
                'id' => $v['id'],
                'img' => $baseUrl . $v['path']
            ];
        }
        $this->success('', null, $result);
    }
}
