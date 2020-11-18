<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Users extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

    }

    public function up()
    {
        $sql = "CREATE TABLE `message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '消息类型 1普通消息 2公告 3组队',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `content` varchar(1000) NOT NULL DEFAULT '' COMMENT '内容',
  `icon` varchar(200) NOT NULL DEFAULT '' COMMENT '图标地址  单图标',
  `inviter` int(11) NOT NULL DEFAULT '0' COMMENT '邀请者 （类型为 3 组队时，此为用户ID）',
  `receiver` int(11) NOT NULL DEFAULT '0' COMMENT '接收者 -1 所有人  >0 用户ID',
  `mgid` int(11) NOT NULL DEFAULT '0' COMMENT '操作者（后台管理员ID）',
  `attachment_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '附件类型  （0无 1金币',
  `attachment_val` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '附件值 数值，保留两位小数',
  `game_id` int(11) NOT NULL DEFAULT '0' COMMENT '游戏ID',
  `room_id` int(11) NOT NULL DEFAULT '0' COMMENT '房间ID',
  `is_del` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除  1已删除',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`mid`),
  KEY `idx_receiver` (`receiver`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='消息表';
CREATE TABLE `message_attac_log` (
  `mid` int(11) NOT NULL COMMENT '消息ID',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '提取附件的 用户ID',
  `attac_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '附件类型  （1金币',
  `attac_val` decimal(10,2) NOT NULL COMMENT '附件值 ',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '提取时间',
  PRIMARY KEY (`mid`,`uid`),
  KEY `idx_m_u_type` (`mid`,`uid`,`attac_type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='附件提取记录表';
CREATE TABLE `message_read_log` (
  `mid` int(11) NOT NULL COMMENT '消息ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `create_time` int(11) NOT NULL COMMENT '用户消息查看时间 默认0',
  PRIMARY KEY (`mid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
";
        $this->execute($sql);
    }
}
