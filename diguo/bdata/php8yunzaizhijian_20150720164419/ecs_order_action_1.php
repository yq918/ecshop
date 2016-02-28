<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_order_action`;");
E_C("CREATE TABLE `ecs_order_action` (
  `action_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `action_user` varchar(30) NOT NULL DEFAULT '',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action_place` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action_note` varchar(255) NOT NULL DEFAULT '',
  `log_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`action_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_order_action` values('1','2','admin','1','0','0','0','','1418893290');");
E_D("replace into `ecs_order_action` values('2','1','admin','1','0','0','0','','1418893290');");
E_D("replace into `ecs_order_action` values('3','1','admin','5','5','0','0','huihu','1419099377');");
E_D("replace into `ecs_order_action` values('4','1','admin','1','1','0','1','','1419099425');");
E_D("replace into `ecs_order_action` values('5','1','admin','1','2','2','0','ff','1419099464');");
E_D("replace into `ecs_order_action` values('6','1','admin','1','2','2','0','[售后] fewfwef','1419099886');");
E_D("replace into `ecs_order_action` values('7','1','admin','1','2','2','0','[通过分销审核] ','1419110081');");
E_D("replace into `ecs_order_action` values('8','4','buyer','2','0','0','0','用户取消','1419562175');");
E_D("replace into `ecs_order_action` values('9','6','admin','1','0','0','0','dwdw','1419703653');");
E_D("replace into `ecs_order_action` values('10','6','admin','1','3','0','0','fefef','1419703659');");
E_D("replace into `ecs_order_action` values('11','6','admin','5','5','0','0','fef','1419703668');");
E_D("replace into `ecs_order_action` values('12','6','admin','1','1','0','1','fef','1419703680');");
E_D("replace into `ecs_order_action` values('13','6','admin','1','2','2','0','f','1419703706');");
E_D("replace into `ecs_order_action` values('14','6','admin','1','2','2','0','[通过分销审核] ','1419703729');");
E_D("replace into `ecs_order_action` values('15','2','admin','5','5','0','0','fwef','1420132817');");
E_D("replace into `ecs_order_action` values('16','2','admin','1','1','0','1','fef','1420132830');");
E_D("replace into `ecs_order_action` values('17','2','admin','1','2','2','0','fwefwef','1420133561');");
E_D("replace into `ecs_order_action` values('18','2','admin','1','2','2','0','[通过分销审核] ','1420133561');");
E_D("replace into `ecs_order_action` values('19','3','admin','5','5','0','0','fwefwef','1420133633');");
E_D("replace into `ecs_order_action` values('20','3','admin','1','1','0','1','fef','1420133643');");
E_D("replace into `ecs_order_action` values('21','3','admin','1','2','2','0','ff','1420133675');");
E_D("replace into `ecs_order_action` values('22','3','admin','1','2','2','0','[通过分销审核] ','1420133675');");
E_D("replace into `ecs_order_action` values('23','7','admin','5','5','0','0','fef','1420134084');");
E_D("replace into `ecs_order_action` values('24','7','admin','1','1','0','1','fef','1420134095');");
E_D("replace into `ecs_order_action` values('25','7','admin','1','2','2','0','fff','1420134113');");
E_D("replace into `ecs_order_action` values('26','7','admin','1','2','2','0','[通过分销审核] ','1420134113');");
E_D("replace into `ecs_order_action` values('27','9','buyer','2','0','0','0','用户取消','1422026063');");
E_D("replace into `ecs_order_action` values('28','10','admin','1','0','2','0','fe','1422027997');");
E_D("replace into `ecs_order_action` values('29','11','admin','1','0','2','0','fef','1422028564');");
E_D("replace into `ecs_order_action` values('30','12','admin','1','0','2','0','ff','1422028765');");
E_D("replace into `ecs_order_action` values('31','10','admin','1','3','2','0','fwef','1422178273');");
E_D("replace into `ecs_order_action` values('32','10','admin','5','5','2','0','fewffe','1422178287');");
E_D("replace into `ecs_order_action` values('33','10','admin','1','1','2','1','fef','1422178310');");
E_D("replace into `ecs_order_action` values('34','10','admin','5','2','2','0','fewfewf','1422178362');");
E_D("replace into `ecs_order_action` values('35','10','admin','5','2','2','0','[售后] ff','1422178374');");
E_D("replace into `ecs_order_action` values('36','10','admin','5','0','2','0','fef','1422192254');");
E_D("replace into `ecs_order_action` values('37','10','admin','1','3','2','0','fwef','1422192277');");
E_D("replace into `ecs_order_action` values('38','10','admin','5','5','2','0','fwef','1422192289');");
E_D("replace into `ecs_order_action` values('39','10','admin','1','1','2','1','f','1422192300');");
E_D("replace into `ecs_order_action` values('40','10','admin','5','2','2','0','fe','1422192326');");
E_D("replace into `ecs_order_action` values('41','10','admin','4','0','0','0','ffe','1422192350');");
E_D("replace into `ecs_order_action` values('42','10','admin','1','0','0','0','fe','1422192654');");
E_D("replace into `ecs_order_action` values('43','10','admin','1','0','2','0','fef','1422192670');");
E_D("replace into `ecs_order_action` values('44','10','admin','5','5','2','0','wfe','1422192738');");
E_D("replace into `ecs_order_action` values('45','10','admin','1','1','2','1','gr','1422192756');");
E_D("replace into `ecs_order_action` values('46','10','admin','4','0','0','0','fef','1422192809');");
E_D("replace into `ecs_order_action` values('47','3','admin','4','0','0','0','dwd','1422192943');");
E_D("replace into `ecs_order_action` values('48','3','admin','1','0','0','0','fef','1422192958');");
E_D("replace into `ecs_order_action` values('49','3','admin','2','0','0','0','ef','1422192984');");
E_D("replace into `ecs_order_action` values('50','6','admin','1','0','0','0','jj','1422193207');");
E_D("replace into `ecs_order_action` values('51','6','admin','1','2','2','0','用户什么日子发货过来','1422193248');");
E_D("replace into `ecs_order_action` values('52','1','admin','4','0','0','0','用户换货，尺码太大，换成3尺的','1422193400');");
E_D("replace into `ecs_order_action` values('53','1','admin','1','0','0','0','丰富','1422193411');");
E_D("replace into `ecs_order_action` values('54','1','admin','1','3','0','0','丰富','1422193435');");
E_D("replace into `ecs_order_action` values('55','1','admin','5','5','0','0','丰富','1422193451');");
E_D("replace into `ecs_order_action` values('56','1','admin','1','1','0','1','分','1422193515');");
E_D("replace into `ecs_order_action` values('57','1','admin','1','2','2','0','额','1422193542');");
E_D("replace into `ecs_order_action` values('58','7','admin','4','0','0','0','丰富','1422194066');");
E_D("replace into `ecs_order_action` values('59','4','admin','1','0','0','0','fef','1422206100');");
E_D("replace into `ecs_order_action` values('60','4','admin','5','5','0','0','few','1422206113');");
E_D("replace into `ecs_order_action` values('61','4','admin','1','1','0','1','fwef','1422206209');");
E_D("replace into `ecs_order_action` values('62','6','admin','1','2','2','0','[售后] fefef','1422237190');");
E_D("replace into `ecs_order_action` values('63','6','admin','1','7','2','0','【换货】 fef','1422238249');");
E_D("replace into `ecs_order_action` values('64','6','admin','1','7','2','0','【换货】 fef','1422238284');");
E_D("replace into `ecs_order_action` values('65','13','admin','1','0','2','0','fef','1422500909');");
E_D("replace into `ecs_order_action` values('66','13','admin','5','5','2','0','fef','1422500921');");
E_D("replace into `ecs_order_action` values('67','13','admin','1','1','2','1','fef','1422500944');");
E_D("replace into `ecs_order_action` values('68','14','admin','1','0','2','0','fewf','1422544596');");
E_D("replace into `ecs_order_action` values('69','18','买家','1','0','2','0','','1422830957');");
E_D("replace into `ecs_order_action` values('70','33','admin','5','5','2','0','3232323','1433542156');");
E_D("replace into `ecs_order_action` values('71','33','admin','1','1','2','1','12','1433542164');");
E_D("replace into `ecs_order_action` values('72','33','admin','1','1','2','1','1212','1433542168');");
E_D("replace into `ecs_order_action` values('73','33','admin','1','1','2','1','','1433542257');");
E_D("replace into `ecs_order_action` values('74','34','admin','1','0','2','0','2323','1433551299');");
E_D("replace into `ecs_order_action` values('75','34','admin','5','5','2','0','11212','1433551349');");
E_D("replace into `ecs_order_action` values('76','34','admin','1','1','2','1','1212','1433551358');");
E_D("replace into `ecs_order_action` values('77','34','admin','5','2','2','0','11','1433551466');");
E_D("replace into `ecs_order_action` values('78','35','admin','1','0','2','0','2323','1433552108');");
E_D("replace into `ecs_order_action` values('79','36','admin','1','0','2','0','2323','1433553310');");
E_D("replace into `ecs_order_action` values('80','36','admin','5','5','2','0','qwqwqw','1433553408');");
E_D("replace into `ecs_order_action` values('81','36','admin','1','1','2','1','','1433553414');");
E_D("replace into `ecs_order_action` values('82','37','admin','1','0','2','0','2323','1433553716');");
E_D("replace into `ecs_order_action` values('83','38','admin','1','0','2','0','23','1433554004');");
E_D("replace into `ecs_order_action` values('84','39','admin','1','0','2','0','1212','1433586446');");
E_D("replace into `ecs_order_action` values('85','39','admin','5','5','2','0','121212','1433586498');");
E_D("replace into `ecs_order_action` values('86','40','admin','1','0','2','0','2121','1433594132');");
E_D("replace into `ecs_order_action` values('87','41','admin','1','0','2','0','1212','1433594671');");
E_D("replace into `ecs_order_action` values('88','41','admin','5','5','2','0','12121212','1433594728');");
E_D("replace into `ecs_order_action` values('89','41','admin','1','1','2','1','','1433594735');");

require("../../inc/footer.php");
?>