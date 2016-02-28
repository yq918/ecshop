<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_touch_action`;");
E_C("CREATE TABLE `ecs_touch_action` (
  `action_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `action_code` varchar(20) NOT NULL DEFAULT '',
  `relevance` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`action_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_touch_action` values('1','0','goods','');");
E_D("replace into `ecs_touch_action` values('3','0','users_manage','');");
E_D("replace into `ecs_touch_action` values('4','0','priv_manage','');");
E_D("replace into `ecs_touch_action` values('5','0','sys_manage','');");
E_D("replace into `ecs_touch_action` values('6','0','order_manage','');");
E_D("replace into `ecs_touch_action` values('7','0','promotion','');");
E_D("replace into `ecs_touch_action` values('9','0','templates_manage','');");
E_D("replace into `ecs_touch_action` values('10','0','db_manage','');");
E_D("replace into `ecs_touch_action` values('21','1','goods_manage','');");
E_D("replace into `ecs_touch_action` values('23','1','cat_manage','');");
E_D("replace into `ecs_touch_action` values('24','1','cat_drop','cat_manage');");
E_D("replace into `ecs_touch_action` values('25','1','attr_manage','');");
E_D("replace into `ecs_touch_action` values('26','5','brand_manage','');");
E_D("replace into `ecs_touch_action` values('30','2','article_cat','');");
E_D("replace into `ecs_touch_action` values('31','2','article_manage','');");
E_D("replace into `ecs_touch_action` values('32','2','shopinfo_manage','');");
E_D("replace into `ecs_touch_action` values('33','2','shophelp_manage','');");
E_D("replace into `ecs_touch_action` values('34','2','vote_priv','');");
E_D("replace into `ecs_touch_action` values('35','7','topic_manage','');");
E_D("replace into `ecs_touch_action` values('40','3','users_manage','');");
E_D("replace into `ecs_touch_action` values('41','3','users_drop','users_manage');");
E_D("replace into `ecs_touch_action` values('42','3','user_rank','');");
E_D("replace into `ecs_touch_action` values('43','4','admin_manage','');");
E_D("replace into `ecs_touch_action` values('44','4','admin_drop','admin_manage');");
E_D("replace into `ecs_touch_action` values('45','4','allot_priv','admin_manage');");
E_D("replace into `ecs_touch_action` values('46','4','logs_manage','');");
E_D("replace into `ecs_touch_action` values('47','4','logs_drop','logs_manage');");
E_D("replace into `ecs_touch_action` values('48','5','shop_config','');");
E_D("replace into `ecs_touch_action` values('49','5','ship_manage','');");
E_D("replace into `ecs_touch_action` values('50','5','payment','');");
E_D("replace into `ecs_touch_action` values('51','5','shiparea_manage','');");
E_D("replace into `ecs_touch_action` values('52','5','area_manage','');");
E_D("replace into `ecs_touch_action` values('53','6','order_os_edit','');");
E_D("replace into `ecs_touch_action` values('54','6','order_ps_edit','order_os_edit');");
E_D("replace into `ecs_touch_action` values('55','6','order_ss_edit','order_os_edit');");
E_D("replace into `ecs_touch_action` values('56','6','order_edit','order_os_edit');");
E_D("replace into `ecs_touch_action` values('57','6','order_view','');");
E_D("replace into `ecs_touch_action` values('58','6','order_view_finished','');");
E_D("replace into `ecs_touch_action` values('59','6','repay_manage','');");
E_D("replace into `ecs_touch_action` values('60','6','booking','');");
E_D("replace into `ecs_touch_action` values('61','6','sale_order_stats','');");
E_D("replace into `ecs_touch_action` values('62','6','client_flow_stats','');");
E_D("replace into `ecs_touch_action` values('70','1','goods_type','');");
E_D("replace into `ecs_touch_action` values('74','4','template_manage','');");
E_D("replace into `ecs_touch_action` values('75','5','friendlink','');");
E_D("replace into `ecs_touch_action` values('76','5','db_backup','');");
E_D("replace into `ecs_touch_action` values('77','5','db_renew','db_backup');");
E_D("replace into `ecs_touch_action` values('78','7','snatch_manage','');");
E_D("replace into `ecs_touch_action` values('79','7','bonus_manage','');");
E_D("replace into `ecs_touch_action` values('80','7','gift_manage','');");
E_D("replace into `ecs_touch_action` values('81','7','card_manage','');");
E_D("replace into `ecs_touch_action` values('82','7','pack','');");
E_D("replace into `ecs_touch_action` values('83','7','ad_manage','');");
E_D("replace into `ecs_touch_action` values('85','3','surplus_manage','account_manage');");
E_D("replace into `ecs_touch_action` values('86','4','agency_manage','');");
E_D("replace into `ecs_touch_action` values('87','3','account_manage','');");
E_D("replace into `ecs_touch_action` values('88','5','flash_manage','');");
E_D("replace into `ecs_touch_action` values('89','5','navigator','');");
E_D("replace into `ecs_touch_action` values('90','7','auction','');");
E_D("replace into `ecs_touch_action` values('91','7','group_by','');");
E_D("replace into `ecs_touch_action` values('92','7','favourable','');");
E_D("replace into `ecs_touch_action` values('93','7','whole_sale','');");
E_D("replace into `ecs_touch_action` values('95','2','article_auto','');");
E_D("replace into `ecs_touch_action` values('96','5','cron','');");
E_D("replace into `ecs_touch_action` values('97','164','affiliate','');");
E_D("replace into `ecs_touch_action` values('98','164','affiliate_ck','');");
E_D("replace into `ecs_touch_action` values('104','7','package_manage','');");
E_D("replace into `ecs_touch_action` values('109','5','sitemap','');");
E_D("replace into `ecs_touch_action` values('110','5','file_priv','');");
E_D("replace into `ecs_touch_action` values('111','5','file_check','');");
E_D("replace into `ecs_touch_action` values('112','9','template_select','');");
E_D("replace into `ecs_touch_action` values('113','9','template_setup','');");
E_D("replace into `ecs_touch_action` values('114','9','library_manage','');");
E_D("replace into `ecs_touch_action` values('115','9','lang_edit','');");
E_D("replace into `ecs_touch_action` values('116','9','backup_setting','');");
E_D("replace into `ecs_touch_action` values('117','9','mail_template','');");
E_D("replace into `ecs_touch_action` values('118','10','db_backup','');");
E_D("replace into `ecs_touch_action` values('119','10','db_renew','');");
E_D("replace into `ecs_touch_action` values('120','10','db_optimize','');");
E_D("replace into `ecs_touch_action` values('121','10','sql_query','');");
E_D("replace into `ecs_touch_action` values('122','10','convert','');");
E_D("replace into `ecs_touch_action` values('124','11','sms_send','');");
E_D("replace into `ecs_touch_action` values('128','7','exchange_goods','');");
E_D("replace into `ecs_touch_action` values('129','6','delivery_view','');");
E_D("replace into `ecs_touch_action` values('130','6','back_view','');");
E_D("replace into `ecs_touch_action` values('131','5','reg_fields','');");
E_D("replace into `ecs_touch_action` values('132','5','shop_authorized','');");
E_D("replace into `ecs_touch_action` values('133','5','webcollect_manage','');");
E_D("replace into `ecs_touch_action` values('134','4','suppliers_manage','');");
E_D("replace into `ecs_touch_action` values('135','4','role_manage','');");
E_D("replace into `ecs_touch_action` values('138','0','wechat','');");
E_D("replace into `ecs_touch_action` values('139','138','wx_api','');");
E_D("replace into `ecs_touch_action` values('140','138','wx_menu','');");
E_D("replace into `ecs_touch_action` values('141','138','wx_config','');");
E_D("replace into `ecs_touch_action` values('142','138','wx_bonus','');");
E_D("replace into `ecs_touch_action` values('143','138','wx_regmsg','');");
E_D("replace into `ecs_touch_action` values('144','138','wx_lang','');");
E_D("replace into `ecs_touch_action` values('145','138','wx_keywords','');");
E_D("replace into `ecs_touch_action` values('146','138','wx_point','');");
E_D("replace into `ecs_touch_action` values('147','138','wx_fun','');");
E_D("replace into `ecs_touch_action` values('148','138','wx_prize','');");
E_D("replace into `ecs_touch_action` values('149','138','wx_zjd','');");
E_D("replace into `ecs_touch_action` values('150','138','wx_dzp','');");
E_D("replace into `ecs_touch_action` values('151','138','wx_qr','');");
E_D("replace into `ecs_touch_action` values('152','138','wx_order','');");
E_D("replace into `ecs_touch_action` values('153','138','wx_pay','');");
E_D("replace into `ecs_touch_action` values('154','138','wx_reorder','');");
E_D("replace into `ecs_touch_action` values('155','138','wx_fans','');");
E_D("replace into `ecs_touch_action` values('156','138','wx_oauth','');");
E_D("replace into `ecs_touch_action` values('157','138','wx_tuijian','');");
E_D("replace into `ecs_touch_action` values('158','138','wx_list','');");
E_D("replace into `ecs_touch_action` values('159','5','website','');");
E_D("replace into `ecs_touch_action` values('160','5','user_card','');");
E_D("replace into `ecs_touch_action` values('161','5','mail_settings','');");
E_D("replace into `ecs_touch_action` values('162','5','category_icon','');");
E_D("replace into `ecs_touch_action` values('163','138','wx_autoreg','');");
E_D("replace into `ecs_touch_action` values('164','0','fenxiao','');");
E_D("replace into `ecs_touch_action` values('165','164','danpin_tuiguang','');");
E_D("replace into `ecs_touch_action` values('166','5','ectouch','');");
E_D("replace into `ecs_touch_action` values('167','5','weixintong','');");
E_D("replace into `ecs_touch_action` values('168','164','qr_set','');");
E_D("replace into `ecs_touch_action` values('169','164','distribute','');");
E_D("replace into `ecs_touch_action` values('170','164','contribute','');");
E_D("replace into `ecs_touch_action` values('172','1','comment_manage','');");

require("../../inc/footer.php");
?>