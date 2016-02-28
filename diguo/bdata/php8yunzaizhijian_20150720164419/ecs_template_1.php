<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_template`;");
E_C("CREATE TABLE `ecs_template` (
  `filename` varchar(30) NOT NULL DEFAULT '',
  `region` varchar(40) NOT NULL DEFAULT '',
  `library` varchar(40) NOT NULL DEFAULT '',
  `sort_order` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `number` tinyint(1) unsigned NOT NULL DEFAULT '5',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `theme` varchar(60) NOT NULL DEFAULT '',
  `remarks` varchar(30) NOT NULL DEFAULT '',
  KEY `filename` (`filename`,`region`),
  KEY `theme` (`theme`),
  KEY `remarks` (`remarks`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `ecs_template` values('index','左边区域','/library/vote_list.lbi','8','0','0','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/email_list.lbi','9','0','0','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/order_query.lbi','6','0','0','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/cart.lbi','0','0','0','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/promotion_info.lbi','3','0','0','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/auction.lbi','4','0','3','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/group_buy.lbi','5','0','3','0','default','');");
E_D("replace into `ecs_template` values('index','','/library/recommend_promotion.lbi','0','0','4','0','default','');");
E_D("replace into `ecs_template` values('index','右边主区域','/library/recommend_hot.lbi','2','0','10','0','default','');");
E_D("replace into `ecs_template` values('index','右边主区域','/library/recommend_new.lbi','1','0','10','0','default','');");
E_D("replace into `ecs_template` values('index','右边主区域','/library/recommend_best.lbi','0','0','10','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/invoice_query.lbi','7','0','0','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/top10.lbi','2','0','0','0','default','');");
E_D("replace into `ecs_template` values('index','左边区域','/library/category_tree.lbi','1','0','0','0','default','');");
E_D("replace into `ecs_template` values('index','','/library/brands.lbi','0','0','11','0','default','');");
E_D("replace into `ecs_template` values('category','左边区域','/library/category_tree.lbi','1','0','0','0','default','');");
E_D("replace into `ecs_template` values('category','右边区域','/library/recommend_best.lbi','0','0','5','0','default','');");
E_D("replace into `ecs_template` values('category','右边区域','/library/goods_list.lbi','1','0','0','0','default','');");
E_D("replace into `ecs_template` values('category','右边区域','/library/pages.lbi','2','0','0','0','default','');");
E_D("replace into `ecs_template` values('category','左边区域','/library/cart.lbi','0','0','0','0','default','');");
E_D("replace into `ecs_template` values('category','左边区域','/library/price_grade.lbi','3','0','0','0','default','');");
E_D("replace into `ecs_template` values('category','左边区域','/library/filter_attr.lbi','2','0','0','0','default','');");

require("../../inc/footer.php");
?>