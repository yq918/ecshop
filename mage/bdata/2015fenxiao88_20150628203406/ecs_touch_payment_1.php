<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_touch_payment`;");
E_C("CREATE TABLE `ecs_touch_payment` (
  `pay_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `pay_code` varchar(20) NOT NULL DEFAULT '',
  `pay_name` varchar(120) NOT NULL DEFAULT '',
  `pay_fee` varchar(10) NOT NULL DEFAULT '0',
  `pay_desc` text NOT NULL,
  `pay_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pay_config` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_cod` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_online` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pay_id`),
  UNIQUE KEY `pay_code` (`pay_code`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_touch_payment` values('4','cod','货到付款','0','开通城市：×××\r\n货到付款区域：×××','0','a:0:{}','1','1','0');");
E_D("replace into `ecs_touch_payment` values('5','balance','余额支付','0','使用帐户余额支付。只有会员才能使用，通过设置信用额度，可以透支。','0','a:0:{}','1','0','1');");
E_D("replace into `ecs_touch_payment` values('6','wxpay','微信支付','0','微信支付，是基于客户端提供的服务功能。同时向商户提供销售经营分析、账户和资金管理的功能支持。用户通过扫描二维码、微信内打开商品页面购买等多种方式调起微信支付模块完成支付。','0','a:6:{i:0;a:3:{s:4:\"name\";s:11:\"wxpay_appid\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"3423fwef\";}i:1;a:3:{s:4:\"name\";s:15:\"wxpay_appsecret\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:19:\"wefwefeeeeeeeeeewef\";}i:2;a:3:{s:4:\"name\";s:16:\"wxpay_paysignkey\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:9:\"34234fwef\";}i:3;a:3:{s:4:\"name\";s:15:\"wxpay_partnerid\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:16:\"feeeeeeeeeeeeeee\";}i:4;a:3:{s:4:\"name\";s:16:\"wxpay_partnerkey\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:15:\"fewwwwwwwwwwwww\";}i:5;a:3:{s:4:\"name\";s:14:\"wxpay_signtype\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:4:\"sha1\";}}','0','0','1');");
E_D("replace into `ecs_touch_payment` values('7','wx_new_jspay','新版本微信支付','0','本支付适用于新版本微信支付','0','a:5:{i:0;a:3:{s:4:\"name\";s:5:\"appid\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:5:\"56456\";}i:1;a:3:{s:4:\"name\";s:5:\"mchid\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:7:\"fewfwef\";}i:2;a:3:{s:4:\"name\";s:3:\"key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:5:\"34234\";}i:3;a:3:{s:4:\"name\";s:9:\"appsecret\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:4:\"fewf\";}i:4;a:3:{s:4:\"name\";s:4:\"logs\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}}','1','0','1');");

require("../../inc/footer.php");
?>