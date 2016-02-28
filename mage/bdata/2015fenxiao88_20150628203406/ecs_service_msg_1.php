<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `ecs_service_msg`;");
E_C("CREATE TABLE `ecs_service_msg` (
  `msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL DEFAULT '0',
  `service_id` int(8) NOT NULL DEFAULT '0',
  `msg_content` varchar(500) CHARACTER SET utf8 NOT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1");

require("../../inc/footer.php");
?>