<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `ecs_service`;");
E_C("CREATE TABLE `ecs_service` (
  `service_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '??',
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '???',
  `service_sn` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '????',
  `service_type` int(1) NOT NULL DEFAULT '1' COMMENT '????',
  `service_status` int(1) NOT NULL DEFAULT '0' COMMENT '????',
  `shipping_status` int(11) NOT NULL DEFAULT '0' COMMENT '?????',
  `back_fee_status` int(1) NOT NULL DEFAULT '0' COMMENT '????',
  `goods_counts` int(3) NOT NULL DEFAULT '1' COMMENT '????',
  `question_desc` text CHARACTER SET utf8 NOT NULL COMMENT '????',
  `service_desc` text CHARACTER SET utf8 NOT NULL,
  `shipping_id` int(5) NOT NULL DEFAULT '0' COMMENT '????',
  `invoice_no` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '????',
  `consignee` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '???',
  `address` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '??',
  `country` int(5) NOT NULL DEFAULT '0' COMMENT '??',
  `province` int(5) NOT NULL DEFAULT '0' COMMENT '??',
  `city` int(5) NOT NULL DEFAULT '0' COMMENT '??',
  `district` int(5) NOT NULL DEFAULT '9' COMMENT '??',
  `tel` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '??',
  `zipcode` varchar(50) CHARACTER SET utf8 NOT NULL,
  `shipping_fee` decimal(6,2) NOT NULL DEFAULT '0.00' COMMENT '????',
  `shipping_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '??????',
  `insure_fee` decimal(6,2) NOT NULL DEFAULT '0.00',
  `apply_back_fee` decimal(8,2) NOT NULL DEFAULT '0.00',
  `real_back_fee` decimal(8,2) NOT NULL DEFAULT '0.00',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '????',
  `confirm_time` int(10) NOT NULL DEFAULT '0' COMMENT '????',
  `shipping_time` int(10) NOT NULL DEFAULT '0' COMMENT '??????',
  `end_time` int(10) NOT NULL DEFAULT '0' COMMENT '??????',
  `action_user` varchar(50) NOT NULL COMMENT '??????',
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1");
E_D("replace into `ecs_service` values('1','2','4','S142223391310000','1','4','0','0','1','????????????????????2','????','0','','???2','','0','0','0','9','17890908989','','0.00','','0.00','0.00','0.00','1422233913','0','0','0','');");

require("../../inc/footer.php");
?>