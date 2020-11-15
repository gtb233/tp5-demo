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

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

//Route::get('hello/:name', 'index/hello');

return [
    // 添加路由规则 路由到 index控制器的hello操作方法
//    'hello/[:name]' => 'index/index/hello',
//    'hello/[:name]$' => 'index/index/hello', // 完整匹配，路由必须一样时
//    'closure/[:name]' => function ($name) {
//        return $name;
//    },

    // 定义路由的请求类型和后缀
//    'test/[:name]' => ['index/hello', ['method' => 'get', 'ext' => 'html']],

    // 谜题规则
//    'blog/:year/:month' => ['blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{2}']],
//    'blog/:id'          => ['blog/get', ['method' => 'get'], ['id' => '\d+']],
//    'blog/:name'        => ['blog/read', ['method' => 'get'], ['name' => '\w+']],

    // 路由组
//    '[blog]' => [
//        ':year/:month' => ['blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{2}']],
//        ':id'          => ['blog/get', ['method' => 'get'], ['id' => '\d+']],
//        ':name'        => ['blog/read', ['method' => 'get'], ['name' => '\w+']],
//    ],

    // 复杂路由
//    'blog-<year>-<month>' => [ // /blog-2015-05
//        'blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{1,2}']
//    ],

//    // 全局变量规则定义
//    '__pattern__'         => [
//        'name'  => '\w+',
//        'id'    => '\d+',
//        'year'  => '\d{4}',
//        'month' => '\d{2}',
//    ],
//    // 路由规则定义
//    'blog/:id'            => 'blog/get',
//    'blog/:name'          => 'blog/read',
//    'blog-<year>-<month>' => 'blog/archive',

];
