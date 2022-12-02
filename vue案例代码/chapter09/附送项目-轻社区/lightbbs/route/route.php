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
    Route::post('user/register', 'api/User/register');

    Route::post('user/login', 'api/User/login');

    Route::get('user/userinfo', 'api/User/userinfo');

    Route::post('user/logout', 'api/User/logout');

    Route::get('user/profile', 'api/User/profile');

    Route::post('user/updateAvatar', 'api/User/updateAvatar');

    Route::post('user/updatePassword', 'api/User/updatePassword');

    Route::post('user/sendActivateEmail', 'api/User/sendActivateEmail');

    Route::post('user/activateAccount', 'api/User/activateAccount');

    Route::post('user/updateEmail', 'api/User/updateEmail');

    Route::post('category/save', 'api/Category/save');

    Route::get('category/index', 'api/Category/index');

    Route::post('category/del', 'api/Category/del');

    Route::post('topic/save', 'api/Topic/save');

    Route::get('topic/list', 'api/Topic/index');

    Route::get('topic/show', 'api/Topic/show');

    Route::post('topic/del', 'api/Topic/del');

    Route::get('like/isLike', 'api/Like/isLike');

    Route::post('like/setLike', 'api/Like/setLike');

    Route::get('topic/best', 'api/Topic/best');

    Route::get('topic/new', 'api/Topic/newest');

    Route::post('reply/save', 'api/Reply/save');

    Route::get('reply/index', 'api/Reply/index');

    Route::post('reply/del', 'api/Reply/del');
})->allowCrossDomain();

return [

];
