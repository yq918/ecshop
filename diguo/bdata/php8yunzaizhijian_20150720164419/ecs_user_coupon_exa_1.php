/*
Navicat MySQL Data Transfer

Source Server         : 本地测试
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : php8yunzaizhijian

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2016-03-06 07:36:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ecs_user_coupon_exa
-- ----------------------------
DROP TABLE IF EXISTS `ecs_user_coupon_exa`;
CREATE TABLE `ecs_user_coupon_exa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '会员级别0，普通会员，1中级，2，高级3，金牌，4普通代理，5高级代理',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠券金额',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='用户级别对应可创建的金额';

<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_user_coupon_exa`;");
E_C("CREATE TABLE `ecs_user_coupon_exa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '会员级别0，普通会员，1中级，2，高级3，金牌，4普通代理，5高级代理',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠券金额',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='用户级别对应可创建的金额';");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('1', '0', '100.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('2', '1', '100.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('3', '1', '200.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('4', '2', '100.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('5', '2', '200.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('6', '2', '300.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('7', '3', '100.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('8', '3', '200.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('9', '3', '300.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('10', '3', '400.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('11', '4', '100.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('12', '4', '200.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('13', '4', '300.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('14', '4', '400.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('15', '4', '500.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('16', '5', '100.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('17', '5', '200.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('18', '5', '300.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('19', '5', '400.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('20', '5', '500.00');");
E_D("replace  INTO `ecs_user_coupon_exa` VALUES ('21', '5', '600.00');");





require("../../inc/footer.php");
?>