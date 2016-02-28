<?php

/**
 *售后服务

 */

define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'include/lib_order.php');

/* 售后列表 */
if ($_REQUEST['act'] == 'list'){
	/* 模板赋值 */
    $smarty->assign('ur_here', '售后服务列表');
    $smarty->assign('action_link', array('href' => 'service.php?act=order_query', 'text' => $_LANG['03_order_query']));
    $smarty->assign('full_page',        1);
    $service_list = service_list();
    $smarty->assign('service_list',   $service_list['services']);
    $smarty->assign('filter',       $service_list['filter']);
    $smarty->assign('record_count', $service_list['record_count']);
    $smarty->assign('page_count',   $service_list['page_count']);
    $smarty->assign('sort_order_time', '<img src="images/sort_desc.gif">');

    /* 显示模板 */
    assign_query_info();
    $smarty->display('service_list.htm');

}
/* 售后单详细信息 */
elseif ($_REQUEST['act'] == 'info'){
	/* 根据订单id或订单号查询订单信息 */
    if (isset($_REQUEST['service_id']))
    {
        $service_id = intval($_REQUEST['service_id']);
        $service = service_info($service_id);
    }
    else
    {
        /* 如果参数不存在，退出 */
        die('invalid parameter');
    }

    /* 如果订单不存在，退出 */
    if (empty($service))
    {
        die('service does not exist');
    }
    $smarty->assign('service', $service);
	/* 显示模板 */
    assign_query_info();
    $smarty->display('service_info.htm');

}
/* 改变售后状态 */
elseif ($_REQUEST['act'] == 'change'){
    $status = $_REQUEST['status'];
	$service_id = $_REQUEST['service_id'];
	$sql = "UPDATE " .$ecs->table('service')." SET service_status=$status WHERE service_id=$service_id";	
	$db->query($sql);
	$links[] = array('text' => '售后服务', 'href' => 'service.php?act=list');
	sys_msg('操作成功', 1, $links);
}
/**
 *  获取售后列表信息
 *
 * @access  public
 * @param
 *
 * @return void
 */
function service_list()
{
    $result = get_filter();
    if ($result === false)
    {
        /* 过滤信息 */
        $filter['service_sn'] = empty($_REQUEST['service_sn']) ? '' : trim($_REQUEST['service_sn']);
        $filter['consignee'] = empty($_REQUEST['consignee']) ? '' : trim($_REQUEST['consignee']);
        $filter['service_type'] = empty($_REQUEST['service_type']) ? '' : trim($_REQUEST['service_type']);
        $filter['tel'] = empty($_REQUEST['tel']) ? '' : trim($_REQUEST['tel']);
	    $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'o.service_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        $where = 'WHERE 1 ';
        if ($filter['service_sn'])
        {
            $where .= " AND o.service_sn LIKE '%" . mysql_like_quote($filter['service_sn']) . "%'";
        }
        if ($filter['consignee'])
        {
            $where .= " AND o.consignee LIKE '%" . mysql_like_quote($filter['consignee']) . "%'";
        }
        if ($filter['tel'])
        {
            $where .= " AND o.tel LIKE '%" . mysql_like_quote($filter['tel']) . "%'";
        }
        if ($filter['service_type'])
        {
            $where .= " AND o.service_type  = '$filter[service_type]'";
        }
    
        /* 分页大小 */
        $filter['page'] = empty($_REQUEST['page']) || (intval($_REQUEST['page']) <= 0) ? 1 : intval($_REQUEST['page']);

        if (isset($_REQUEST['page_size']) && intval($_REQUEST['page_size']) > 0)
        {
            $filter['page_size'] = intval($_REQUEST['page_size']);
        }
        elseif (isset($_COOKIE['ECSCP']['page_size']) && intval($_COOKIE['ECSCP']['page_size']) > 0)
        {
            $filter['page_size'] = intval($_COOKIE['ECSCP']['page_size']);
        }
        else
        {
            $filter['page_size'] = 15;
        }

        /* 记录总数 */
        if ($filter['user_name'])
        {
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('service') . " AS o ,".
                   $GLOBALS['ecs']->table('users') . " AS u " . $where;
        }
        else
        {
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('service') . " AS o ". $where;
        }

        $filter['record_count']   = $GLOBALS['db']->getOne($sql);
        $filter['page_count']     = $filter['record_count'] > 0 ? ceil($filter['record_count'] / $filter['page_size']) : 1;

        /* 查询 */
        $sql = "SELECT o.service_id,o.order_id, o.service_sn, o.add_time, o.service_status, o.back_fee_status, o.consignee, o.tel, o.service_type" .
                " FROM " . $GLOBALS['ecs']->table('service') . " AS o " .  $where .
                " ORDER BY $filter[sort_by] $filter[sort_order] ".
                " LIMIT " . ($filter['page'] - 1) * $filter['page_size'] . ",$filter[page_size]";
				
    $row = $GLOBALS['db']->getAll($sql);

    /* 格式话数据 */
    foreach ($row AS $key => $value)
    {
		if( $value[service_status] == 0 ){
		   	$status = "未确认";
		} elseif( $value[service_status] == 1 ){
			$status = "已确认";
		} elseif( $value[service_status] == 2 ){
			$status = "已取消";
		} elseif( $value[service_status] == 3 ){
			$status = "无效";
		} elseif( $value[service_status] == 4 ){
			$status = "已完成";
		}
		
		$row[$key]['status'] = $status;
        $row[$key]['add_time'] = date('Y-m-d H:i', $value['add_time']);
        
		if( $value[service_type] == 1 ){
		    $type = "退货";
		}elseif( $value[service_type] == 2 ){
		    $type = "换货";
		}elseif( $value[service_type] == 3 ){		
		    $type = "维修";
		}
		$row[$key]['type'] = $type;
		$order_info =  $GLOBALS['db']->getRow("SELECT order_sn FROM  ".$GLOBALS['ecs']->table('order_info')." WHERE order_id=".$value['order_id']);
		$row[$key]['order_sn'] = $order_info['order_sn'];
	}
    $arr = array('services' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    return $arr;
	}
}

/* 取得收货单详情 */
function service_info($service_id){
    $sql = "SELECT * FROM ".$GLOBALS['ecs']->table('service')." WHERE service_id=".$service_id;
	$row = $GLOBALS['db']->getRow($sql);
	if( $value[service_status] == 0 ){
		   	$status = "未确认";
		} elseif( $value[service_status] == 1 ){
			$status = "已确认";
		} elseif( $value[service_status] == 2 ){
			$status = "已取消";
		} elseif( $value[service_status] == 3 ){
			$status = "无效";
		} elseif( $value[service_status] == 4 ){
			$status = "已完成";
		}
	$row['status'] = $status;
    $row['add_time'] = date('Y-m-d H:i', $row['add_time']);
	if( $row[service_type] == 1 ){
		    $type = "退货";
		}elseif( $row[service_type] == 2 ){
		    $type = "换货";
		}elseif( $row[service_type] == 3 ){		
		    $type = "维修";
		}
    $row['stype'] = $type;
	$order_info =  $GLOBALS['db']->getRow("SELECT order_sn FROM  ".$GLOBALS['ecs']->table('order_info')." WHERE order_id=".$row['order_id']);
	$row['order_sn'] = $order_info['order_sn'];
	return $row;	
}
?>