<?php
namespace app\common\model;

use think\Model;

class User extends Model
{
    // 规则匹配时 默认不需要设置，若特殊表名可自定义
    // 设置完整的数据表（包含前缀）
    //protected $table = 'think_user';

    // 设置数据表（不含前缀）
    //protected $name = 'member';

    // 设置单独的数据库连接
    /*protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'test',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => '',
        // 数据库连接端口
        'hostport'    => '',
        // 数据库连接参数
        'params'      => [],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'think_',
        // 数据库调试模式
        'debug'       => true,
    ];*/

    // 验证规则
    protected $rule = [
        'nickname' => 'require|min:5|token',
        'email'    => 'require|email',
        'birthday' => 'dateFormat:Y-m-d',
    ];

    // 定义时间戳字段名, 开启自动更新时间戳时
//    protected $createTime = 'create_at';
//    protected $updateTime = 'update_at';

    protected $dateFormat = 'Y/m/d'; // 等同于 读取器
    protected $type       = [ //等同于  修改器
        // 设置birthday为时间戳类型（整型）
        'birthday' => 'timestamp',
    ];

    // 自动写入时间戳
    protected $autoWriteTimestamp = false;

//    // birthday读取器. 读取器命名规范：get + 属性名的驼峰命名+ Attr
//    protected function getBirthdayAttr($birthday)
//    {
//        return date('Y-m-d H:i:s', $birthday);
//    }
//
//    /**
//     * 定义不存在的属性，与原始分开处理不同需求返回
//     * @param $value
//     * @param array $data  表示传入所有的属性数据
//     * @return false|string
//     */
//    protected function getUserBirthdayAttr($value,$data)
//    {
//        return date('Y-m-d', $data['birthday']);
//    }
//
//    // birthday修改器, set + 属性名的驼峰命名+ Attr
//    protected function setBirthdayAttr($value)
//    {
//        return strtotime($value);
//    }
}