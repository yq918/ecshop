<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_back_goods`;");
E_C("CREATE TABLE `ecs_back_goods` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `back_id` mediumint(8) unsigned DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `product_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `product_sn` varchar(60) DEFAULT NULL,
  `goods_name` varchar(120) DEFAULT NULL,
  `brand_name` varchar(60) DEFAULT NULL,
  `goods_sn` varchar(60) DEFAULT NULL,
  `is_real` tinyint(1) unsigned DEFAULT '0',
  `send_number` smallint(5) unsigned DEFAULT '0',
  `goods_attr` text,
  PRIMARY KEY (`rec_id`),
  KEY `back_id` (`back_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_back_goods` values('1','1','7','0','','臻白焕颜面膜',NULL,'ECS000007','1','1','');");
E_D("replace into `ecs_back_goods` values('2','2','7','0','','臻白焕颜面膜',NULL,'ECS000007','1','1','');");
E_D("replace into `ecs_back_goods` values('3','3','2','0','','白管---酵母美白面膜（独家配方）',NULL,'ffe','1','3','');");
E_D("replace into `ecs_back_goods` values('4','4','2','0','','白管---酵母美白面膜（独家配方）',NULL,'ffe','1','2','');");
E_D("replace into `ecs_back_goods` values('5','5','1','0','','逆龄提拉神仙水',NULL,'fe233','1','1','');");

require("../../inc/footer.php");
?>