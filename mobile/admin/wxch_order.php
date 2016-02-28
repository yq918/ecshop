<?php
$access_token = access_token($db);
$url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
$query_sql = "SELECT wxid FROM " . $ecs->table('users') . " WHERE user_id = '$order[user_id]'";
$ret_w = $db->getRow($query_sql);
$wxid = $ret_w['wxid'];
$query_sql = "SELECT * FROM " . $ecs->table('order_goods') . "  WHERE `order_id` = '$order[order_id]'";
$order_goods = $db->getAll($query_sql);
$orders = $db->getRow("SELECT * FROM " . $ecs->table('order_info') . " WHERE `user_id` = '$order[user_id]' AND `order_id` = '$order[order_id]'");
if(!empty($order_goods)) 
{
	foreach($order_goods as $v) 
	{
		if(empty($v['goods_attr']))
		{
			$shopinfo .= $v['goods_name'].'('.$v['goods_number'].'),';
		}
		else
		{
			$shopinfo .= $v['goods_name'].'（'.$v['goods_attr'].'）('.$v['goods_number'].'),';
		}
	}
	$shopinfo = substr($shopinfo, 0, strlen($shopinfo)-1);
}
$wxch_address = "\r\n收件地址：".$orders['address'];
$wxch_consignee = "\r\n收件人：".$orders['consignee'];
$sql = "SELECT * FROM wxch_order WHERE id = 1";
$cfg_order = $db->getRow($sql);
$cfg_baseurl = $db->getOne("SELECT cfg_value FROM wxch_cfg WHERE cfg_name = 'baseurl'");
$cfg_murl = $db->getOne("SELECT cfg_value FROM wxch_cfg WHERE cfg_name = 'murl'");
$w_title = $cfg_order['title'];
$w_description = '商品信息：'.$shopinfo."\r\n总金额：".$orders['money_paid']."\r\n快递公司：".$order['shipping_name'].' 单号：'.$order['invoice_no'].$wxch_consignee.$wxch_address;
$w_url = $cfg_baseurl.$cfg_murl.'user.php?act=order_detail&order_id='.$order['order_id'].'&wxid='.$wxid;
if($orders['pay_status'] == 0) 
{
	$pay_status = '支付状态：未付款';
}
elseif($orders['pay_status'] == 1) 
{
	$pay_status = '支付状态：付款中';
}
elseif($orders['pay_status'] == 2) 
{
	$pay_status = '支付状态：已付款';
}
$http_ret1 = stristr($cfg_order['image'],'http://');
$http_ret2 = stristr($cfg_order['image'], 'http:\\');
if($http_ret1 or $http_ret2) 
{
	$w_picurl = $cfg_order['image'];
}
else 
{
	$w_picurl = $cfg_baseurl.'mobile/'.$cfg_order['image'];
}
$post_msg = '{
   "touser":"'.$wxid.'",
   "msgtype":"news",
   "news":{
       "articles": [
        {
            "title":"'.$w_title.'",
            "description":"'.$w_description.'",
            "url":"'.$w_url.'",
            "picurl":"'.$w_picurl.'"
        }
        ]
   }
}';
$ret_json = curl_grab_page($url, $post_msg);
$ret = json_decode($ret_json);
if($ret->errmsg != 'ok') 
{
	$access_token = new_access_token($db);
	$url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
	curl_grab_page($url, $post_msg);
}
function access_token($db) 
{
	$ret = $db->getRow("SELECT * FROM `wxch_config` WHERE `id` = 1");
	$appid = $ret['appid'];
	$appsecret = $ret['appsecret'];
	$access_token = $ret['access_token'];
	$dateline = $ret['dateline'];
	$time = time();
	if(($time - $dateline) >= 7200) 
	{
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
		$ret_json = curl_get_contents($url);
		$ret = json_decode($ret_json);
		if($ret->access_token)
		{
			$db->query("UPDATE `wxch_config` SET `access_token` = '$ret->access_token',`dateline` = '$time' WHERE `id` =1;");
			return $ret->access_token;
		}
	}
	elseif(empty($access_token)) 
	{
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
		$ret_json = curl_get_contents($url);
		$ret = json_decode($ret_json);
		if($ret->access_token)
		{
			$db->query("UPDATE `wxch_config` SET `access_token` = '$ret->access_token',`dateline` = '$time' WHERE `id` =1;");
			return $ret->access_token;
		}
	}
	else 
	{
		return $access_token;
	}
}
function curl_grab_page($url,$data,$proxy='',$proxystatus='',$ref_url='') 
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
	curl_setopt($ch, CURLOPT_TIMEOUT, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	if ($proxystatus == 'true') 
	{
		curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
		curl_setopt($ch, CURLOPT_PROXY, $proxy);
	}
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_URL, $url);
	if(!empty($ref_url))
	{
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_REFERER, $ref_url);
	}
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	ob_start();
	return curl_exec ($ch);
	ob_end_clean();
	curl_close ($ch);
	unset($ch);
}
?>