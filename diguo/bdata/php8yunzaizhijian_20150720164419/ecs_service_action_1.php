<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `ecs_service_action`;");
E_C("CREATE TABLE `ecs_service_action` (
  `action_id` int(10) NOT NULL AUTO_INCREMENT,
  `service_id` int(10) NOT NULL DEFAULT '0',
  `action_user` varchar(50) CHARACTER SET utf8 NOT NULL,
  `service_status` int(1) NOT NULL DEFAULT '0',
  `service_shipping_status` int(1) NOT NULL DEFAULT '0',
  `back_fee_status` int(11) NOT NULL DEFAULT '0',
  `action_place` int(1) NOT NULL DEFAULT '0',
  `action_note` varchar(500) CHARACTER SET utf8 NOT NULL,
  `log_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`action_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1");

require("../../inc/footer.php");
?>