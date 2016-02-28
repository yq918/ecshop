<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_pay_log`;");
E_C("CREATE TABLE `ecs_pay_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `order_amount` decimal(10,2) unsigned NOT NULL,
  `order_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_account_id` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_pay_log` values('1','1','196.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('2','2','294.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('3','3','294.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('4','4','198.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('5','2','200.00','1','0','0');");
E_D("replace into `ecs_pay_log` values('6','5','200.00','1','0','0');");
E_D("replace into `ecs_pay_log` values('7','6','392.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('8','7','98.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('9','8','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('10','9','196.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('11','10','100.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('12','11','100.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('13','12','100.00','0','1','0');");
E_D("replace into `ecs_pay_log` values('14','13','494.00','0','1','0');");
E_D("replace into `ecs_pay_log` values('15','14','100.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('16','15','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('17','16','98.00','0','1','0');");
E_D("replace into `ecs_pay_log` values('18','17','100.00','0','1','0');");
E_D("replace into `ecs_pay_log` values('19','18','100.00','0','1','0');");
E_D("replace into `ecs_pay_log` values('20','9','200.00','1','0','0');");
E_D("replace into `ecs_pay_log` values('21','19','200.00','1','0','0');");
E_D("replace into `ecs_pay_log` values('22','10','100.00','1','0','0');");
E_D("replace into `ecs_pay_log` values('23','20','100.00','1','0','0');");
E_D("replace into `ecs_pay_log` values('24','21','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('25','22','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('26','23','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('27','24','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('28','25','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('29','26','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('30','27','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('31','28','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('32','29','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('33','30','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('34','31','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('35','32','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('36','33','0.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('37','34','69.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('38','35','23.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('39','36','23.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('40','37','23.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('41','38','23.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('42','39','23.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('43','40','24.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('44','41','25.00','0','0','0');");
E_D("replace into `ecs_pay_log` values('45','42','26.00','0','0','0');");

require("../../inc/footer.php");
?>