<?php

/*
  / 分销管理
*/
define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'include/cls_distribute.php');
/* 权限判断 */
admin_priv('distribute');
$distri = new Distribute();
if ($_REQUEST['act'] == 'list')
{
    $smarty->assign('ur_here',      '分销获益');
    $user_list = distributor_list();
    $distri_list = $user_list['user_list'];
    $smarty->assign('user_list',    $distri_list);
    $smarty->assign('filter',       $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count',   $user_list['page_count']);
    $smarty->assign('full_page',    1);
    $smarty->assign('sort_user_id', '<img src="images/sort_desc.gif">');

    assign_query_info();
    $smarty->display('distribute_list.htm');
}
/*------------------------------------------------------ */
//-- ajax返回用户列表
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
	
    $user_list = distributor_list();

    $smarty->assign('user_list',    $user_list['user_list']);
    $smarty->assign('filter',       $user_list['filter']);
    $smarty->assign('record_count', $user_list['record_count']);
    $smarty->assign('page_count',   $user_list['page_count']);

    $sort_flag  = sort_flag($user_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('distribute_list.htm'), '', array('filter' => $user_list['filter'], 'page_count' => $user_list['page_count']));
}


function distributor_list(){
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

        $ex_where = ' WHERE is_distributor=1 ';
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
		$user_list[$i]['subscribe_time'] = local_date($GLOBALS['_CFG']['date_format'], $user_list[$i]['subscribe_time']);
	    $user_list[$i]['first_affiliate_persons'] = $GLOBALS['distri']->affiliate_counts($user_list[$i]['user_id'], 'affiliate_id');
		$user_list[$i]['second_affiliate_persons'] = $GLOBALS['distri']->affiliate_counts($user_list[$i]['user_id'], 'second_affiliate_id');
		$user_list[$i]['third_affiliate_persons'] = $GLOBALS['distri']->affiliate_counts($user_list[$i]['user_id'], 'third_affiliate_id');
    }

    $arr = array('user_list' => $user_list, 'filter' => $filter,
        'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

    return $arr;
	
}
?>