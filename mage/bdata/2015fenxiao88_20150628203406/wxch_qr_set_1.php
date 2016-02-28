<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `wxch_qr_set`;");
E_C("CREATE TABLE `wxch_qr_set` (
  `set_id` int(5) NOT NULL AUTO_INCREMENT,
  `dst_image` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '????',
  `headpic_src_x` int(5) NOT NULL DEFAULT '128' COMMENT '??x??',
  `headpic_src_y` int(5) NOT NULL DEFAULT '44' COMMENT '??y??',
  `shop_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '????',
  `txt_src_x` int(5) NOT NULL DEFAULT '268' COMMENT '??x??',
  `txt_src_y` int(5) NOT NULL DEFAULT '58' COMMENT '??y??',
  `qr_src_x` int(5) NOT NULL DEFAULT '205' COMMENT '???x??',
  `qr_src_y` int(5) NOT NULL DEFAULT '508' COMMENT '???y??',
  `headpic_width` int(5) NOT NULL COMMENT '????',
  `headpic_height` int(5) NOT NULL COMMENT '????',
  `font_size` int(3) NOT NULL DEFAULT '16' COMMENT '??',
  `qr_width` int(5) NOT NULL DEFAULT '270' COMMENT '?????',
  `qr_height` int(5) NOT NULL DEFAULT '270' COMMENT '?????',
  PRIMARY KEY (`set_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1");
E_D("replace into `wxch_qr_set` values('1','data/static/images/1427003394090955622.jpg','128','40','????','268','68','185','488','90','85','45','250','250');");

require("../../inc/footer.php");
?>