<?php
namespace app\index\controller;

class HelloWord
{
    // 访问：index/hello_word/index
    public function index($name = 'World', $city = 'fz')
    {
        dump($name);
        dump($city);
        return '若未定义路由，直接使用全路径也可访问';
    }
}