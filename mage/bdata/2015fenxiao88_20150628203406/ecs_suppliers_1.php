<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_suppliers`;");
E_C("CREATE TABLE `ecs_suppliers` (
  `suppliers_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `suppliers_name` varchar(255) DEFAULT NULL,
  `suppliers_desc` mediumtext,
  `suppliers_wechat` varchar(50) NOT NULL,
  `suppliers_phone` varchar(50) NOT NULL,
  `suppliers_level` varchar(50) NOT NULL,
  `is_check` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`suppliers_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_suppliers` values('1','刘翔','军覅问哦即将覅噢潍坊','892999999','15677889090','一级代理','1');");

require("../../inc/footer.php");
?>