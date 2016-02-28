<?php

/**

 * 码哥微信新版JSAPI支付插件

 */

if (!defined('IN_ECTOUCH')) {

    die('Hacking attempt');

}

$payment_lang = ROOT_PATH . 'lang/' .$GLOBALS['_CFG']['lang']. '/payment/wx_new_jspay.php';

if (file_exists($payment_lang))

{

    global $_LANG;



    include_once($payment_lang);

}



/* 模块的基本信息 */

if (isset($set_modules) && $set_modules == TRUE)

{

    $i = isset($modules) ? count($modules) : 0;



    /* 代码 */

    $modules[$i]['code']    = basename(__FILE__, '.php');



    /* 描述对应的语言项 */

    $modules[$i]['desc']    = 'wx_new_jspay_desc';



    /* 是否支持货到付款 */

    $modules[$i]['is_cod']  = '0';



    /* 是否支持在线支付 */

    $modules[$i]['is_online']  = '1';



    /* 作者 */

    $modules[$i]['author']  = '码哥分销团队';



    /* 网址 */

    $modules[$i]['website'] = 'http://wx.qq.com';



    /* 版本号 */

    $modules[$i]['version'] = '1.0.0';



    /* 配置信息 */

    $modules[$i]['config']  = array(

        array('name' => 'appid',           'type' => 'text',   'value' => ''),

        array('name' => 'mchid',               'type' => 'text',   'value' => ''),

        array('name' => 'key',           'type' => 'text',   'value' => ''),

        array('name' => 'appsecret',           'type' => 'text',   'value' => ''),

        array('name' => 'logs',           'type' => 'text',   'value' => ''),

    );



    return;

}





class wx_new_jspay

{

    function __construct()

    {

        $payment = get_payment('wx_new_jspay');

        if(!defined('WXAPPID'))

        {

            $root_url = str_replace('mobile/', '', $GLOBALS['ecs']->url());

            define("WXAPPID", $payment['appid']);

            define("WXMCHID", $payment['mchid']);

            define("WXKEY", $payment['key']);

            define("WXAPPSECRET", $payment['appsecret']);

            define("WXCURL_TIMEOUT", 30);

            define('WXNOTIFY_URL',$root_url.'mobile/notify/wxpay_notify.php');

            define('WXSSLCERT_PATH',dirname(__FILE__).'/WxPayPubHelper/cacert/apiclient_cert.pem');

            define('WXSSLKEY_PATH',dirname(__FILE__).'/WxPayPubHelper/cacert/apiclient_key.pem');

        }

        require_once(dirname(__FILE__)."/WxPayPubHelper/WxPayPubHelper.php");



    }





    function get_code($order, $payment)

    {

        

        $jsApi = new JsApi_pub();



       

        /*if (!isset($_GET['code']))

        {

            $redirect = urlencode($GLOBALS['ecs']->url().'flow.php?step=ok&order_id='.$order['order_sn']);

            $url = $jsApi->createOauthUrlForCode($redirect);

            Header("Location: $url"); 

        }else

        {

			

            $code = $_GET['code'];

            $jsApi->setCode($code);

            $openid = $jsApi->getOpenId();

        }*/

		if(empty($_SESSION['wechat_id'])){

			 require_once(ROOT_PATH . "include/cls_wechat.php");

			 $wechat = new Wechat();

			 $code = $wechat->get_oauth2_code();

			 $openid = $wechat->get_oauth2_openid($code);

		}

		else

		     $openid = $_SESSION['wechat_id'];

        if($openid)

        {

            $unifiedOrder = new UnifiedOrder_pub();

            $unifiedOrder->setParameter("appid",WXAPPID);

            $unifiedOrder->setParameter("openid","$openid");//商品描述

            $unifiedOrder->setParameter("body",$order['order_sn']);//商品描述

            $out_trade_no = $order['order_sn'];

            $unifiedOrder->setParameter("out_trade_no","$out_trade_no");//商户订单号 

            $unifiedOrder->setParameter("attach",strval($order['log_id']));//商户支付日志

            $unifiedOrder->setParameter("total_fee",strval(intval($order['order_amount']*100)));//总金额

            $unifiedOrder->setParameter("notify_url",WXNOTIFY_URL);//通知地址

            $unifiedOrder->setParameter("trade_type","JSAPI");//交易类型

          

            $prepay_id = $unifiedOrder->getPrepayId();

            $jsApi->setPrepayId($prepay_id);



            $jsApiParameters = $jsApi->getParameters();



            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $allow_use_wxPay = true;



            if(strpos($user_agent, 'MicroMessenger') === false)

            {

                $allow_use_wxPay = false;

            }

            else

            {

                preg_match('/.*?(MicroMessenger\/([0-9.]+))\s*/', $user_agent, $matches);

                if($matches[2] < 5.0)

                {

                    $allow_use_wxPay = false;

                }

            }

            $html .= '<script language="javascript">';

            if($allow_use_wxPay)

            {

                $html .= "function jsApiCall(){";

                $html .= "WeixinJSBridge.invoke(";

                $html .= "'getBrandWCPayRequest',";

                $html .= $jsApiParameters.",";

                $html .= "function(res){";

                $html .= "if(res.err_msg == 'get_brand_wcpay_request:ok'){window.location.href='".$GLOBALS['ecs']->url()."respond.php?code=wx_new_jspay&status=1&logid=".$order['log_id']."'}";

                //$html .= "WeixinJSBridge.log(res.err_msg);";

                $html .= "}";

                $html .= ");";

                $html .= "}";

                $html .= "function callpay(){";

                $html .= 'if (typeof WeixinJSBridge == "undefined"){';

                $html .= "if( document.addEventListener ){";

                $html .= "document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);";

                $html .= "}else if (document.attachEvent){";

                $html .= "document.attachEvent('WeixinJSBridgeReady', jsApiCall); ";

                $html .= "document.attachEvent('onWeixinJSBridgeReady', jsApiCall);";

                $html .= "}";

                $html .= "}else{";

                $html .= "jsApiCall();";

                $html .= "}}";

            }

            else

            {

                $html .= 'function callpay(){';

                $html .= 'alert("您的微信不支持支付功能,请更新您的微信版本")';

                $html .= "}";



            }



            $html .= '</script>';

            $html .= '<button type="button" onclick="callpay()" class="pay_btn">微信支付</button>';



            return $html;



        }

        else

        {

            $html .= '<script language="javascript">';

            $html .= 'function callpay(){';

            $html .= 'alert("请在微信中使用微信支付")';

            $html .= "}";

            $html .= '</script>';

            $html .= '<button type="button" onclick="callpay()" class="pay_btn">微信支付</button>';



            return $html;

        }



        

    }

    function respond()

    {

        if(!empty($_REQUEST['logid']))

        {

			    //判断log_id的状态

                $log_id = intval($_REQUEST['logid']);

                $sql = 'SELECT is_paid FROM ' . $GLOBALS['ecs']->table('pay_log') ." WHERE log_id = '$log_id'";

                $is_paid = $GLOBALS['db']->getOne($sql);       

                return $is_paid;

        }

       

        return false;

       

    }

    

    function log($file,$txt)

    {

       $fp =  fopen($file,'ab+');

       fwrite($fp,'-----------'.local_date('Y-m-d H:i:s').'-----------------');

       fwrite($fp,$txt);

       fwrite($fp,"\r\n\r\n\r\n");

       fclose($fp);

    }

    

}

?>