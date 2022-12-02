<?php
return [
    'version' => '0.1',
    'album' => [
        'save_path' => './static/uploads',
        'image_ext' => 'gif,jpg,jpeg,bmp,png',
    ],
    'album_thumb' => [
        // 配置格式为 “相册路径 => [类名, 方法名]”
        'goods/category_image' => [\app\admin\library\goods\AlbumImage::class, 'thumbCategoryImage'],
        'goods/goods_image' => [\app\admin\library\goods\AlbumImage::class, 'thumbGoodsImage'],
        'goods/goods_album' => [\app\admin\library\goods\AlbumImage::class, 'thumbGoodsAlbum']
    ],
    'goods' => [
        'album_image_id' => 3,
        'album_album_id' => 4,
        'album_editor_id' => 5
    ],
];
