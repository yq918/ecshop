<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_qr`;");
E_C("CREATE TABLE `wxch_qr` (
  `qid` int(7) NOT NULL AUTO_INCREMENT,
  `type` varchar(2) NOT NULL,
  `expire_seconds` int(4) NOT NULL,
  `action_name` varchar(30) NOT NULL,
  `scene_id` int(7) NOT NULL,
  `ticket` varchar(120) NOT NULL,
  `scene` varchar(200) NOT NULL,
  `qr_path` varchar(200) NOT NULL,
  `distri_qr_path` varchar(255) NOT NULL COMMENT '分销二维码',
  `headpic_thumb` varchar(255) NOT NULL COMMENT '头像缩略图',
  `qrcode_thumb` varchar(255) NOT NULL COMMENT '二维码缩略图',
  `subscribe` int(8) unsigned NOT NULL,
  `scan` int(8) unsigned NOT NULL,
  `function` varchar(100) NOT NULL,
  `affiliate` int(8) NOT NULL,
  `endtime` int(10) NOT NULL,
  `dateline` int(10) NOT NULL,
  `qr_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_qr` values('19','qr','0','QR_LIMIT_SCENE','2','gQEa8ToAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xLzVrTmVtT1BtNzZ5V1NfNWJobS1RAAIEsI47VQMEAAAAAA==','9','images/qrcode/143359859748367.png','mobile/images/qrcode_distri/d_14335986374512.jpg','images/headpic_thumb/1433598637167233544.png','images/qrcode_thumb/1433598597915902960.png','3','3','【6020202】的推广二维码','0','0','0','1');");
E_D("replace into `wxch_qr` values('18','qr','0','QR_LIMIT_SCENE','1','gQEa8ToAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xLzVrTmVtT1BtNzZ5V1NfNWJobS1RAAIEsI47VQMEAAAAAA==','9','images/qrcode/143359737814468.png','','','','0','3','【6020202】的推广二维码','0','0','0','1');");

require("../../inc/footer.php");
?>