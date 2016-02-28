<?php

/*
  / 分销管理
*/
define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/includes/init.php');
admin_priv('distribute');
require_once(ROOT_PATH . 'include/cls_distribute.php');
$distri = new Distribute();
if ($_REQUEST['act'] == 'list')
{
    $smarty->assign('ur_here',      '分销贡献');
    $user_list = contribute_list();
    $distri_list = $user_list['user_list'];
    $smarty->assign('user_list',    $distri_list);
    $smarty->assign('filter',       $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count',   $user_list['page_count']);
    $smarty->assign('full_page',    1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');
    assign_query_info();
    $smarty->display('distri_contribute_list.htm');
}
/*------------------------------------------------------ */
//-- ajax返回用户列表
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
	
    $user_list = contribute_list();

    $smarty->assign('user_list',    $user_list['user_list']);
    $smarty->assign('filter',       $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count',   $user_list['page_count']);

    $sort_flag  = sort_flag($user_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('distri_contribute_list.htm'), '', array('filter' => $user_list['filter'], 'page_count' => $user_list['page_count']));
}


function contribute_list(){
    $result = get_filter();
    if ($result === false)
    {
        /* 过滤条件 */
        $filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
		$filter['nick_name'] = empty($_REQUEST['nick_name']) ? '' : trim($_REQUEST['nick_name']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $filter['rank'] = empty($_REQUEST['rank']) ? 0 : intval($_REQUEST['rank']);
        $filter['pay_points_gt'] = empty($_REQUEST['pay_points_gt']) ? 0 : intval($_REQUEST['pay_points_gt']);
        $filter['pay_points_lt'] = empty($_REQUEST['pay_points_lt']) ? 0 : intval($_REQUEST['pay_points_lt']);

        $filter['sort_by']    = empty($_REQUEST['sort_by'])    ? 'user_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC'     : trim($_REQUEST['sort_order']);

        $ex_where = ' WHERE 1 ';
        if ($filter['keywords'])
        {
            $ex_where .= " AND user_name LIKE '%" . mysql_like_quote($filter['keywords']) ."%'";
        }
		 if (!empty($filter['nick_name']))
        {
            $ex_where .= " AND nick_name LIKE '%" . mysql_like_quote($filter['nick_name']) ."%'";
        }
        if ($filter['rank'])
        {
            $sql = "SELECT min_points, max_points, special_rank FROM ".$GLOBALS['ecs']->table('user_rank')." WHERE rank_id = '$filter[rank]'";
            $row = $GLOBALS['db']->getRow($sql);
            if ($row['special_rank'] > 0)
            {
                /* 特殊等级 */
                $ex_where .= " AND user_rank = '$filter[rank]' ";
            }
            else
            {
                $ex_where .= " AND rank_points >= " . intval($row['min_points']) . " AND rank_points < " . intval($row['max_points']);
            }
        }
        if ($filter['pay_points_gt'])
        {
             $ex_where .=" AND pay_points >= '$filter[pay_points_gt]' ";
        }
        if ($filter['pay_points_lt'])
        {
            $ex_where .=" AND pay_points < '$filter[pay_points_lt]' ";
        }

        $filter['record_count'] = $GLOBALS['db']->getOne("SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('users') . $ex_where);

        /* 分页大小 */
        $filter = page_and_size($filter);
        $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('users') . $ex_where .
                " ORDER by " . $filter['sort_by'] . ' ' . $filter['sort_order'] .
                " LIMIT " . $filter['start'] . ',' . $filter['page_size'];

        $filter['keywords'] = stripslashes($filter['keywords']);
        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }

    $user_list = $GLOBALS['db']->getAll($sql);

    $count = count($user_list);
    for ($i=0; $i<$count; $i++)
    {
        $user_list[$i]['reg_time'] = local_date($GLOBALS['_CFG']['date_format'], $user_list[$i]['reg_time']);
		//一层上级
		if($user_list[$i]['affiliate_id']>0){
		   $first_affiliate = $GLOBALS['db']->getRow("SELECT head_url,nick_name FROM " . $GLOBALS['ecs']->table('users')." WHERE user_id=".$user_list[$i]['affiliate_id']);
		   $user_list[$i]['first_head_url']	=  $first_affiliate['head_url'];
		   $user_list[$i]['first_nick_name'] =  $first_affiliate['nick_name'];
		}
		//二层上级
		if($user_list[$i]['second_affiliate_id']>0){
		   $second_affiliate = $GLOBALS['db']->getRow("SELECT head_url,nick_name FROM " . $GLOBALS['ecs']->table('users')." WHERE user_id=".$user_list[$i]['second_affiliate_id']);
		   $user_list[$i]['second_head_url']	=  $second_affiliate['head_url'];
		   $user_list[$i]['second_nick_name'] =  $second_affiliate['nick_name'];
		}
		//三层上级
		if($user_list[$i]['third_affiliate_id']>0){
		   $third_affiliate = $GLOBALS['db']->getRow("SELECT head_url,nick_name FROM " . $GLOBALS['ecs']->table('users')." WHERE user_id=".$user_list[$i]['third_affiliate_id']);
		   $user_list[$i]['third_head_url']	=  $third_affiliate['head_url'];
		   $user_list[$i]['third_nick_name'] =  $third_affiliate['nick_name'];
		}
		//一层贡献
		$first_contribute_money = $GLOBALS['db']->getOne("SELECT SUM(brokerage) FROM  wxch_brokerage_log WHERE buyer_id=".$user_list[$i]['user_id']." AND brokerage_level=1 AND profit_user_id=".$user_list[$i][affiliate_id]);
		$user_list[$i][first_contribute_money]  = !empty($first_contribute_money) ? $first_contribute_money : 0;
		//二层贡献
		$second_contribute_money = $GLOBALS['db']->getOne("SELECT SUM(brokerage) FROM  wxch_brokerage_log WHERE buyer_id=".$user_list[$i]['user_id']." AND brokerage_level=2  AND profit_user_id=".$user_list[$i][second_affiliate_id]); 
		$user_list[$i][second_contribute_money]  = !empty($second_contribute_money) ? $second_contribute_money : 0;
		//三层贡献
		$third_contribute_money = $GLOBALS['db']->getOne("SELECT SUM(brokerage) FROM  wxch_brokerage_log WHERE buyer_id=".$user_list[$i]['user_id']." AND brokerage_level=3  AND profit_user_id=".$user_list[$i][third_affiliate_id]); 
		$user_list[$i][third_contribute_money]  = !empty($third_contribute_money) ? $third_contribute_money : 0;
    }

    $arr = array('user_list' => $user_list, 'filter' => $filter,
        'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

    return $arr;
	
}
?>