<?php
namespace app\index\controller;

use app\common\model\User as userModel;

class User
{
    public function index()
    {
//        $list = UserModel::all();
//        $list = UserModel::all(['status' => 0]);
        $list = UserModel::all(function($query){
            $query->where('id', '<', 3)->order('id', 'desc');
        });
        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo date('Y/m/d', $user->birthday) . '<br/>';
            echo '----------------------------------<br/>';
        }
    }

    public function add()
    {
/*        $user           = new userModel;
        $user->nickname = '流年';
        $user->email    = 'thinkphp@qq.com';
        $user->birthday = strtotime('1977-03-05');
        if ($user->save()) {
            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        } else {
            return $user->getError();
        }
        // 实例化模型类后第一次执行的save操作都是执行的数据库insert，可强制强制执行数据更新操作
        // $user->isUpdate()->save();
*/

        $user['nickname'] = '看云5';
        $user['email']    = 'kancloud@qq.com';
        $user['birthday'] = strtotime('2015-04-02');
        if ($result = UserModel::create($user)) {
            return '用户[ ' . $result->nickname . ':' . $result->id . ' ]新增成功';
        } else {
            return '新增出错';
        }

    }

    public function update()
    {
        $id = input('id/d', 2); //

        /*$user           = UserModel::get($id);
        $user->nickname = '刘晨';
        $user->email    = 'liu21st@gmail.com';
        $user->save();*/
        // 查询返回的模型实例如果执行save操作都是执行的数据库update,
        // 强制进行数据新增操作
        //$user->isUpdate(false)->save();

        $user['id']       = (int) $id;
        $user['nickname'] = '刘晨2';
        $user['email']    = 'liu21st@gmail.com';
        UserModel::update($user);

        return '更新用户成功';

    }

    // 读取用户数据
    public function getInfo()
    {
        $id = input('id/d', 1); //

//        $user = UserModel::get($id); //返回对象
//        $user = UserModel::getByEmail('thinkphp@qq.com');
//        $user = UserModel::get(['nickname'=>'看云']);
        $user = UserModel::get(function($query){
            $query->where('nickname', '流年')->where('id', '<', 10)->order('id','desc');
        });
        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo $user['nickname'] . '<br/>'; // 系统为模型实现了ArrayAccess接口
        echo $user['email'] . '<br/>';
        echo $user->birthday . '<br/>';
//        echo $user->user_birthday  . '<br/>';
    }

    // 删除用户数据
    public function delete()
    {
        /*$user = UserModel::get(3);
        if ($user) {
            $user->delete();
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }*/

        $result = UserModel::destroy(3); // 用户不存在不报错
        if ($result) {
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }
    }
}