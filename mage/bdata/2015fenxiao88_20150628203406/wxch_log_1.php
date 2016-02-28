<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `wxch_log`;");
E_C("CREATE TABLE `wxch_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `info` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1");
E_D("replace into `wxch_log` values('1','2','fenxiao:1');");
E_D("replace into `wxch_log` values('2','2','fenxiao:2');");
E_D("replace into `wxch_log` values('3','2','fenxiao:2');");
E_D("replace into `wxch_log` values('4','2','fenxiao:2');");
E_D("replace into `wxch_log` values('5','2','fenxiao:2');");
E_D("replace into `wxch_log` values('6','2','fenxiao:2');");

require("../../inc/footer.php");
?>