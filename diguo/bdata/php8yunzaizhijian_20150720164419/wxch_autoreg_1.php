<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_autoreg`;");
E_C("CREATE TABLE `wxch_autoreg` (
  `autoreg_id` tinyint(1) NOT NULL,
  `autoreg_rand` tinyint(1) unsigned NOT NULL,
  `autoreg_name` varchar(200) NOT NULL,
  `autoreg_content` text NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`autoreg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `wxch_autoreg` values('1','6','tianma_','您的账号已经注册成功\r\n用户名：{\$user_name}\r\n密码：{\$password}','1');");

require("../../inc/footer.php");
?>