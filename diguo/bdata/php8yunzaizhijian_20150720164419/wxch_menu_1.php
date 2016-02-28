<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_menu`;");
E_C("CREATE TABLE `wxch_menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(6) NOT NULL,
  `level` int(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `value` varchar(250) NOT NULL,
  `aid` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_menu` values('1','view','1','进入商城','http://www.zhepx.net/mobile/index.php','0');");
E_D("replace into `wxch_menu` values('2','click','1','会员中心','','0');");
E_D("replace into `wxch_menu` values('3','click','1','更多..','','0');");
E_D("replace into `wxch_menu` values('4','click','2','','','1');");
E_D("replace into `wxch_menu` values('5','click','2','','','1');");
E_D("replace into `wxch_menu` values('6','click','2','','','1');");
E_D("replace into `wxch_menu` values('7','click','2','','','1');");
E_D("replace into `wxch_menu` values('8','click','2','','','1');");
E_D("replace into `wxch_menu` values('9','view','2','会员中心','http://www.zhepx.net/mobile/user.php','2');");
E_D("replace into `wxch_menu` values('10','view','2','分销中心','http://www.zhepx.net/mobile/distribute.php','2');");
E_D("replace into `wxch_menu` values('11','click','2','','','2');");
E_D("replace into `wxch_menu` values('12','click','2','','','2');");
E_D("replace into `wxch_menu` values('13','click','2','','','2');");
E_D("replace into `wxch_menu` values('14','view','2','品牌故事','http://www.zhepx.net/mobile/article.php?id=7','3');");
E_D("replace into `wxch_menu` values('15','view','2','赚钱秘籍','http://www.zhepx.net/mobile/article.php?id=4','3');");
E_D("replace into `wxch_menu` values('16','view','2','联系我们','http://www.zhepx.net/mobile/article.php?id=5','3');");
E_D("replace into `wxch_menu` values('17','click','2','','','3');");
E_D("replace into `wxch_menu` values('18','click','2','','','3');");

require("../../inc/footer.php");
?>