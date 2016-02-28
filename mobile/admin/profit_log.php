<?php

/*
  / 佣金历史
*/
define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/includes/init.php');
include_once(ROOT_PATH . 'include/lib_order.php');
if ($_REQUEST['act'] == 'list')
{
    $uid = empty($_REQUEST['uid']) ? 0 : intval($_REQUEST['uid']);
    if ($uid <= 0)
    {
        sys_msg('invalid param');
    }
	$user = user_info($uid);
    if (empty($user))
    {
        sys_msg($_LANG['user_not_exist']);
    }
	$smarty->assign('full_page', 1);
    $smarty->assign('user', $user);
	$res = get_profitlist($uid);
	$log_list = $res['list'];
	foreach($log_list as $k=>$a){
	   $user_name = $db->getRow("SELECT user_name,nick_name FROM ".$ecs->table('users')." WHERE user_id=".$a['buyer_id']);
	   if(!$user_name)
	      $buyer = "[用户已被删除]";
	   else	  
	      $buyer = "[ID:".$user_name['user_name']."]".$user_name['nick_name'];
	   if($a['brokerage_level'] == 1)
	      $rank = $wxconf['one_level_member_name'];
	   elseif($a['brokerage_level'] == 2)
	      $rank = $wxconf['two_level_member_name'];	  	 
	   elseif($a['brokerage_level'] == 3)
	      $rank = $wxconf['three_level_member_name'];
	   $log_list[$k]['rank']  = $rank;	 	 
	   $log_list[$k]['buyer'] = $buyer;	 
	}	
	$smarty->assign('log_list',    $log_list);
    $smarty->assign('filter',       $res['filter']);
    $smarty->assign('record_count', $res['record_count']);
    $smarty->assign('page_count',   $res['page_count']);
	assign_query_info();
    $smarty->display('distribute_profit_log.htm');
}
/* 佣金记录 */
elseif($_REQUEST['act'] == 'query'){
    $uid = empty($_REQUEST['uid']) ? 0 : intval($_REQUEST['uid']);
    if ($uid <= 0)
    {
        sys_msg('invalid param');
    }
	$user = user_info($uid);
    if (empty($user))
    {
        sys_msg($_LANG['user_not_exist']);
    }
    $smarty->assign('user', $user);
	$res = get_profitlist($uid);
	$log_list = $res['list'];
	foreach($log_list as $k=>$a){
	   $user_name = $db->getRow("SELECT user_name,nick_name FROM ".$ecs->table('users')." WHERE user_id=".$a['buyer_id']);
	   if(!$user_name)
	      $buyer = "[用户已被删除]";
	   else	  
	      $buyer = "[ID:".$user_name['user_name']."]".$user_name['nick_name'];
	   if($a['brokerage_level'] == 1)
	      $rank = $wxconf['one_level_member_name'];
	   elseif($a['brokerage_level'] == 2)
	      $rank = $wxconf['two_level_member_name'];	  	 
	   elseif($a['brokerage_level'] == 3)
	      $rank = $wxconf['three_level_member_name'];
	   $log_list[$k]['rank']  = $rank;	 	 
	   $log_list[$k]['buyer'] = $buyer;	 
	}	
	$smarty->assign('log_list',    $log_list);
    $smarty->assign('filter',       $res['filter']);
    $smarty->assign('record_count', $res['record_count']);
    $smarty->assign('page_count',   $res['page_count']);
	make_json_result($smarty->fetch('distribute_profit_log.htm'), '',
    array('filter' => $res['filter'], 'page_count' => $res['page_count']));
	
}
function get_profitlist($user_id)
{
    /* 检查参数 */
    $where = " WHERE profit_user_id = '$user_id' ";
	
    /* 初始化分页参数 */
    $filter = array(
        'uid'       => $user_id
    );

    /* 查询记录总数，计算分页数 */
    $sql = "SELECT COUNT(*) FROM wxch_brokerage_log ". $where;
    $filter['record_count'] = $GLOBALS['db']->getOne($sql);
    $filter = page_and_size($filter);

    /* 查询记录 */
    $sql = "SELECT * FROM wxch_brokerage_log ". $where .
            " ORDER BY b_id DESC";
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

    $arr = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $row['time'] = local_date($GLOBALS['_CFG']['time_format'], $row['log_time']);
        $arr[] = $row;
    }

    return array('list' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}

?>