<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_delivery_goods`;");
E_C("CREATE TABLE `ecs_delivery_goods` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `product_id` mediumint(8) unsigned DEFAULT '0',
  `product_sn` varchar(60) DEFAULT NULL,
  `goods_name` varchar(120) DEFAULT NULL,
  `brand_name` varchar(60) DEFAULT NULL,
  `goods_sn` varchar(60) DEFAULT NULL,
  `is_real` tinyint(1) unsigned DEFAULT '0',
  `extension_code` varchar(30) DEFAULT NULL,
  `parent_id` mediumint(8) unsigned DEFAULT '0',
  `send_number` smallint(5) unsigned DEFAULT '0',
  `goods_attr` text,
  PRIMARY KEY (`rec_id`),
  KEY `delivery_id` (`delivery_id`,`goods_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_delivery_goods` values('1','1','2','0','','白管---酵母美白面膜（独家配方）','恩如氏','ffe','1',NULL,'0','2','');");
E_D("replace into `ecs_delivery_goods` values('2','2','2','0','','柔润倍护美颈霜','魔力坊','ffe','1',NULL,'0','4','');");
E_D("replace into `ecs_delivery_goods` values('3','3','1','0','','红馆—蜗牛原液蚕丝面膜（独家配方）','魔力坊','fe233','1',NULL,'0','3','');");
E_D("replace into `ecs_delivery_goods` values('4','4','2','0','','白管---酵母美白面膜（独家配方）','魔力坊','ffe','1',NULL,'0','3','');");
E_D("replace into `ecs_delivery_goods` values('5','5','1','0','','逆龄提拉神仙水','魔力坊','fe233','1',NULL,'0','1','');");
E_D("replace into `ecs_delivery_goods` values('7','7','7','0','','臻白焕颜面膜','乐福尔','ECS000007','1',NULL,'0','1','');");
E_D("replace into `ecs_delivery_goods` values('8','8','7','0','','臻白焕颜面膜','乐福尔','ECS000007','1',NULL,'0','1','');");
E_D("replace into `ecs_delivery_goods` values('9','9','2','0','','白管---酵母美白面膜（独家配方）','魔力坊','ffe','1',NULL,'0','2','');");
E_D("replace into `ecs_delivery_goods` values('10','10','7','0','','臻白焕颜面膜','乐福尔','ECS000007','1',NULL,'0','1','');");
E_D("replace into `ecs_delivery_goods` values('11','11','1','0','','逆龄提拉神仙水','魔力坊','fe233','1',NULL,'0','3','');");
E_D("replace into `ecs_delivery_goods` values('12','11','7','0','','臻白焕颜面膜','乐福尔','ECS000007','1',NULL,'0','2','');");
E_D("replace into `ecs_delivery_goods` values('13','12','7','0','','臻白焕颜面膜','乐福尔','ECS000007','1',NULL,'0','1','');");
E_D("replace into `ecs_delivery_goods` values('14','13','10','6','ECS000010g_p6','甜心100测试商品','','ECS000010','1',NULL,'0','3','颜色:白色[10] \n大小:L[1] \n');");
E_D("replace into `ecs_delivery_goods` values('15','14','10','6','ECS000010g_p6','甜心100测试商品','','ECS000010','1',NULL,'0','1','颜色:白色[10] \n大小:L[1] \n');");
E_D("replace into `ecs_delivery_goods` values('16','15','10','6','ECS000010g_p6','甜心100测试商品','','ECS000010','1',NULL,'0','1','颜色:白色[10] \n大小:L[1] \n');");
E_D("replace into `ecs_delivery_goods` values('17','16','10','5','ECS000010g_p5','甜心100测试商品','','ECS000010','1',NULL,'0','1','颜色:蓝色[11] \n大小:M[2] \n');");

require("../../inc/footer.php");
?>