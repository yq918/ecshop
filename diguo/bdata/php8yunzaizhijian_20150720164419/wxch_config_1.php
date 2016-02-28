<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_config`;");
E_C("CREATE TABLE `wxch_config` (
  `id` int(1) NOT NULL,
  `token` varchar(100) NOT NULL,
  `appid` char(18) NOT NULL,
  `appsecret` char(32) NOT NULL,
  `access_token` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `be_distributor` decimal(6,2) NOT NULL DEFAULT '100.00' COMMENT '成为分销商',
  `one_level_deduct` int(3) NOT NULL DEFAULT '0',
  `two_level_deduct` int(3) NOT NULL DEFAULT '0',
  `three_level_deduct` int(3) NOT NULL DEFAULT '0',
  `is_userdefine_subscribe` int(1) NOT NULL DEFAULT '0' COMMENT '是否自定义关注回复',
  `subscribe_guide_page` varchar(255) NOT NULL COMMENT '引导关注页网址',
  `app_name` varchar(50) NOT NULL COMMENT '公众号名称',
  `init_subscribe_user_counts` int(8) NOT NULL DEFAULT '0' COMMENT '初始化关注人数',
  `is_auto_deposit` int(1) NOT NULL DEFAULT '0' COMMENT '充值知否自动入账',
  `deposit_lower_limit` decimal(6,2) NOT NULL DEFAULT '1.00' COMMENT '充值最低限制',
  `is_auto_distribute` int(1) NOT NULL DEFAULT '0' COMMENT '是否自动分销',
  `is_distributor_limit` int(1) NOT NULL DEFAULT '1' COMMENT '自己关注能否成为分销商',
  `is_my_distribute_view` int(1) NOT NULL DEFAULT '1',
  `is_my_subscribe_view` int(1) NOT NULL DEFAULT '0',
  `home_page_style` int(1) NOT NULL DEFAULT '1',
  `withdraw_alert_msg` varchar(255) NOT NULL,
  `distribute_keywords` varchar(20) NOT NULL DEFAULT '分销',
  `withdraw_lower_limit` decimal(6,2) NOT NULL DEFAULT '100.00' COMMENT '提现底限',
  `distributor_name` varchar(20) NOT NULL DEFAULT '分销商',
  `one_level_member_name` varchar(20) NOT NULL DEFAULT '一级会员',
  `two_level_member_name` varchar(20) NOT NULL DEFAULT '二级会员',
  `three_level_member_name` varchar(20) NOT NULL DEFAULT '三级会员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `wxch_config` values('1','1111','11111111111','1111111111111111111111','EJI1woEkcRjAY_bMeXR7TkY-Cz3v8PSF9fzbF4RSCWv_XNRe-loUVqHaoLlUDOJa-JrFc7D_IKFVkqvyxL-KG3PCi96bnIRBg4CmeM0l4MM','1435241391','1.00','30','20','15','0','http://www.baidu.com','红枣帅锅','6244','1','10.00','1','1','1','0','1','','分销','100.00','分销商','一级会员','二级会员','三级会员');");

require("../../inc/footer.php");
?>