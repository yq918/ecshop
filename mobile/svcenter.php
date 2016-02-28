<?php

/**
 * 服务中心
*/

define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/include/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

/*------------------------------------------------------ */
//-- INPUT
/*------------------------------------------------------ */
$action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'search';
//查询
if($action == 'search'){
    $cache_id = sprintf('%X', crc32($_REQUEST['keys'] . '-' . $_CFG['lang']));

	if(!empty($_REQUEST['keys'])){
	    $keys = trim($_REQUEST['keys']);
	    $sql = "SELECT * FROM " . $ecs->table('svcenter') . " where sv_name like '%".$keys."%' or linkman like '%".$keys."%' or address like '%".$keys."%'";
		$svcenter = $db->getAll($sql, TRUE);
		foreach($svcenter as $k=>$s){
            $province = $db->getOne("SELECT region_name FROM " . $ecs->table('region') . " WHERE region_id=".$s['province_id']);	
            $city     = $db->getOne("SELECT region_name FROM " . $ecs->table('region') . " WHERE region_id=".$s['city_id']);	
	        $district = $db->getOne("SELECT region_name FROM " . $ecs->table('region') . " WHERE region_id=".$s['district_id']);
            $svcenter[$k]['area'] = $province . " " . $city . " " . $district;	
		}
		$smarty->assign('svcenter', $svcenter);
		$smarty->assign('keys', $keys);
			
	}
	$smarty->display('svcenter.dwt');
   	
}elseif($action == 'detail'){
//详情
    $sv_id     = $_REQUEST['id'];
	
	if(empty($sv_id)){
	    show_message('没有找到相关数据', '返回首页', "index.php", 'error');
	    exit();	
	}
/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

  $cache_id = sprintf('%X', crc32($sv_id . '-' . $_CFG['lang']));

  if (!$smarty->is_cached('sv_detail.dwt', $cache_id))
  {
    /* 服务中心详情 */
	if($sv_id)
    $svcenter = $db->getRow('SELECT * FROM  '.$ecs->table('svcenter').' WHERE sv_id='.$sv_id);
    $province = $db->getOne("SELECT region_name FROM " . $ecs->table('region') . " WHERE region_id=".$svcenter['province_id']);	
    $city     = $db->getOne("SELECT region_name FROM " . $ecs->table('region') . " WHERE region_id=".$svcenter['city_id']);	
	$district = $db->getOne("SELECT region_name FROM " . $ecs->table('region') . " WHERE region_id=".$svcenter['district_id']);
    $svcenter['area'] = $province . " " . $city . " " . $district;
    if (empty($svcenter))
    {
        show_message('没有找到相关数据', '返回首页', "index.php", 'error');
	    exit();	
    }
    $smarty->assign('id',               $sv_id);
    $smarty->assign('svcenter',         $svcenter);
   }
   $smarty->display('sv_detail.dwt', $cache_id); //文章详细页 by wang

}

?>