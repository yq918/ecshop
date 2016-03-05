<?php
/**
 * 粉丝营销方案
 * 
 * @author 23164666@qq.com
 */

define('MIDDLE_PRICE_NUM', 20); //中级会员人数
define('SUPPER_PRICE_NUM', 50); //高级会员人数

//只返回数字，不格式化，方便各种比较大小
function plus_price ($shop_price, $goods_id) {

	//如果商品ID为空或客户ID为空
	$user_id = intval($_SESSION['user_id']);
	if (empty($goods_id) || empty($user_id)) return $shop_price;

	$sql = 'SELECT g.goods_plus FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g WHERE g.goods_id =  ' . $goods_id;
	$result = $GLOBALS['db']->getOne($sql);
	$goods_plus = unserialize($result);
	//如果没有启用粉丝方案
	if ($goods_plus['0'] != 1) return $shop_price;

	//如果误传，强力去掉多余的符号
	$array = explode('%s', $GLOBALS['_CFG']['currency_format']);
	foreach ($array as $val){
		$shop_price = str_replace($val, '', $shop_price);
	}
	//判断会员粉丝数
	$all_affiliate_persons = get_affiliate_persons($user_id);

	if ($all_affiliate_persons>=SUPPER_PRICE_NUM){
		$final_price = $goods_plus[1] + $goods_plus[4];
	} else if ($all_affiliate_persons>=MIDDLE_PRICE_NUM) {
		$final_price = $goods_plus[1] + $goods_plus[3];
	} else {
		$final_price = $goods_plus[1] + $goods_plus[2];
	}
	return $final_price>0?min($final_price, $shop_price):$shop_price;
}
//结算的价格
function plus_price_cart ($shop_price, $goods_id) {

	//如果商品ID为空或客户ID为空
	$user_id = intval($_SESSION['user_id']);
	if (empty($goods_id) || empty($user_id)) return $shop_price;

	$sql = 'SELECT g.goods_plus FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g WHERE g.goods_id =  ' . $goods_id;
	$result = $GLOBALS['db']->getOne($sql);
	$goods_plus = unserialize($result);
	//如果没有启用粉丝方案
	if ($goods_plus['0'] != 1) return $shop_price;

	//如果误传，强力去掉多余的符号
	$array = explode('%s', $GLOBALS['_CFG']['currency_format']);
	foreach ($array as $val){
		$shop_price = str_replace($val, '', $shop_price);
	}
	//判断会员粉丝数
	$all_affiliate_persons = get_affiliate_persons($user_id);
	
	$percent_jiajia = floatval($goods_plus[5])/100;//强制忽略错误
	$percent_youhui = floatval($goods_plus[6])/100;

	if ($all_affiliate_persons>=SUPPER_PRICE_NUM){
		$final_price = $goods_plus[1] + $goods_plus[4] - $goods_plus[4]*$percent_jiajia*$percent_youhui;
	} else if ($all_affiliate_persons>=MIDDLE_PRICE_NUM) {
		$final_price = $goods_plus[1] + $goods_plus[3] - $goods_plus[3]*$percent_jiajia*$percent_youhui;
	} else {
		$final_price = $goods_plus[1] + $goods_plus[2] - $goods_plus[2]*$percent_jiajia*$percent_youhui;
	}
	return $final_price>0?min($final_price, $shop_price):$shop_price;
}
//计算粉丝数
function get_affiliate_persons($user_id){
	$first_affiliate_persons = $GLOBALS['db']->getOne("SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('users') . " WHERE affiliate_id=".$user_id);
	$second_affiliate_persons = $GLOBALS['db']->getOne("SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('users') . " WHERE second_affiliate_id=".$user_id);
	$third_affiliate_persons = $GLOBALS['db']->getOne("SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('users') . " WHERE third_affiliate_id=".$user_id);
	$all_affiliate_persons = $first_affiliate_persons + $second_affiliate_persons + $third_affiliate_persons;
	return $all_affiliate_persons;
}
function shop_price_arr($cart_goods) {
	//print_r($cart_goods);
	if (is_array($cart_goods)) {
		foreach ($cart_goods as $goods){

			$num = $goods['goods_number'];
			$goods_id = $goods['goods_id'];
			$user_id = $goods['user_id'];

			$sql = 'SELECT g.shop_price FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g WHERE g.goods_id =  ' . $goods_id;
			$shop_price = $GLOBALS['db']->getOne($sql);
			//print_r($result);
			$shop_price = plus_price($shop_price,$goods_id);

			//应付金额
			$ret['should_pay'] += $num*$shop_price;
			//实际支付
			$ret['pay'] += $num*get_final_price($goods_id);
		}
		$ret['save'] = $ret['should_pay']-$ret['pay'];
	}
	//print_r($ret);
	$pays = $ret['pay'];
	$saves = $ret['save'];
	foreach ($ret as $key=>$val){
		$ret[$key] = price_format($val);
	}
	$ret['pays'] = $pays;
	$ret['saves'] = $saves;
	return $ret;
}
?>