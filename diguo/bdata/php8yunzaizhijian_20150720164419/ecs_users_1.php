<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_users`;");
E_C("CREATE TABLE `ecs_users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL DEFAULT '',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` varchar(255) NOT NULL DEFAULT '',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `reg_type` int(1) NOT NULL DEFAULT '1' COMMENT '1 微信 2 网站 3 APP',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `frozen_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pay_points` int(10) unsigned NOT NULL DEFAULT '0',
  `rank_points` int(10) unsigned NOT NULL DEFAULT '0',
  `address_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `visit_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `user_rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_special` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ec_salt` varchar(10) DEFAULT NULL,
  `salt` varchar(10) NOT NULL DEFAULT '0',
  `parent_id` mediumint(9) NOT NULL DEFAULT '0',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(60) NOT NULL,
  `msn` varchar(60) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `office_phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `is_validated` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `credit_line` decimal(10,2) unsigned NOT NULL,
  `passwd_question` varchar(50) DEFAULT NULL,
  `passwd_answer` varchar(255) DEFAULT NULL,
  `wxid` varchar(255) NOT NULL,
  `wxch_bd` char(2) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `head_url` varchar(255) NOT NULL,
  `headpic_thumb` varchar(255) NOT NULL,
  `subscribe_time` int(10) NOT NULL,
  `is_subscribe` int(1) NOT NULL DEFAULT '0' COMMENT '是否关注',
  `affiliate_id` int(10) NOT NULL DEFAULT '0',
  `second_affiliate_id` int(10) NOT NULL DEFAULT '0',
  `third_affiliate_id` int(10) NOT NULL DEFAULT '0',
  `brokerage_all` decimal(8,2) NOT NULL DEFAULT '0.00',
  `brokerage_first` decimal(8,2) NOT NULL DEFAULT '0.00',
  `brokerage_second` decimal(8,2) NOT NULL DEFAULT '0.00',
  `brokerage_third` decimal(8,2) NOT NULL DEFAULT '0.00',
  `sales_all` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '分销销售额',
  `sales_first` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级销售额',
  `sales_second` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级销售额',
  `sales_third` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '三级销售额',
  `is_distributor` int(1) NOT NULL DEFAULT '0' COMMENT '是否为分销商',
  `be_distributor_time` int(10) NOT NULL DEFAULT '0',
  `real_name` varchar(50) NOT NULL COMMENT '真实姓名',
  `bank_name` varchar(50) NOT NULL COMMENT '开户行',
  `bank_account` varchar(100) NOT NULL COMMENT '银行账号',
  `aite_id` varchar(40) NOT NULL COMMENT '第三方登陆标识',
  `password_tianxin` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `email` (`email`),
  KEY `parent_id` (`parent_id`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>