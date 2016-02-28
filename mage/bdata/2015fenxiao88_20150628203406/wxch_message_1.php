<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_message`;");
E_C("CREATE TABLE `wxch_message` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `wxid` char(28) NOT NULL,
  `w_message` text NOT NULL,
  `message` text NOT NULL,
  `belong` int(9) unsigned NOT NULL,
  `dateline` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wxid` (`wxid`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_message` values('1','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:','0','1433550897');");
E_D("replace into `wxch_message` values('2','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','9','1433550897');");
E_D("replace into `wxch_message` values('3','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:subdefault','0','1433550904');");
E_D("replace into `wxch_message` values('4','oFPMruHZ0b7_HirTWkliYF5-vJqQ','您已成功关注甜心100官方微信！您的会员ID是【6020202】，您是第6252会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433550904');");
E_D("replace into `wxch_message` values('5','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433550909');");
E_D("replace into `wxch_message` values('6','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:subdefault','0','1433551056');");
E_D("replace into `wxch_message` values('7','oFPMruHZ0b7_HirTWkliYF5-vJqQ','您已成功关注甜心100官方微信！您的会员ID是【6020202】，您是第6252会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433551056');");
E_D("replace into `wxch_message` values('8','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433551058');");
E_D("replace into `wxch_message` values('9','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:','0','1433551064');");
E_D("replace into `wxch_message` values('10','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','0','1433551064');");
E_D("replace into `wxch_message` values('11','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:subdefault','0','1433551072');");
E_D("replace into `wxch_message` values('12','oFPMruHZ0b7_HirTWkliYF5-vJqQ','您已成功关注甜心100官方微信！您的会员ID是【6020202】，您是第6252会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433551072');");
E_D("replace into `wxch_message` values('13','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433551077');");
E_D("replace into `wxch_message` values('14','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433551094');");
E_D("replace into `wxch_message` values('15','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433551262');");
E_D("replace into `wxch_message` values('16','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/user.php','0','1433551320');");
E_D("replace into `wxch_message` values('17','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433553679');");
E_D("replace into `wxch_message` values('18','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433553967');");
E_D("replace into `wxch_message` values('19','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:','0','1433586363');");
E_D("replace into `wxch_message` values('20','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','0','1433586363');");
E_D("replace into `wxch_message` values('21','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:subdefault','0','1433586371');");
E_D("replace into `wxch_message` values('22','oFPMruHZ0b7_HirTWkliYF5-vJqQ','您已成功关注甜心100官方微信！您的会员ID是【6020202】，您是第6252会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433586371');");
E_D("replace into `wxch_message` values('23','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433586374');");
E_D("replace into `wxch_message` values('24','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433593886');");
E_D("replace into `wxch_message` values('25','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/distribute.php','0','1433593902');");
E_D("replace into `wxch_message` values('26','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:','0','1433593971');");
E_D("replace into `wxch_message` values('27','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','0','1433593971');");
E_D("replace into `wxch_message` values('28','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:subdefault','0','1433593981');");
E_D("replace into `wxch_message` values('29','oFPMruHZ0b7_HirTWkliYF5-vJqQ','您已通过好友【丹丹】的推荐成功关注甜心100官方微信！您的会员ID是【6020202】，您是第6252会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433593981');");
E_D("replace into `wxch_message` values('30','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/distribute.php','0','1433593989');");
E_D("replace into `wxch_message` values('31','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433594086');");
E_D("replace into `wxch_message` values('32','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433594459');");
E_D("replace into `wxch_message` values('33','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433594590');");
E_D("replace into `wxch_message` values('34','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/distribute.php','0','1433594704');");
E_D("replace into `wxch_message` values('35','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/distribute.php','0','1433594868');");
E_D("replace into `wxch_message` values('36','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/distribute.php','0','1433599338');");
E_D("replace into `wxch_message` values('37','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','tianxin100','0','1433602715');");
E_D("replace into `wxch_message` values('38','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','?','0','1433602764');");
E_D("replace into `wxch_message` values('39','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','menu:subdefault','0','1433602769');");
E_D("replace into `wxch_message` values('40','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','您已成功关注甜心100官方微信！您的会员ID是【1996185】，您是第6253会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433602769');");
E_D("replace into `wxch_message` values('41','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','tianxin100','0','1433602780');");
E_D("replace into `wxch_message` values('42','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','您还不是分销商，暂时不能获取推广二维码','','41','1433602780');");
E_D("replace into `wxch_message` values('43','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','tianxin100','0','1433602821');");
E_D("replace into `wxch_message` values('44','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','tianxin100','0','1433602871');");
E_D("replace into `wxch_message` values('45','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','','44','1433602871');");
E_D("replace into `wxch_message` values('46','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','tianxin100','0','1433602918');");
E_D("replace into `wxch_message` values('47','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','','46','1433602918');");
E_D("replace into `wxch_message` values('48','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','tianxin100','0','1433602951');");
E_D("replace into `wxch_message` values('49','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','mdr3a81ckVdXiu1Sy4XjTQKI8b0KO42PUE7P2Isyi6rgzKvgjsZFUu2BBhWagxQ6','','48','1433602951');");
E_D("replace into `wxch_message` values('50','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','tianxin100','0','1433603378');");
E_D("replace into `wxch_message` values('51','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','8GJUWbumI-d1RLlEl69ZeDkdPCRCb24W3dFDAHNfwCDTuQiT32Ute0ikKTlDXjkS','','50','1433603378');");
E_D("replace into `wxch_message` values('52','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','tianxin100','0','1433603427');");
E_D("replace into `wxch_message` values('53','oFPMruHZ0b7_HirTWkliYF5-vJqQ','LJQlho-3zRCbecMDLiWx4blry3WxAAep0egMRWaO4KdjXJfmADPvVaC3WXiKrwpK','','52','1433603427');");
E_D("replace into `wxch_message` values('54','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','tianxin100','0','1433603515');");
E_D("replace into `wxch_message` values('55','oFPMruHZ0b7_HirTWkliYF5-vJqQ','A39BTMset_sxUZOnVqebzgLniW4rxZptj8y8LIbUBGmeuxyfu_3w2kGmmrjPSxzZ','','54','1433603515');");
E_D("replace into `wxch_message` values('56','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/distribute.php','0','1433603569');");
E_D("replace into `wxch_message` values('57','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','tianxin100','0','1433603716');");
E_D("replace into `wxch_message` values('58','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433604346');");
E_D("replace into `wxch_message` values('59','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433604352');");
E_D("replace into `wxch_message` values('60','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:tianxin100','0','1433604375');");
E_D("replace into `wxch_message` values('61','oFPMruIgCy6M9smHSrR9vDj2-hzk','您还不是分销商，暂时不能获取推广二维码','','0','1433604375');");
E_D("replace into `wxch_message` values('62','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:http://qiye.wushuai.net/mobile/user.php','0','1433604382');");
E_D("replace into `wxch_message` values('63','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:','0','1433604625');");
E_D("replace into `wxch_message` values('64','oFPMruIgCy6M9smHSrR9vDj2-hzk','图文消息','','0','1433604625');");
E_D("replace into `wxch_message` values('65','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:qr','0','1433604641');");
E_D("replace into `wxch_message` values('66','oFPMruIgCy6M9smHSrR9vDj2-hzk','您已通过好友【小君】的推荐成功关注甜心100官方微信！您的会员ID是【3534820】，您是第6254会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433604641');");
E_D("replace into `wxch_message` values('67','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:tianxin100','0','1433604655');");
E_D("replace into `wxch_message` values('68','oFPMruIgCy6M9smHSrR9vDj2-hzk','您还不是分销商，暂时不能获取推广二维码','','0','1433604655');");
E_D("replace into `wxch_message` values('69','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:tianxin100','0','1433604671');");
E_D("replace into `wxch_message` values('70','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','zjd','0','1433604851');");
E_D("replace into `wxch_message` values('71','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','70','1433604851');");
E_D("replace into `wxch_message` values('72','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','zjd','0','1433604912');");
E_D("replace into `wxch_message` values('73','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','72','1433604912');");
E_D("replace into `wxch_message` values('74','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:','0','1433605148');");
E_D("replace into `wxch_message` values('75','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','0','1433605148');");
E_D("replace into `wxch_message` values('76','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:subdefault','0','1433605159');");
E_D("replace into `wxch_message` values('77','oFPMruHZ0b7_HirTWkliYF5-vJqQ','您已通过好友【丹丹】的推荐成功关注甜心100官方微信！您的会员ID是【6020202】，您是第6252会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433605159');");
E_D("replace into `wxch_message` values('78','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:tianxin100','0','1433605168');");
E_D("replace into `wxch_message` values('79','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:tianxin100','0','1433605173');");
E_D("replace into `wxch_message` values('80','oFPMruHZ0b7_HirTWkliYF5-vJqQ','3JrfxR6KejxhMBpG3lEAZHHsZ0y_Mc0ThZFmcKPRqa28jQdD1Cd4UZ2dwUmUtDAN','','0','1433605168');");
E_D("replace into `wxch_message` values('81','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:tianxin100','0','1433605178');");
E_D("replace into `wxch_message` values('82','oFPMruHZ0b7_HirTWkliYF5-vJqQ','O8uEe_m7HyyhIA-_hQ9TcW7pg2ZFRqFrwWLhrOQnSrrR1Wbb3KsUoI0v5imtvnHi','','0','1433605173');");
E_D("replace into `wxch_message` values('83','oFPMruHZ0b7_HirTWkliYF5-vJqQ','7ZQeRhJ2Q4U1Hfg1SDryA-bAKn0Ge0Rf7s--D2kaq_dDm4WZPnu__UNBtiFHjMcZ','','0','1433605178');");
E_D("replace into `wxch_message` values('84','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:tianxin100','0','1433605194');");
E_D("replace into `wxch_message` values('85','oFPMruHZ0b7_HirTWkliYF5-vJqQ','x6UaTyv4Evz-REn2pqxSueMHRUBF1vjJyt2lmB4x_lw4i0mtXTKovRoC2PdTJxuj','','0','1433605194');");
E_D("replace into `wxch_message` values('86','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:tianxin100','0','1433605215');");
E_D("replace into `wxch_message` values('87','oFPMruHZ0b7_HirTWkliYF5-vJqQ','v9w5ULx57nAfAA4gKYXDQ0tNSFl5erlffxIz7a7jL4bwOcZAJfyocggtRXiGx8aA','','0','1433605215');");
E_D("replace into `wxch_message` values('88','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/distribute.php','0','1433605273');");
E_D("replace into `wxch_message` values('89','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:tianxin100','0','1433605320');");
E_D("replace into `wxch_message` values('90','oFPMruHZ0b7_HirTWkliYF5-vJqQ','lqo5OOks4BlcaXYMsnoEyqlGuEpZwu9WyM8W-RJb3rBBf3SySgRi13DrTcGcRBZ-','','0','1433605320');");
E_D("replace into `wxch_message` values('91','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:','0','1433605561');");
E_D("replace into `wxch_message` values('92','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','0','1433605561');");
E_D("replace into `wxch_message` values('93','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:','0','1433605582');");
E_D("replace into `wxch_message` values('94','oFPMruHZ0b7_HirTWkliYF5-vJqQ','图文消息','','0','1433605582');");
E_D("replace into `wxch_message` values('95','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','tianxin100','0','1433605768');");
E_D("replace into `wxch_message` values('96','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','您还不是分销商，暂时不能获取推广二维码','','95','1433605768');");
E_D("replace into `wxch_message` values('97','oFPMruHZ0b7_HirTWkliYF5-vJqQ','您已经关注过我们了','','0','1433608293');");
E_D("replace into `wxch_message` values('98','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','111111','0','1433608315');");
E_D("replace into `wxch_message` values('99','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:tianxin100','0','1433608332');");
E_D("replace into `wxch_message` values('100','oFPMruHZ0b7_HirTWkliYF5-vJqQ','oXyXGKpfSgcsqCRs93XoQXK0ySUGiaCS_GVlGZ0lu2lBVMxDxERFzyq0X1iHYX9u','','0','1433608332');");
E_D("replace into `wxch_message` values('101','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:','0','1433613363');");
E_D("replace into `wxch_message` values('102','oFPMruIgCy6M9smHSrR9vDj2-hzk','图文消息','','12','1433613363');");
E_D("replace into `wxch_message` values('103','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433613372');");
E_D("replace into `wxch_message` values('104','oFPMruHZ0b7_HirTWkliYF5-vJqQ','','menu:tianxin100','0','1433613380');");
E_D("replace into `wxch_message` values('105','oFPMruHZ0b7_HirTWkliYF5-vJqQ','_ZD9mDt-JUum7KxCoQMur4sDrOsiD8kWzU2o_0lBKJbZIbKhnZx_srZ_PQatENy0','','0','1433613380');");
E_D("replace into `wxch_message` values('106','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:qr','0','1433613420');");
E_D("replace into `wxch_message` values('107','oFPMruIgCy6M9smHSrR9vDj2-hzk','您已通过好友【小君】的推荐成功关注甜心100官方微信！您的会员ID是【7039184】，您是第6253会员，点击左下角的菜单，展开甜心100神秘面纱','','0','1433613420');");
E_D("replace into `wxch_message` values('108','oFPMruIgCy6M9smHSrR9vDj2-hzk','','menu:http://qiye.wushuai.net/mobile/index.php','0','1433616467');");

require("../../inc/footer.php");
?>