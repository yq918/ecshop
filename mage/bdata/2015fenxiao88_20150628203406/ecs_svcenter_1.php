<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `ecs_svcenter`;");
E_C("CREATE TABLE `ecs_svcenter` (
  `sv_id` int(6) NOT NULL AUTO_INCREMENT,
  `sv_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '??',
  `tel` varchar(50) CHARACTER SET utf8 NOT NULL,
  `wechat` varchar(50) CHARACTER SET utf8 NOT NULL,
  `qq` varchar(50) CHARACTER SET utf8 NOT NULL,
  `linkman` varchar(10) CHARACTER SET utf8 NOT NULL,
  `xpoint` float(10,6) NOT NULL DEFAULT '0.000000',
  `ypoint` float(10,6) NOT NULL DEFAULT '0.000000',
  `sv_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `province_id` int(6) NOT NULL DEFAULT '0',
  `city_id` int(6) NOT NULL DEFAULT '0',
  `district_id` int(6) NOT NULL DEFAULT '0',
  `country_id` int(6) NOT NULL DEFAULT '0',
  `address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `info` text CHARACTER SET utf8 NOT NULL,
  `sales` text CHARACTER SET utf8 NOT NULL COMMENT '????',
  `wurl` text CHARACTER SET utf8 NOT NULL COMMENT '????',
  `sv_line` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_effect` int(1) NOT NULL DEFAULT '1' COMMENT '????',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `sort_order` int(5) NOT NULL DEFAULT '99',
  PRIMARY KEY (`sv_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1");
E_D("replace into `ecs_svcenter` values('1','??????????','15696963636','ji9349','34234','???','38.376015','116.869133','data/article/1423158570481502653.jpg','10','140','1128','1','fwefwefwefewf','<p>\r\n	fwefwef\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	wefwe\r\n</p>\r\n<p>\r\n	<img src=\"http://localhost:90/mobile/images/upload/Image/20150205190318_35889.jpg\" alt=\"\" /> \r\n</p>','<p>\r\n	fwefwef\r\n</p>\r\n<p>\r\n	<img src=\"http://localhost:90/mobile/images/upload/Image/20150206090041_50632.jpg\" alt=\"\" />\r\n</p>','http://www.baidu.com','2??2??2??2??2??2??','1','1423156526','44');");
E_D("replace into `ecs_svcenter` values('2','????????','18909098989','493849','93490','???','31.440672','120.592804','','16','221','1863','1','????','data/article/1423156586204304171.jpg','','','','1','1423156586','34');");

require("../../inc/footer.php");
?>