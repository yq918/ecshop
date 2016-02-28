<?php
/*
 * 码哥分销QQ295520424 
*/
define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/include/init.php');
require(ROOT_PATH . 'include/lib_weixintong.php');
$action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
$smarty->assign('request_page', 'distribute.php');
//管理员查看分销
if ($_REQUEST['from'] == 'manager' || $_SESSION['from']=='manager'){
	 $_SESSION['from'] = 'manager';
	 if(!empty($_GET['uid']))
	   $_SESSION['user_id'] = $_GET['uid'];
	 $user_id = $_SESSION['user_id'];
	 $smarty->assign('is_admin', 1);
}else{
//身份验证
$user_id = $wechat->get_userid();
//判断是否关注
if(!$wechat->is_subscribe_byid($user_id)){
   ecs_header("Location: wxch_unsubscribe.php\n");
   exit;	
}
    $smarty->assign('is_admin', 0);
}

$distri = new Distribute();
$distri->auto($user_id);

$not_login = array('');
$ui_arr = array('default', 'member', 'detail', 'qr_show');
/* 如果是显示页面，对页面进行相应赋值 */
if (in_array($action, $ui_arr))
{
    assign_template();
    $position = assign_ur_here(0, $_LANG['user_center']);
    $smarty->assign('page_title', $position['title']); // 页面标题
    $smarty->assign('ur_here',    $position['ur_here']);
    $sql = "SELECT value FROM " . $ecs->table('touch_shop_config') . " WHERE id = 419";
    $row = $db->getRow($sql);
    $car_off = $row['value'];
    $smarty->assign('car_off',       $car_off);
    $smarty->assign('data_dir',   DATA_DIR);   // 数据目录
    $smarty->assign('action',     $action);
    //$smarty->assign('lang',       $_LANG);
}

