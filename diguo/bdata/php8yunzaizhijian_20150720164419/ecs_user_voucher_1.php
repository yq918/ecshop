<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_user_voucher`;");
E_C("CREATE TABLE `ecs_user_voucher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `voucher_sn` varchar(120) NOT NULL DEFAULT '' COMMENT '兑换券编号',
  `coupon_sn` varchar(120) NOT NULL DEFAULT '' COMMENT '优惠券编号',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `use_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '使用者id',
  `voucher_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未兑换，1已兑换',
  `voucher_price` int(11) NOT NULL DEFAULT '0' COMMENT '兑换券金额',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `coupon_sn` (`coupon_sn`),
  KEY `voucher_sn` (`voucher_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员创建优惠券表';");


require("../../inc/footer.php");
?>