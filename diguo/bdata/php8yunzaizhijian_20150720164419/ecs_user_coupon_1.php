<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_user_coupon`;");
E_C("CREATE TABLE `ecs_user_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_sn` varchar(120) NOT NULL DEFAULT '' COMMENT '优惠券编号',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `use_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '使用者id',
  `coupon_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '优惠券类型0未使用，1已使用,2已兑换',
  `coupon_price` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券金额',
  `coupon_note` varchar(120) NOT NULL DEFAULT '' COMMENT '优惠券备注来源：微信商城，淘宝，线下',
  `coupon_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '普通优惠券类型0，1打折卡',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣金额',
  `start_time` int(10) NOT NULL DEFAULT '0' COMMENT '有效开始时间',
  `end_time` int(10) NOT NULL DEFAULT '0' COMMENT '有效截止时间',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `coupon_sn` (`coupon_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='优惠券表';");


require("../../inc/footer.php");
?>