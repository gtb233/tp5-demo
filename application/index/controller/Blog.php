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

    public function baseTest()
    {
        $obj = new \stdClass();
        if ("0") echo '0'       ;  echo PHP_EOL.'<br/>';
        if (0.0) echo '0.0'     ;  echo PHP_EOL.'<br/>';
        if ("0.0") echo 'STR: 0.0'  ; echo PHP_EOL.'<br/>';
        if (null) echo 'null'   ;  echo PHP_EOL.'<br/>';
        if ([]) echo '[]'       ;  echo PHP_EOL.'<br/>';
        if ([0]) echo '[0]'     ;  echo PHP_EOL.'<br/>';
        if ($obj) echo 'stdClass'; echo PHP_EOL.'<br/>';
        echo 'empty'; echo PHP_EOL.'<br/>';

        echo PHP_EOL.'<br/>';

        // PHP8 变更为 数字与字符比较非严格下转成字符串比较
        echo 0 == "0" ? 1 : 0  ; echo PHP_EOL.'<br/>';
        echo 0 == "0.0" ? 1 : 0; echo PHP_EOL.'<br/>';
        echo 0 == "foo" ? 1 : 0; echo PHP_EOL.'<br/>';
        echo 0 == ""    ? 1 : 0; echo PHP_EOL.'<br/>';
        echo 42 == " 42"    ? 1 : 0; echo PHP_EOL.'<br/>';
        echo 42 == "42foo"    ? 1 : 0; echo PHP_EOL.'<br/>';

        $a = $b = 1;
        echo "sum:" . ($a + $b); echo PHP_EOL.'<br/>';


    }
}