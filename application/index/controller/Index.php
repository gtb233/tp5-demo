<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        $result = Db::name('data')->find(); // 取单条
        //dump($result);

        $this->assign([
            'name' => $name,
            'result' => $result
        ]);
        return $this->fetch();
    }

    public function req(Request $req)
    {
        // 获取当前URL地址 不含域名
        echo 'url: ' . $this->request->url() . '<br/>';
        echo 'url: ' . \request()->url() . '<br/>';
        echo 'url: ' . $req->url() . '<br/>';

        // 取参数，input()
        dump($req->param());
        echo 'name:'.$req->param('name');
        echo 'name:'. input('name/s', 'gt233');

        return '';
    }
}
