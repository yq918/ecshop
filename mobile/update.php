<?php
//数据库升级程序，升级完成后可删除
//23164666@qq.com

define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/include/init.php');

echo "数据库升级：<br>";

$update = true;
$fieldArr = $db->getAll("show columns from `ecs_goods`");
foreach ($fieldArr as $val) {
	if ($val['Field']=='goods_plus') {
		$update = false;
		break;
	}
}
if ($update) {
	$sql = "ALTER TABLE `ecs_goods` ADD `goods_plus` VARCHAR(255) NOT NULL COMMENT '粉丝方案'";
	$db->query($sql);
	echo "ecs_goods 升级成功<br>";
} else {
	echo "ecs_goods 无需升级<br>";
}



$update = true;
$fieldArr = $db->getAll("show columns from `ecs_cart`");
foreach ($fieldArr as $val) {
	if ($val['Field']=='plus_price') {
		$update = false;
		break;
	}
}
if ($update) {
	$sql = "ALTER TABLE `ecs_cart` ADD `plus_price` DECIMAL( 10, 2 ) NOT NULL DEFAULT '0.00' AFTER `goods_price` ;";
	$db->query($sql);
	echo "ecs_cart 升级成功<br>";
} else {
	echo "ecs_cart 无需升级<br>";
}