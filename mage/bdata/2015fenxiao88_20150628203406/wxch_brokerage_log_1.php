<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_brokerage_log`;");
E_C("CREATE TABLE `wxch_brokerage_log` (
  `b_id` int(12) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(10) NOT NULL COMMENT '购买人',
  `profit_user_id` int(10) NOT NULL COMMENT '获益人',
  `order_id` int(10) NOT NULL COMMENT '所属订单',
  `order_sn` varchar(50) NOT NULL,
  `order_price` decimal(6,2) NOT NULL DEFAULT '0.00' COMMENT '订单价格',
  `brokerage` decimal(4,2) NOT NULL DEFAULT '0.00',
  `log_time` int(12) NOT NULL,
  `brokerage_level` int(1) NOT NULL DEFAULT '1',
  `info` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_brokerage_log` values('21','2','1','12','','100.00','30.00','1422029398','1','');");
E_D("replace into `wxch_brokerage_log` values('22','2','3','12','','100.00','20.00','1422029398','1','');");
E_D("replace into `wxch_brokerage_log` values('23','2','1','12','','100.00','30.00','1422029695','1','');");
E_D("replace into `wxch_brokerage_log` values('24','2','3','12','','100.00','20.00','1422029695','2','');");
E_D("replace into `wxch_brokerage_log` values('25','2','4','12','','100.00','50.00','1422029695','1','');");
E_D("replace into `wxch_brokerage_log` values('26','2','1','12','','100.00','50.00','1422030869','1','');");
E_D("replace into `wxch_brokerage_log` values('27','2','3','12','','100.00','30.00','1422030869','2','');");
E_D("replace into `wxch_brokerage_log` values('28','2','5','12','','100.00','10.00','1422030869','3','');");
E_D("replace into `wxch_brokerage_log` values('29','2','1','12','','100.00','50.00','1422031127','1','');");
E_D("replace into `wxch_brokerage_log` values('30','2','3','12','','100.00','30.00','1422031127','2','');");
E_D("replace into `wxch_brokerage_log` values('31','2','4','12','','100.00','10.00','1422031127','3','');");
E_D("replace into `wxch_brokerage_log` values('32','2','1','12','','100.00','45.00','1422031263','1','');");
E_D("replace into `wxch_brokerage_log` values('33','2','3','12','','100.00','25.00','1422031263','2','');");
E_D("replace into `wxch_brokerage_log` values('34','2','4','12','','100.00','15.00','1422031263','3','');");
E_D("replace into `wxch_brokerage_log` values('35','2','1','12','','100.00','30.00','1422032163','1','');");
E_D("replace into `wxch_brokerage_log` values('36','2','3','12','','100.00','20.00','1422032163','2','');");
E_D("replace into `wxch_brokerage_log` values('37','2','4','12','','100.00','15.00','1422032163','3','');");
E_D("replace into `wxch_brokerage_log` values('38','2','1','12','','100.00','30.00','1422032581','1','');");
E_D("replace into `wxch_brokerage_log` values('39','2','3','12','','100.00','20.00','1422032581','2','');");
E_D("replace into `wxch_brokerage_log` values('40','2','4','12','','100.00','15.00','1422032581','3','');");
E_D("replace into `wxch_brokerage_log` values('41','2','4','13','2015012336002','494.00','99.99','1422500930','1','');");
E_D("replace into `wxch_brokerage_log` values('42','2','3','13','2015012336002','494.00','99.99','1422500930','2','');");
E_D("replace into `wxch_brokerage_log` values('43','2','5','13','2015012336002','494.00','88.80','1422500930','3','');");
E_D("replace into `wxch_brokerage_log` values('44','2','4','13','2015012336002','494.00','-99.99','1422512162','1','因退款退货等原因,扣除订单[2015012336002]的一级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('45','2','3','13','2015012336002','494.00','-99.99','1422512162','2','因退款退货等原因,扣除订单[2015012336002]的二级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('46','2','3','13','2015012336002','494.00','-99.99','1422512162','3','因退款退货等原因,扣除订单[2015012336002]的三级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('47','2','4','14','2015012903471','100.00','50.00','1422544603','1','');");
E_D("replace into `wxch_brokerage_log` values('48','2','3','14','2015012903471','100.00','30.00','1422544603','2','');");
E_D("replace into `wxch_brokerage_log` values('49','2','5','14','2015012903471','100.00','20.00','1422544603','3','');");
E_D("replace into `wxch_brokerage_log` values('50','2','4','14','2015012903471','100.00','-50.00','1422544618','1','因退款退货等原因,扣除订单[2015012903471]的一级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('51','2','4','14','2015012903471','100.00','-50.00','1422544703','1','因退款退货等原因,扣除订单[2015012903471]的一级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('52','2','4','14','2015012903471','100.00','-50.00','1422544734','1','因退款退货等原因,扣除订单[2015012903471]的一级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('53','2','3','14','2015012903471','100.00','-30.00','1422544734','2','因退款退货等原因,扣除订单[2015012903471]的二级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('54','2','5','14','2015012903471','100.00','-20.00','1422544734','3','因退款退货等原因,扣除订单[2015012903471]的三级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('55','2','4','14','2015012903471','100.00','50.00','1422545179','1','');");
E_D("replace into `wxch_brokerage_log` values('56','2','3','14','2015012903471','100.00','30.00','1422545179','2','');");
E_D("replace into `wxch_brokerage_log` values('57','2','5','14','2015012903471','100.00','20.00','1422545179','3','');");
E_D("replace into `wxch_brokerage_log` values('58','2','4','14','2015012903471','100.00','-50.00','1422545396','1','因退款退货等原因,扣除订单[2015012903471]的一级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('59','2','3','14','2015012903471','100.00','-30.00','1422545397','2','因退款退货等原因,扣除订单[2015012903471]的二级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('60','2','5','14','2015012903471','100.00','-20.00','1422545397','3','因退款退货等原因,扣除订单[2015012903471]的三级分销佣金');");
E_D("replace into `wxch_brokerage_log` values('61','2','4','18','2015020176283','100.00','50.00','1422830957','1','');");
E_D("replace into `wxch_brokerage_log` values('62','2','3','18','2015020176283','100.00','30.00','1422830957','2','');");
E_D("replace into `wxch_brokerage_log` values('63','2','5','18','2015020176283','100.00','20.00','1422830957','3','');");
E_D("replace into `wxch_brokerage_log` values('64','2','4','21','2015021059695','196.00','98.00','1423589226','1','');");
E_D("replace into `wxch_brokerage_log` values('65','2','3','21','2015021059695','196.00','58.80','1423589226','2','');");
E_D("replace into `wxch_brokerage_log` values('66','2','5','21','2015021059695','196.00','39.20','1423589226','3','');");
E_D("replace into `wxch_brokerage_log` values('67','2','4','24','2015021083410','100.00','50.00','1423589565','1','');");
E_D("replace into `wxch_brokerage_log` values('68','2','3','24','2015021083410','100.00','30.00','1423589565','2','');");
E_D("replace into `wxch_brokerage_log` values('69','2','5','24','2015021083410','100.00','20.00','1423589565','3','');");
E_D("replace into `wxch_brokerage_log` values('70','2','4','25','2015021659820','490.00','99.99','1424122564','1','');");
E_D("replace into `wxch_brokerage_log` values('71','2','3','25','2015021659820','490.00','99.99','1424122564','2','');");
E_D("replace into `wxch_brokerage_log` values('72','2','5','25','2015021659820','490.00','98.00','1424122564','3','');");
E_D("replace into `wxch_brokerage_log` values('73','2','4','26','2015021681816','98.00','49.00','1424123141','1','');");
E_D("replace into `wxch_brokerage_log` values('74','2','3','26','2015021681816','98.00','29.40','1424123141','2','');");
E_D("replace into `wxch_brokerage_log` values('75','2','5','26','2015021681816','98.00','19.60','1424123141','3','');");
E_D("replace into `wxch_brokerage_log` values('76','2','4','27','2015021637449','98.00','49.00','1424123245','1','');");
E_D("replace into `wxch_brokerage_log` values('77','2','3','27','2015021637449','98.00','29.40','1424123245','2','');");
E_D("replace into `wxch_brokerage_log` values('78','2','5','27','2015021637449','98.00','19.60','1424123245','3','');");
E_D("replace into `wxch_brokerage_log` values('79','2','4','28','2015021676042','98.00','49.00','1424123529','1','');");
E_D("replace into `wxch_brokerage_log` values('80','2','3','28','2015021676042','98.00','29.40','1424123529','2','');");
E_D("replace into `wxch_brokerage_log` values('81','2','5','28','2015021676042','98.00','19.60','1424123529','3','');");
E_D("replace into `wxch_brokerage_log` values('82','2','4','29','2015021679346','98.00','49.00','1424123683','1','');");
E_D("replace into `wxch_brokerage_log` values('83','2','3','29','2015021679346','98.00','29.40','1424123683','2','');");
E_D("replace into `wxch_brokerage_log` values('84','2','5','29','2015021679346','98.00','19.60','1424123683','3','');");
E_D("replace into `wxch_brokerage_log` values('85','2','4','30','2015021637306','98.00','49.00','1424123736','1','');");
E_D("replace into `wxch_brokerage_log` values('86','2','3','30','2015021637306','98.00','29.40','1424123736','2','');");
E_D("replace into `wxch_brokerage_log` values('87','2','5','30','2015021637306','98.00','19.60','1424123736','3','');");
E_D("replace into `wxch_brokerage_log` values('88','2','4','31','2015021679209','100.00','50.00','1424123783','1','');");
E_D("replace into `wxch_brokerage_log` values('89','2','3','31','2015021679209','100.00','30.00','1424123783','2','');");
E_D("replace into `wxch_brokerage_log` values('90','2','5','31','2015021679209','100.00','20.00','1424123783','3','');");
E_D("replace into `wxch_brokerage_log` values('91','2','4','32','2015021681737','100.00','50.00','1424123852','1','');");
E_D("replace into `wxch_brokerage_log` values('92','2','3','32','2015021681737','100.00','30.00','1424123852','2','');");
E_D("replace into `wxch_brokerage_log` values('93','2','5','32','2015021681737','100.00','20.00','1424123852','3','');");
E_D("replace into `wxch_brokerage_log` values('94','2','4','33','2015021636347','100.00','50.00','1424125925','1','');");
E_D("replace into `wxch_brokerage_log` values('95','2','3','33','2015021636347','100.00','30.00','1424125925','2','');");
E_D("replace into `wxch_brokerage_log` values('96','2','5','33','2015021636347','100.00','20.00','1424125925','3','');");
E_D("replace into `wxch_brokerage_log` values('97','9','8','40','2015060645989','24.00','7.20','1433594168','1','');");
E_D("replace into `wxch_brokerage_log` values('98','9','8','41','2015060605167','25.00','7.50','1433594671','1','');");

require("../../inc/footer.php");
?>