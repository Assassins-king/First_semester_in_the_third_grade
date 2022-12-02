<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::group('api', function () {

    Route::get('imglist', 'api/Index/imglist');

    Route::post('login', 'api/user.User/login');

    Route::get('user', 'api/user.User/userinfo');

    Route::get('logout', 'api/user.User/logout');

    Route::post('register', 'api/user.User/register');

    Route::get('category', 'api/goods.Category/index');

    Route::get('goodslist', 'api/goods.Goods/index');

    Route::get('goodsinfo', 'api/goods.Goods/show');

    Route::get('shopcart', 'api/goods.Goods/shopcart');

    Route::post('address/save', 'api/user.Address/save');

    Route::get('address/edit', 'api/user.Address/edit');

    Route::get('address/def', 'api/user.Address/def');

    Route::get('address', 'api/user.Address/index');

    Route::post('address/del', 'api/user.Address/del');

    Route::post('order/create', 'api/user.Order/create');

    Route::get('order/list', 'api/user.Order/index');

    Route::get('order/show', 'api/user.Order/show');

    Route::post('order/cancel', 'api/user.Order/cancel');

    Route::get('news/list', 'api/goods.News/index');

    Route::get('news/show', 'api/goods.News/show');

    Route::get('photo/getimgcategory', 'api/goods.Photo/getimgcategory');

    Route::get('photo/getimages', 'api/goods.Photo/getimages');

    Route::get('photo/getimageInfo', 'api/goods.Photo/getimageInfo');

    Route::get('photo/getthumimages', 'api/goods.Photo/getthumimages');
})->allowCrossDomain();

return [
];
