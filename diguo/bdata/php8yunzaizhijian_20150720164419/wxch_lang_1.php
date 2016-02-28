<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_lang`;");
E_C("CREATE TABLE `wxch_lang` (
  `lang_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(64) NOT NULL,
  `lang_value` text NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_lang` values('1','regmsg','<p>欢迎关注微信公众号</p>');");
E_D("replace into `wxch_lang` values('2','help','新手快速上路，请点击以下链接：\r\n\r\n1，<a href=\"http://mp.weixin.qq.com/s?__biz=MzA5ODM4NDg2MQ==&mid=205181036&idx=1&sn=05af27b753e12db20da546f9805a021a#rd\">红枣帅锅是谁</a>\r\n\r\n2，<a href=\"http://mp.weixin.qq.com/s?__biz=MzA5ODM4NDg2MQ==&mid=204529350&idx=1&sn=35c33aa2797c0e9395258859c4217de2#rd\">如何开通微信支付</a>\r\n\r\n3，<a href=\"http://mp.weixin.qq.com/s?__biz=MzA5ODM4NDg2MQ==&mid=205094496&idx=1&sn=664352ecf780bca19dc441b9d9dea2df#rd\">分销模式的说明</a>\r\n\r\n4，<a href=\"http://mp.weixin.qq.com/s?__biz=MzA5ODM4NDg2MQ==&mid=204613793&idx=1&sn=abb24c8a0e9b627adf1c2a5a02649a4f#rd\">如何推广获得收益</a>\r\n\r\n5，<a href=\"http://mp.weixin.qq.com/s?__biz=MzA5ODM4NDg2MQ==&mid=204528585&idx=1&sn=f870ca6afe3688f26327fc734698ac34#rd\">佣金与提现的说明</a>\r\n');");
E_D("replace into `wxch_lang` values('3','coupon','欢迎关注微信公众号,您已经领取过优惠卷');");
E_D("replace into `wxch_lang` values('4','coupon1','欢迎关注微信公众号,活动期间关注送');");
E_D("replace into `wxch_lang` values('5','coupon2','欢迎关注微信公众号,优惠卷已送完');");
E_D("replace into `wxch_lang` values('6','coupon3','相关功能');");
E_D("replace into `wxch_lang` values('7','qdok','签到成功+');");
E_D("replace into `wxch_lang` values('8','qdno','签到数次已用完');");
E_D("replace into `wxch_lang` values('9','qdstop','已经关闭了签到');");
E_D("replace into `wxch_lang` values('10','bd','快速绑定会员帐号，享受我们提供给你更全面的服务');");
E_D("replace into `wxch_lang` values('11','prize_egg','砸金蛋抽奖规则');");
E_D("replace into `wxch_lang` values('12','prize_dzp','大转盘抽奖活动说明');");

require("../../inc/footer.php");
?>