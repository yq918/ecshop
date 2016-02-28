<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_promote_log`;");
E_C("CREATE TABLE `wxch_promote_log` (
  `p_id` int(12) NOT NULL AUTO_INCREMENT,
  `promoter` int(10) NOT NULL COMMENT '推广人',
  `visitor` int(12) NOT NULL COMMENT '访客',
  `visit_time` int(10) NOT NULL COMMENT '访问时间',
  `is_subscribe` int(1) NOT NULL DEFAULT '0' COMMENT '是否关注',
  `subscribe_time` int(10) NOT NULL COMMENT '关注时间',
  `is_distributor` int(1) NOT NULL DEFAULT '0' COMMENT '成为分销商',
  `distributor_time` int(10) NOT NULL COMMENT '成为分销商的时间',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='推广记录'");
E_D("replace into `wxch_promote_log` values('1','2','5','1419116177','1','0','1','0');");
E_D("replace into `wxch_promote_log` values('2','2','6','1419116177','0','0','0','0');");
E_D("replace into `wxch_promote_log` values('3','3','2','1422004835','0','0','0','0');");
E_D("replace into `wxch_promote_log` values('4','3','2','1422006008','0','0','0','0');");
E_D("replace into `wxch_promote_log` values('5','3','2','1422026295','1','1422076133','0','0');");
E_D("replace into `wxch_promote_log` values('6','4','2','1422076319','1','1422076319','0','0');");
E_D("replace into `wxch_promote_log` values('7','3','2','1422076697','1','1422076700','0','0');");
E_D("replace into `wxch_promote_log` values('8','4','2','1422076742','1','1422076747','0','0');");
E_D("replace into `wxch_promote_log` values('11','9','12','1433613420','1','1433613420','0','0');");

require("../../inc/footer.php");
?>