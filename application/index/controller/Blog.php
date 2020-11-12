<?php
namespace app\index\controller;

use think\facade\Url;

class Blog
{
    public function get($id)
    {
        return '查看id=' . $id . '的内容';
    }

    public function read($name)
    {
        return '查看name=' . $name . '的内容';
    }

    public function archive($year, $month)
    {
        return '查看' . $year . '/' . $month . '的归档内容';
    }

    public function urlTest()
    {
        // 输出 blog/thinkphp
        Url::build('blog/read', 'name=thinkphp') . PHP_EOL;
        Url::build('index/hello', ['name' => 'thinkphp']);
        // 输出 blog/5
        Url::build('blog/get', 'id=5');
        Url::build('blog/get', ['id' => 5]);
        // 输出 blog/2015/05
        Url::build('blog/archive', 'year=2015&month=05');
        Url::build('blog/archive', ['year' => '2015', 'month' => '05']);

        echo url('blog/read', 'name=thinkphp') . PHP_EOL;
        // 模板中使用时 {:url('blog/read', 'name=thinkphp')}

        return '123';
    }
}