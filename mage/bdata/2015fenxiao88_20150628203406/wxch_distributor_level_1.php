<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `wxch_distributor_level`;");
E_C("CREATE TABLE `wxch_distributor_level` (
  `level_id` int(6) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '????',
  `level_sorts` int(3) NOT NULL DEFAULT '9' COMMENT '??',
  `one_level_deduct` int(5) NOT NULL DEFAULT '0' COMMENT '??????',
  `two_level_deduct` int(5) NOT NULL DEFAULT '0' COMMENT '??????',
  `three_level_deduct` int(5) NOT NULL DEFAULT '0' COMMENT '??????',
  `extra_deduct` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '??????',
  `buy_discount` int(3) NOT NULL DEFAULT '0' COMMENT '?????',
  `level_status` int(1) NOT NULL DEFAULT '1' COMMENT '????',
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1");

require("../../inc/footer.php");
?>