<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `ecs_service_goods`;");
E_C("CREATE TABLE `ecs_service_goods` (
  `rec_id` int(10) NOT NULL AUTO_INCREMENT,
  `service_id` int(8) NOT NULL DEFAULT '0',
  `goods_id` int(8) NOT NULL DEFAULT '0',
  `goods_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `goods_sn` varchar(50) CHARACTER SET utf8 NOT NULL,
  `product_id` int(6) NOT NULL DEFAULT '0',
  `goods_number` int(5) NOT NULL DEFAULT '1',
  `market_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `goods_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `goods_attr` text CHARACTER SET utf8 NOT NULL,
  `send_number` int(5) NOT NULL DEFAULT '1',
  `is_real` int(1) NOT NULL DEFAULT '1',
  `goods_type` int(1) NOT NULL DEFAULT '0' COMMENT '????  ????',
  `extension_code` varchar(50) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(5) NOT NULL DEFAULT '0',
  `is_gift` int(5) NOT NULL DEFAULT '0',
  `goods_attr_id` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1");

require("../../inc/footer.php");
?>