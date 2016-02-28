<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_ip_log`;");
E_C("CREATE TABLE `ecs_ip_log` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `u_id` int(20) DEFAULT NULL,
  `state` int(2) DEFAULT '0',
  `phone_state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1329 DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>