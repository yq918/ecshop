<?php
/*
  代理商查询
*/
define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/include/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

$cache_id = sprintf('%X', crc32($_REQUEST['keys'] . '-' . $_CFG['lang']));


	if(!empty($_REQUEST['keys'])){
	    $keys = trim($_REQUEST['keys']);
	    $sql = "SELECT sv_name,suppliers_level FROM " . $ecs->table('suppliers') . " where suppliers_name='".$keys."' or suppliers_wechat='".$keys."' or suppliers_phone='".$keys."'";
		$suppliers = $db->getAll($sql, TRUE);
		foreach($suppliers as $k=>$s){
		   $agent_tpl = $GLOBALS['_CFG']['agent_search_response'];
		   $agent_tpl = str_replace("{\$name}", "<font color=red>".$s['suppliers_name']."</font>", $agent_tpl);
		   $suppliers[$k]['tpl'] = str_replace("{\$level}", "<font color=red>".$s['suppliers_level']."</font>", $agent_tpl);
		}
		$smarty->assign('suppliers', $suppliers);
		$smarty->assign('keys', $keys);
			
	}
	$smarty->display('agent.dwt'); //文章详细页 by wang

?>