//用户分销首页
if ($action == 'default')
{
        include_once(ROOT_PATH .'include/lib_clips.php');
	$do = new Distribute();
	$info = $db->getRow("SELECT * FROM " . $ecs->table('users') . " WHERE user_id=".$user_id);
	if(!$info['is_distributor'] && !$wxconf[is_my_distribute_view]){
	    show_message('您不是'.$wxconf[distributor_name]); return;   
	}
	if($info['is_subscribe']){
	   $info['subscribe_time'] = date('Y-m-d', $info['subscribe_time']);	
	}
	if($info['affiliate_id']>0){
 	    $info['parent_user'] = $db->getOne("SELECT nick_name FROM " . $ecs->table('users') . " WHERE user_id=".$info['affiliate_id']);
	}else{
	   	$info['parent_user'] = $wxconf[app_name];
	}
    $smarty->assign('info',  $info);
	/*if(!$info['is_distributor']){
	    show_message('您不是'.$wxconf[distributor_name].'', '返回会员中心', "user.php", 'error');
	    exit();
	}*/
	$distri_info = array();
	//下线会员信息
	$distri_info['first_affiliate_persons'] = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('users') . " WHERE affiliate_id=".$user_id);
	$distri_info['second_affiliate_persons'] = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('users') . " WHERE second_affiliate_id=".$user_id);
	$distri_info['third_affiliate_persons'] = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('users') . " WHERE third_affiliate_id=".$user_id);
	$distri_info['all_affiliate_persons'] = $distri_info['first_affiliate_persons'] + $distri_info['second_affiliate_persons'] + $distri_info['third_affiliate_persons'];
	//推广信息
	$distri_info['promote_clicks'] = $db->getOne("SELECT COUNT(*) FROM wxch_promote_log WHERE promoter=".$user_id);
	$distri_info['promote_subscribe'] = $db->getOne("SELECT COUNT(*) FROM wxch_promote_log WHERE promoter=".$user_id." AND is_subscribe>0");
	$distri_info['promote_distributor'] = $db->getOne("SELECT COUNT(*) FROM wxch_promote_log WHERE promoter=".$user_id." AND is_distributor=1");
	/* 佣金信息 */
	//一级会员ids
	$first_affiliate = $db->getAll("SELECT user_id FROM " . $ecs->table('users') . " WHERE affiliate_id=".$user_id);
	$first_affiliate_arr = array();
	foreach($first_affiliate as $k=>$val){
	   	$first_affiliate_arr[$k] = $val['user_id'];
	}
	if(is_array($first_affiliate_arr) || count($first_affiliate_arr)>0){
	    $first_affiliate_str = implode(",", $first_affiliate_arr);	
	}
	//二级会员ids
	$second_affiliate = $db->getAll("SELECT user_id FROM " . $ecs->table('users') . " WHERE second_affiliate_id=".$user_id);
	$second_affiliate_arr = array();
	foreach($second_affiliate as $k=>$val){
	   	$second_affiliate_arr[$k] = $val['user_id'];
	}
	if(is_array($second_affiliate_arr) || count($second_affiliate_arr)>0){
	    $second_affiliate_str = implode(",", $second_affiliate_arr);	
	}
	//三级会员ids
	$third_affiliate = $db->getAll("SELECT user_id FROM " . $ecs->table('users') . " WHERE third_affiliate_id=".$user_id);
	$third_affiliate_arr = array();
	foreach($third_affiliate as $k=>$val){
	   	$third_affiliate_arr[$k] = $val['user_id'];
	}
	if(is_array($third_affiliate_arr) || count($third_affiliate_arr)>0){
	    $third_affiliate_str = implode(",", $third_affiliate_arr);	
	}
	/* 未生效（分销）收入 */
	$undistri_brokerage_first = 0; $undistri_brokerage_second = 0; $undistri_brokerage_third = 0; $undistri_brokerage_all = 0;
	//一级未生效
	if(!empty($first_affiliate_str)){
	    $undistri_order_list_first = $db->getAll("SELECT order_id FROM " . $ecs->table('order_info') . " WHERE user_id in (".$first_affiliate_str.") AND distribute_status=0");
	    foreach($undistri_order_list_first as $k=>$order){
	   	  $brokerage_add = $do->order_brokerage($user_id, $order[order_id], 'one_level_deduct');
		  $undistri_brokerage_first += $brokerage_add;
	    }
	}
	//二级未生效
	if(!empty($second_affiliate_str)){
	    $undistri_order_list_second = $db->getAll("SELECT order_id FROM " . $ecs->table('order_info') . " WHERE user_id in (".$second_affiliate_str.") AND distribute_status=0");
	    foreach($undistri_order_list_second as $k=>$order){
	   	  $brokerage_add = $do->order_brokerage($user_id, $order[order_id], 'two_level_deduct');
		  $undistri_brokerage_second += $brokerage_add;
	    }
	}
	//三级未生效
	if(!empty($third_affiliate_str)){
	    $undistri_order_list_third = $db->getAll("SELECT order_id FROM " . $ecs->table('order_info') . " WHERE user_id in (".$third_affiliate_str.") AND distribute_status=0");
	    foreach($undistri_order_list_third as $k=>$order){
	   	  $brokerage_add = $do->order_brokerage($user_id, $order[order_id], 'three_level_deduct');
		  $undistri_brokerage_third += $brokerage_add;
	    }
	}
	///未生效总计
	$distri_info['undistri_brokerage_all'] = round(($undistri_brokerage_first + $undistri_brokerage_second + $undistri_brokerage_third),2);
	//已生效（分销）收入
	$distri_info['real_brokerage'] = round($info[brokerage_all],2);
	$smarty->assign('distri', $distri_info);
    $smarty->display('distribute.dwt');
}
//会员列表
elseif($action == 'member'){
   	$level = $_GET['level'] ? intval($_GET['level']) : 1;
	$page    = (isset($_REQUEST['page'])) ? intval($_REQUEST['page']) : 1;
	$size  = 20;
	$from = ($page-1) * $size;
	$end  =  $from + $size;
	$level_arr = array(1=>'affiliate_id', 2=>'second_affiliate_id', 3=>'third_affiliate_id');
	$count = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('users') . " WHERE ".$level_arr[$level]."=$user_id");
	$mem_list = $db->getAll("SELECT user_id,user_name,nick_name,head_url,is_subscribe,subscribe_time FROM " . $ecs->table('users') . " WHERE ".$level_arr[$level]."=$user_id ORDER BY user_id DESC LIMIT $from,$size");
	foreach($mem_list as $l=>$m){
	    $mem_list[$l]['sub_time'] = date('Y-m-d', $m['subscribe_time']);
		$mem_list[$l]['url'] = "distribute.php?act=detail&level=".$level."&id=".$m['user_id'];
	}
	        /* 分页样式 */
        $pager = array();
		$pager['url']          = "distribute.php?act=member&level=".$level."&page=";
        $pager['page']         = $page;
        $pager['size']         = $size;
        $pager['record_count'] = $count;
        $pager['page_count']   = $page_count = ($count > 0) ? intval(ceil($count / $size)) : 1;
		for($i=1; $i<=$pager['page_count']; $i++){
			$pager['page_number'][$i]  =  $pager['url'].$i;
		}
        $pager['page_first']   = "javascript:link_to('".$pager['url']."1')";
        $pager['page_prev']    = $page > 1 ? "javascript:link_to('".$pager[url].($page - 1) . "')" : 'javascript:;';
        $pager['page_next']    = $page < $page_count ? "javascript:link_to('".$pager[url].($page + 1) . "')" : "javascript:;";
        $pager['page_last']    = $page < $page_count ? "javascript:link_to('".$pager[url].$page_count."')"  : "javascript:;";

        $smarty->assign('notes', $bought_notes);
        $smarty->assign('pager', $pager);
	
	$smarty->assign('level', $level);
	$smarty->assign('count', $count);
	$smarty->assign('mem_list', $mem_list);
    $smarty->display('distribute.dwt');
}
//下级会员详情
elseif($action == 'detail'){
   $id = $_GET['id'];	
   $level = $_GET['level'];
   $info = $db->getRow("SELECT * FROM " . $ecs->table('users') . " WHERE user_id=".$id);
   if($info){
	   if($info['is_subscribe']){
	      $info['subscribe_time'] = date('Y-m-d', $info['subscribe_time']);	
	   }
	   if($info['affiliate_id']>0){
 	    $info['parent_user'] = $db->getOne("SELECT nick_name FROM " . $ecs->table('users') . " WHERE user_id=".$info['affiliate_id']);
	   }else{
	   	$info['parent_user'] = $wxconf[app_name];
	   }
	   $info['sex'] = $info[sex] == 2 ? "她的" : "他的";
	   $brokerage_total = $db->getOne("SELECT SUM(brokerage) FROM wxch_brokerage_log WHERE buyer_id =".$id." AND profit_user_id=".$user_id);
	   $info['brokerage_total'] = $brokerage_total ? $brokerage_total : 0;
	   $sales_total= $db->getOne("SELECT SUM(order_price) FROM wxch_brokerage_log WHERE buyer_id =".$id." AND profit_user_id=".$user_id);
	   $info['sales_total'] = $sales_total ? $sales_total : 0;
	   $levels[1]['name'] = $wxconf['one_level_member_name'];
	   $levels[2]['name'] = $wxconf['two_level_member_name'];
	   $levels[3]['name'] = $wxconf['three_level_member_name'];
	   $levels[1]['persons'] = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('users') . " WHERE affiliate_id=".$id);
	   $levels[2]['persons'] = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('users') . " WHERE second_affiliate_id=".$id);
 	   $levels[3]['persons'] = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('users') . " WHERE third_affiliate_id=".$id);
	   $levels[1]['sales'] = round($info['sales_first'],2);
	   $levels[2]['sales'] = round($info['sales_second'],2);
	   $levels[3]['sales'] =  round($info['sales_third'],2);
	   $levels[1]['brokerage'] =  round($info['brokerage_first'],2);
	   $levels[2]['brokerage'] =  round($info['brokerage_second'],2);
	   $levels[3]['brokerage'] =  round($info['brokerage_third'],2);
	   $smarty->assign('info', $info);
	   $smarty->assign('level', $level);
	   $smarty->assign('levels', $levels);
	   $smarty->display('distribute.dwt');
   }
   else{
	    show_message('没有找到相关数据', '返回会员中心', "user.php", 'error');
	    exit();   
   }	
}
elseif($action== "qr_show"){

 $do = new Distribute();
$distri = new Distribute();
$distri->auto($user_id);  

   $qr_data = $db->getRow("SELECT * FROM `wxch_qr` WHERE `type` = 'qr' AND action_name='QR_LIMIT_SCENE' AND scene='".$user_id."'");
   if($qr_data){
	   $smarty->assign('is_qr', 1);
	}else{
	   $smarty->assign('is_qr', 0);	
	}

	if(empty($qr_data['distri_qr_path'])){
	   $res = $do->create_qr_code($user_id);
	   if($res['status'] == 1){
		   $sql = "UPDATE wxch_qr SET  distri_qr_path='".$res[url]."' WHERE qid=".$qr_data['qid'];
	       $db->query($sql);  
		   $qr_data['qr_url'] = "/".$res[url];
	   }else{
		   exit($res['errmsg']);
		   if(empty($qr_data['qr_path'])) {
			  	$qr_data['qr_url'] = 'http://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$qr_data['ticket'];
           }else{
			  	$qr_data['qr_url'] = '/mobile/'.$qr_data['qr_path'];
           }
	   }
	   
	}else{
	   	$qr_data['qr_url'] = "/" . $qr_data['distri_qr_path'];
	}

	$smarty->assign('qr', $qr_data);
	$smarty->display('distribute.dwt');
}


?>