<?php
/*
 * 码哥三级分销 分销类
*/
class Distribute{
  var $wcfg = array();
  
  public function __construct(){
	  $this->wcfg =  $GLOBALS['db']->getRow("SELECT * FROM wxch_config ");  
  }

  public function auto($user_id)
  {
  	//成为分销商
	if(!empty($user_id)){
		$sql = "select is_distributor from ".$GLOBALS['ecs']->table('users')." where user_id=".$user_id;
		$is_distributor = $GLOBALS['db']->getOne($sql);
		if($is_distributor == '0'){

			//成为分销资格预设金额
			$be_distributor = $GLOBALS['db']->getOne("SELECT be_distributor FROM `wxch_config` WHERE id='1'");

			//获取订单总额
			$sql = "SELECT money_paid FROM ".$GLOBALS['ecs']->table('order_info')." WHERE user_id='$user_id' and pay_status='2'";
			$order_all = $GLOBALS['db']->getAll($sql);
			foreach ($order_all as $key => $value) {
			 	$order_money += $value['money_paid'];
			}

			if(!$order_money){
				$order_money = '0';
			}

			if(!$be_distributor){
				$be_distributor = '0';
			}

			//如果订单总额大于预设金额
			if( $order_money >= $be_distributor){

				//更新用户状态
				$sql = "UPDATE " . $GLOBALS['ecs']->table('users') . "  SET is_distributor=1 WHERE user_id=".$user_id;
				$GLOBALS['db']->query($sql);

				//生成推广二维码
				require_once(ROOT_PATH . 'include/cls_wechat.php');
				$wechat = new Wechat();
				$wechat->create_wechat_qr($user_id);
			}else{
				//如果非分销商，就删除qr里面的记录。无论是否存在，都检查一次
				$sql = "DELETE FROM wxch_qr WHERE scene='" . $user_id . "'";
				$GLOBALS['db']->query($sql);
			}
			
		}else{
			//检测是否存在二维码
			$sql = "SELECT count(*) FROM wxch_qr WHERE scene='" . $user_id . "'";
			$qr_num = $GLOBALS['db']->getOne($sql);
			
			if(empty($qr_num)){
				//生成推广二维码
				require_once(ROOT_PATH . 'include/cls_wechat.php');
				$wechat = new Wechat();
				$wechat->create_wechat_qr($user_id);
			}
		}

	}
  }

  /* 返佣处理 */
  public function deal($oid){
	   $remsg = array('status'=>1, 'msg'=>'');
	   $order = $GLOBALS['db']->getRow("SELECT * FROM ".$GLOBALS['ecs']->table('order_info')." WHERE order_id=".$oid);
	   if (!$order || $order['pay_status']!=2 || $order['distribute_status']!=0)
       {
          $remsg['status'] = 0;
		  $remsg['msg'] = "没有找到该订单或该订单目前不能分销";
		  return $remsg;
       } 	
	  /* 判断下单人是否为分销者、能否成为分销者 */
	  $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$order['user_id'];
	  $user_info = $GLOBALS['db']->getRow($sql);
	  $all_consume = $GLOBALS['db']->getOne("SELECT SUM(goods_amount) FROM " . $GLOBALS['ecs']->table('order_info') . " WHERE distribute_status=1 AND user_id=".$order['user_id']."");
	  if($user_info['affiliate_id']>0 || $this->wcfg['is_distributor_limit']){
		  //成为分销商
		  //成为分销商
		  if(($all_consume>intval($this->wcfg['be_distributor']) || $all_consume==intval($this->wcfg['be_distributor']) || $order['goods_amount']>intval($this->wcfg['be_distributor']) || $order['goods_amount']==intval($this->wcfg['be_distributor'])) && $user_info[is_distributor]==0){
	           $sql = "UPDATE " . $GLOBALS['ecs']->table('users') . "  SET is_distributor=1 WHERE user_id=".$order['user_id'];
		       $GLOBALS['db']->query($sql);
		       //生成推广二维码
		       require_once(ROOT_PATH . 'include/cls_wechat.php');
		       $wechat = new Wechat();
		       $wechat->create_wechat_qr($order['user_id']);
		      //更新推广记录
		       $visitor = $GLOBALS['db']->getRow("SELECT p_id FROM wxch_promote_log WHERE visitor=".$order['user_id']." ORDER BY p_id DESC");
		       if($visitor){
		   	      $GLOBALS['db']->query("UPDATE wxch_promote_log SET is_distributor=1,distributor_time=".time()." WHERE p_id=".$visitor['p_id']);
		        }
	       }
	  }
	  
	  //返一级佣金
	  if($user_info['affiliate_id']>0){
		  $distributor = array();
		  $distributor = $GLOBALS['db']->getRow("SELECT user_name,nick_name,user_money, brokerage_all, brokerage_first,sales_all, sales_first,is_distributor FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$user_info['affiliate_id']);
		  //此订单一级佣金的额度
		  $brokerage_add = $this->order_brokerage($oid, 'one_level_deduct');
		  //上级必须是分销商身份才能得到佣金
		  if($distributor && $distributor[is_distributor]==1 && $brokerage_add>0){ 
		    $brokerage_first = $distributor['brokerage_first'] + $brokerage_add;
		    $brokerage_all = $distributor['brokerage_all'] + $brokerage_add;
		    $sales_all = $distributor['sales_all'] + $order['goods_amount'];
		    $sales_first = $distributor['sales_first'] + $order['goods_amount'];
		    $user_money = $distributor['user_money'] + $brokerage_add;
		    $sql = "UPDATE " . $GLOBALS['ecs']->table('users') . " SET user_money=".$user_money.",brokerage_first=".$brokerage_first.",brokerage_all=".$brokerage_all.",sales_all=".$sales_all.",sales_first=".$sales_first." WHERE user_id=".$user_info['affiliate_id'];
		    $GLOBALS['db']->query($sql);
		    //记录返佣金
		    $sql = "INSERT INTO  wxch_brokerage_log(buyer_id,profit_user_id,order_id,order_price,order_sn,brokerage,log_time,brokerage_level) VALUES (".$order['user_id'].", ".$user_info['affiliate_id'].", ".$order['order_id'].", ".$order[goods_amount].", '".$order['order_sn']."', ".$brokerage_add.", ".time().", 1)";
		    $GLOBALS['db']->query($sql);
		    //记录账目流水
		    $sql = "INSERT INTO  " . $GLOBALS['ecs']->table('account_log')."(user_id,user_money,change_time,change_desc,change_type) VALUES (".$user_info['affiliate_id'].", ".$brokerage_add.", ".time().", '您的".$this->wcfg['one_level_member_name']."(ID:".$user_info['user_name'].")[".$user_info['nick_name']."]所返佣金', 51)";
		    $GLOBALS['db']->query($sql);
		  }
	  }
	  //返二级佣金
	  if($user_info['second_affiliate_id']>0){
		$distributor = array();
		$distributor = $GLOBALS['db']->getRow("SELECT user_name,nick_name,user_money,brokerage_all, brokerage_second,sales_all, sales_second,is_distributor FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$user_info['second_affiliate_id']);
		//此订单二级佣金的额度
		$brokerage_add = $this->order_brokerage($oid, 'two_level_deduct');
		if($distributor && $distributor[is_distributor]==1 && $brokerage_add>0){
		$brokerage_second = $distributor['brokerage_second'] + $brokerage_add;
		$brokerage_all = $distributor['brokerage_all'] + $brokerage_add;
		$sales_all = $distributor['sales_all'] + $order['goods_amount'];
		$sales_second = $distributor['sales_second'] + $order['goods_amount'];
		$user_money = $distributor['user_money'] + $brokerage_add;
		$sql = "UPDATE " . $GLOBALS['ecs']->table('users') . " SET user_money=".$user_money.",brokerage_second=".$brokerage_second.",brokerage_all=".$brokerage_all.",sales_all=".$sales_all.",sales_second=".$sales_second." WHERE user_id=".$user_info['second_affiliate_id'];
		$GLOBALS['db']->query($sql);
		//记录返佣金
		$sql = "INSERT INTO  wxch_brokerage_log(buyer_id,profit_user_id,order_id,order_sn,order_price,brokerage,log_time,brokerage_level) VALUES (".$order['user_id'].", ".$user_info['second_affiliate_id'].", ".$order['order_id'].", '".$order['order_sn']."', ".$order[goods_amount].", ".$brokerage_add.", ".time().", 2)";
		$GLOBALS['db']->query($sql);
		//记录账目流水
		$sql = "INSERT INTO  " . $GLOBALS['ecs']->table('account_log')."(user_id,user_money,change_time,change_desc,change_type) VALUES (".$user_info['second_affiliate_id'].", ".$brokerage_add.", ".time().", '您的".$this->wcfg['two_level_member_name']."(ID:".$user_info['user_name'].")[".$user_info['nick_name']."]所返佣金', 52)";
		$GLOBALS['db']->query($sql);
		}
	  }
	  //返三级佣金
	  if($user_info['third_affiliate_id']>0){
		$distributor = array();
		$distributor = $GLOBALS['db']->getRow("SELECT user_name,nick_name,user_money,brokerage_all, brokerage_third,sales_all, sales_third,is_distributor FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$user_info['third_affiliate_id']);
		//此订单三级佣金的额度
		$brokerage_add = $this->order_brokerage($oid, 'three_level_deduct');
		if($distributor && $distributor[is_distributor]==1 && $brokerage_add>0){
		  $brokerage_third = $distributor['brokerage_third'] + $brokerage_add;
		  $brokerage_all = $distributor['brokerage_all'] + $brokerage_add;
		  $sales_all = $distributor['sales_all'] + $order['goods_amount'];
		  $sales_third = $distributor['sales_third'] + $order['goods_amount'];
		  $user_money = $distributor['user_money'] + $brokerage_add;
		  $sql = "UPDATE " . $GLOBALS['ecs']->table('users') . " SET user_money=".$user_money.",brokerage_third=".$brokerage_third.",brokerage_all=".$brokerage_all.",sales_all=".$sales_all.",sales_third=".$sales_third." WHERE user_id=".$user_info['third_affiliate_id'];
		  $GLOBALS['db']->query($sql);
		  //记录返佣金
		  $sql = "INSERT INTO  wxch_brokerage_log(buyer_id,profit_user_id,order_id,order_price,order_sn,brokerage,log_time,brokerage_level) VALUES (".$order['user_id'].", ".$user_info['third_affiliate_id'].", ".$order['order_id'].", ".$order[goods_amount].",  '".$order['order_sn']."', ".$brokerage_add.", ".time().", 3)";
		  $GLOBALS['db']->query($sql);
		  //记录账目流水
		  $sql = "INSERT INTO  " . $GLOBALS['ecs']->table('account_log')."(user_id,user_money,change_time,change_desc,change_type) VALUES (".$user_info['third_affiliate_id'].", ".$brokerage_add.", ".time().", '您的".$this->wcfg['three_level_member_name']."(ID:".$user_info['user_name'].")[".$user_info['nick_name']."]所返佣金', 53)";
		$GLOBALS['db']->query($sql);
		}
	}
	//订单改为分销已审核状态
	$sql = "UPDATE " . $GLOBALS['ecs']->table('order_info') . " SET distribute_status=1 WHERE order_id=".$oid;
	$GLOBALS['db']->query($sql);
	$remsg['status'] = 1;
	$remsg['msg'] = "分销成功";
	return $remsg;
  }
  
  /* 取消分销 */
  function cancel_distribute($oid){
	   $remsg = array('status'=>1, 'msg'=>'');
	   $order = $GLOBALS['db']->getRow("SELECT * FROM ".$GLOBALS['ecs']->table('order_info')." WHERE order_id=".$oid);
	   if (!$order || $order['distribute_status']!=1)
       {
          $remsg['status'] = 0;
		  $remsg['msg'] = "没有找到该订单或该订单尚未分销";
		  return $remsg;
       } 
	   //取消一级分销
	   $first_d = $GLOBALS['db']->getRow("SELECT * FROM wxch_brokerage_log WHERE order_id=".$oid." AND brokerage_level=1");
	   if($first_d){
		    if($first_d[brokerage] > 0){
			   $brokerage = $first_d[brokerage] * (-1);	
			   $info = "因退款退货等原因,扣除订单[".$order['order_sn']."]的一级分销佣金";
			   $sql = "INSERT INTO  wxch_brokerage_log(buyer_id,profit_user_id,order_id,order_price,order_sn,brokerage,log_time,brokerage_level,info) VALUES (".$first_d['buyer_id'].", ".$first_d['profit_user_id'].", ".$first_d['order_id'].", ".$first_d['order_price'].", '".$order['order_sn']."', ".$brokerage.", ".time().", 1, '$info')";
		       $GLOBALS['db']->query($sql);
			   //记录账目流水
		       $sql = "INSERT INTO  " . $GLOBALS['ecs']->table('account_log')."(user_id,user_money,change_time,change_desc,change_type) VALUES (".$first_d['profit_user_id'].", ".$brokerage.", ".time().", '$info', 51)";
		       $GLOBALS['db']->query($sql);
			   //从获益人的余额中扣除相应佣金
			   $distributor = array();
		       $distributor = $GLOBALS['db']->getRow("SELECT user_money, brokerage_all, brokerage_first,sales_all, sales_first FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$first_d['profit_user_id']);
			   $brokerage_first = $distributor['brokerage_first'] + $brokerage<0 ? 0 : $distributor['brokerage_first'] + $brokerage;
		       $brokerage_all = $distributor['brokerage_all'] + $brokerage<0 ? 0 : $distributor['brokerage_all'] + $brokerage;
		       $sales_all = $distributor['sales_all'] - $first_d['order_price']<0 ? 0 : $distributor['sales_all'] - $first_d['order_price'];
		       $sales_first = $distributor['sales_first'] - $first_d['order_price']<0 ? 0 : $distributor['sales_first'] - $first_d['order_price'];
		       $user_money = $distributor['user_money'] + $brokerage;
			   $sql = "UPDATE " . $GLOBALS['ecs']->table('users') . " SET user_money=".$user_money.",brokerage_first=".$brokerage_first.",brokerage_all=".$brokerage_all.",sales_all=".$sales_all.",sales_first=".$sales_first." WHERE user_id=".$first_d['profit_user_id'];
		       $GLOBALS['db']->query($sql);
			} 
	   }
	   //取消二级分销
	   $second_d = $GLOBALS['db']->getRow("SELECT * FROM wxch_brokerage_log WHERE order_id=".$oid." AND brokerage_level=2");
	   if($second_d){
		    if($second_d[brokerage] > 0){
			   $brokerage = $second_d[brokerage] * (-1);	
			   $info = "因退款退货等原因,扣除订单[".$order['order_sn']."]的二级分销佣金";
			   $sql = "INSERT INTO  wxch_brokerage_log(buyer_id,profit_user_id,order_id,order_sn,order_price,brokerage,log_time,brokerage_level,info) VALUES (".$second_d['buyer_id'].", ".$second_d['profit_user_id'].", ".$second_d['order_id'].",'".$order['order_sn']."', ".$second_d['order_price'].",".$brokerage.", ".time().",2, '$info')";
		       $GLOBALS['db']->query($sql);
			   //记录账目流水
		       $sql = "INSERT INTO  " . $GLOBALS['ecs']->table('account_log')."(user_id,user_money,change_time,change_desc,change_type) VALUES (".$second_d['profit_user_id'].", ".$brokerage.", ".time().", '$info', 51)";
		       $GLOBALS['db']->query($sql);
			   //从获益人的余额中扣除相应佣金
			   $distributor = array();
		       $distributor = $GLOBALS['db']->getRow("SELECT user_money, brokerage_all, brokerage_second,sales_all, sales_second FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$second_d['profit_user_id']);
			   $brokerage_second = $distributor['brokerage_second'] + $brokerage<0 ? 0 : $distributor['brokerage_second'] + $brokerage;
		       $brokerage_all = $distributor['brokerage_all'] + $brokerage<0 ? 0 : $distributor['brokerage_all'] + $brokerage;
		       $sales_all = $distributor['sales_all'] - $second_d['order_price']<0 ? 0 : $distributor['sales_all'] - $second_d['order_price'];
		       $sales_second = $distributor['sales_second'] - $second_d['order_price']<0 ? 0 : $distributor['sales_second'] - $second_d['order_price'];
		       $user_money = $distributor['user_money'] + $brokerage;
			   $sql = "UPDATE " . $GLOBALS['ecs']->table('users') . " SET user_money=".$user_money.",brokerage_second=".$brokerage_second.",brokerage_all=".$brokerage_all.",sales_all=".$sales_all.",sales_second=".$sales_second." WHERE user_id=".$second_d['profit_user_id'];
		       $GLOBALS['db']->query($sql);
			} 
	   }
	   //取消三级分销
	   $third_d = $GLOBALS['db']->getRow("SELECT * FROM wxch_brokerage_log WHERE order_id=".$oid." AND brokerage_level=3");
	   if($third_d){
		    if($third_d[brokerage] > 0){
			   $brokerage = $third_d[brokerage] * (-1);	
			   $info = "因退款退货等原因,扣除订单[".$order['order_sn']."]的三级分销佣金";
			  $sql = "INSERT INTO  wxch_brokerage_log(buyer_id,profit_user_id,order_id,order_sn,order_price,brokerage,log_time,brokerage_level,info) VALUES (".$third_d['buyer_id'].", ".$third_d['profit_user_id'].", ".$third_d['order_id'].",'".$order['order_sn']."', ".$third_d['order_price'].",".$brokerage.", ".time().",3, '$info')";
		       $GLOBALS['db']->query($sql);
			   //记录账目流水
		       $sql = "INSERT INTO  " . $GLOBALS['ecs']->table('account_log')."(user_id,user_money,change_time,change_desc,change_type) VALUES (".$third_d['profit_user_id'].", ".$brokerage.", ".time().", '$info', 53)";
		       $GLOBALS['db']->query($sql);
			   //从获益人的余额中扣除相应佣金
			   $distributor = array();
		       $distributor = $GLOBALS['db']->getRow("SELECT user_money, brokerage_all, brokerage_third,sales_all, sales_third FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$third_d['profit_user_id']);
			   $brokerage_third = $distributor['brokerage_third'] + $brokerage<0 ? 0 : $distributor['brokerage_third'] + $brokerage;
		       $brokerage_all = $distributor['brokerage_all'] + $brokerage<0 ? 0 : $distributor['brokerage_all'] + $brokerage;
		       $sales_all = $distributor['sales_all'] - $third_d['order_price']<0 ? 0 : $distributor['sales_all'] - $third_d['order_price'];
		       $sales_third = $distributor['sales_third'] - $third_d['order_price']<0 ? 0 : $distributor['sales_third'] - $third_d['order_price'];
		       $user_money = $distributor['user_money'] + $brokerage;
			   $sql = "UPDATE " . $GLOBALS['ecs']->table('users') . " SET user_money=".$user_money.",brokerage_third=".$brokerage_third.",brokerage_all=".$brokerage_all.",sales_all=".$sales_all.",sales_third=".$sales_third." WHERE user_id=".$third_d['profit_user_id'];
		       $GLOBALS['db']->query($sql);
			} 
	   }
	   //重新判断下单用户的分销资格审核
	  $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$order['user_id'];
	  $user_info = $GLOBALS['db']->getRow($sql);
	  $cur_points = $user_info['rank_points'] - $order['goods_amount']<0 ? 0 : $user_info['rank_points'] - $order['goods_amount'];
	  $GLOBALS['db']->query("UPDATE " . $GLOBALS['ecs']->table('users') . " SET rank_points=".$cur_points." WHERE user_id=".$order['user_id']);
	  if($user_info['is_distribute']){
		  //取消分销商身份
		  if($cur_points < intval($this->wcfg['be_distri_user'])){
	           $sql = "UPDATE " . $GLOBALS['ecs']->table('users') . "  SET is_distributor=0 WHERE user_id=".$order['user_id'];
		       $GLOBALS['db']->query($sql);
	      }
	  }
	//订单改为未分销状态
	$sql = "UPDATE " . $GLOBALS['ecs']->table('order_info') . " SET distribute_status=0 WHERE order_id=".$oid;
	$GLOBALS['db']->query($sql);
	
	$remsg['status'] = 1;
	$remsg['msg'] = "取消分销成功";
	return $remsg;
  }
  /* 订单佣金 
     param: 
	   oid  订单id 
       level  几级佣金
	   
	  return:
	    brokerage:  佣金额度   
  */
  public function order_brokerage($oid, $level){
	  if(!$oid)  return 0;
	  $brokerage = 0;
	  $goods_list =  $GLOBALS['db']->getAll("SELECT goods_id,goods_price,goods_number FROM " . $GLOBALS['ecs']->table('order_goods') . " WHERE order_id=".$oid);
	  foreach($goods_list as $k=>$g){
	     $deduct = $this->goods_deduct($g['goods_id'], $level);
		 $goods_brokerage = round($g['goods_price'] * $g['goods_number'] * intval($deduct) / 100, 2); 
		 $brokerage += $goods_brokerage;
	  }
	  return $brokerage;
  }
  
  /* 取得某商品的佣金提成 */
  public function goods_deduct($gid, $level){
	   $deduct = 0;
	   $goods = $GLOBALS['db']->getRow("SELECT goods_id,cat_id,brand_id,$level FROM " . $GLOBALS['ecs']->table('goods') . " WHERE goods_id=".$gid);
	   //按商品提成
	   if($goods && $goods[$level]>0)
          return $goods[$level];
	   //按品牌提成	  
	   if($goods[brand_id]>0){
	     $brand = $GLOBALS['db']->getRow("SELECT $level FROM " . $GLOBALS['ecs']->table('brand') . " WHERE brand_id=".$goods[brand_id]);
	     if($brand && $brand[$level]>0)
            return $brand[$level];
	   }
	   //按分类提成
	   if($goods[cat_id]>0){
	     $category = $GLOBALS['db']->getRow("SELECT $level FROM " . $GLOBALS['ecs']->table('category') . " WHERE cat_id=".$goods[cat_id]);
	     if($category && $category[$level]>0)
            return $category[$level]; 
	   }
	   //按统一配置提成
	   return $this->wcfg[$level];	
	       
  }
  /* 记录推广访问 
     param: 
	   user_id  访问者  
  */
  public function promote_log($user_id){
	  if(!$user_id)
	     show_message('访问者身份验证失败', '返回商城首页', "index.php?pid=".$_REQUEST['pid'], 'error');
	  if(!empty($_REQUEST['pid'])){
		  $pid = intval($_REQUEST['pid']);
		  //推广访问
		  if($user_id != $pid){	
			 $insert_sql = "INSERT INTO wxch_promote_log(promoter, visitor, visit_time) VALUES (".$pid.", ".$user_id.",  ".time().")";
			 $GLOBALS['db']->query($insert_sql);		
	     }
	  }
   }
   
   /* 普通关注上下级绑定 */
   public function affiliate_bound($user_id){
	   $tg = $GLOBALS['db']->getRow("SELECT p_id,promoter FROM wxch_promote_log WHERE visitor=".$user_id." ORDER BY p_id DESC LIMIT 1");
	   if($tg){
		    $GLOBALS['db']->query("UPDATE wxch_promote_log SET is_subscribe=1,subscribe_time=".time()." WHERE p_id=".$tg['p_id']);
			$affiliate_user = $GLOBALS['db']->getOne("SELECT affiliate_id FROM ".$GLOBALS['ecs']->table('users')." WHERE user_id=".$user_id);
			//推广人的上级
			$second_affiliate = $GLOBALS['db']->getRow("SELECT affiliate_id,second_affiliate_id FROM ".$GLOBALS['ecs']->table('users')." WHERE user_id=".$tg[promoter]);
			//本人没有上级，推广人也不能是本人，并且本人不是推广人的上级的情况下，才可以绑定下级会员
			if(intval($affiliate_user) == 0 && $second_affiliate[affiliate_id]!=$user_id && $tg[promoter]!=$user_id){
		         $second_affiliate_id = 0;
		         $third_affiliate_id = 0;
		         $first_affiliate_id = $tg[promoter];
		         if($second_affiliate['affiliate_id']>0 && $second_affiliate['affiliate_id']!=$user_id)
			          $second_affiliate_id = $second_affiliate['affiliate_id'];
			     if($second_affiliate['second_affiliate_id']>0 && $second_affiliate['affiliate_id']!=$user_id)
				      $third_affiliate_id = $second_affiliate['second_affiliate_id'];
				 $sql = "UPDATE ".$GLOBALS['ecs']->table('users')." SET affiliate_id=".$first_affiliate_id.",second_affiliate_id=".$second_affiliate_id.", third_affiliate_id=".$third_affiliate_id.",is_subscribe=1,subscribe_time=".time()."  WHERE user_id=".$user_id."";
		         $GLOBALS['db']->query($sql);
				 $up_uid=$first_affiliate_id;
				 require_once(ROOT_PATH . 'mobile/wxch_share.php');
			}
		 }
   }
   
   /* 取得下级会员数量 */
   public function affiliate_counts($uid, $level){
	   $counts = $GLOBALS['db']->getOne("SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('users') . " WHERE $level=".$uid);  
	   return $counts;
   }

  /* 生成分销二维码 */
  public function create_qr_code($user_id){
	   //取得分销二维码配置
	   $qr_conf = $GLOBALS['db']->getRow("SELECT * FROM wxch_qr_set");
	   if($user_id == 0){
		 $qr_data['qrcode_thumb'] = "data/static/images/example_erweima.png";
		 $user_info['nick_name'] = "测试用户";    
		 $user_info['head_url'] = "";
	   }else{
	     $qr_data = $GLOBALS['db']->getRow("SELECT * FROM wxch_qr WHERE scene='".$user_id."'");
	     $user_info = $GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id=".$user_id);
	     if(!$qr_conf || !$qr_data || !$user_info){
	     	$be_distributor = $GLOBALS['db']->getOne("SELECT be_distributor FROM `wxch_config` WHERE id='1'");
			$res['errmsg'] = '<div style="width:90%; text-align:center; margin-left:auto;margin-right:auto; margin-top:60px; font-size:48px;">对不起！您现在还不是分销商，无法获取二维码推广图片！<br/><br/>累计消费<b>'.$be_distributor.'</b>元就可以成为分销商啦！<br/><br/>先去<a href="index.php" style="font-weight:bold; color:#F00;">商城首页</a>逛逛吧~</div>';
		    $res['status'] = 0;
		    return $res;
	     }
	   }
	   //创建图像操作对象
	   require_once(ROOT_PATH . 'include/cls_image.php');
	   $image = new cls_image();
	  /* 检查背景文件是否存在 */
	   $original_img = ROOT_PATH . $qr_conf['dst_image'];
       $org_info = @getimagesize($original_img);
       if (!$org_info)
       {
		   $res['errmsg'] = '背景图片不存在';
		   $res['status'] = 0;
		   return $res;
       }
	   /* 判断二维码图片是否存在
	   if(empty($qr_data['qr_path'])) {
			$qr_data['qr_path'] = 'http://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$qr_data['ticket'];
       }else{
			$qr_data['qr_path'] = '/ ' .MOBILE_BASE_PATH. '/'.$qr_data['qr_path'];
       } */
	   $original_qr_img = $qr_data['qrcode_thumb'];
	   $org_qr_info = @getimagesize( ROOT_PATH. $original_qr_img);
	   if (!$org_qr_info)
       {
		   $res['errmsg'] = '二维码不存在';
		   $res['status'] = 0;
		   return $res;
       } 
	   /* 生成新的分销二维码背景图 */
	   $original_img_basename =  basename($original_img);  //背景图片文件名
	   $original_img_name_arr = explode(".", $original_img_basename);  //背景图片文件名和文件类型
	   $org_qr_img_basename =  basename($original_img);  //原始二维码图片文件名
	   $org_qr_img_name_arr = explode( ".", $org_qr_img_basename);//原始二维码图片文件名和类型
	   $new_img_name = 'd_' . time() . rand(1000,9999) . "." . $original_img_name_arr[1]; //新背景图文件名  
	   $new_img = ROOT_PATH . 'images/qrcode_distri/' . $new_img_name;  //新背景图文件路径

	   /* 原始背景图片复制到新路径 */
	   if(!copy($original_img, $new_img)){
		   $res['errmsg'] = '背景图片复制失败';
		   $res['status'] = 0;
		   return $res;      
	   }
	   
	   /* 处理原始二维码图片至指定大小 */
	   if($qr_conf['qr_width']<1 || $qr_conf['qr_height']<1){
		   $res['errmsg'] = '二维码图片尺寸太小';
		   $res['status'] = 0;
		   return $res;     
	   }
	   
	    /* 处理头像至指定大小 */
	   if(!empty($user_info['head_url'])){
	      $head_img = $user_info['head_url'];
		  //下载头像并缩小
		  $new_name = time(). rand(10000,99999).'.png';
		  $new_path = 'images/headpic/' . $new_name;
		  $image->copy_web_image($head_img, ROOT_PATH . $new_path);
	      $new_head_img = $image->make_thumb(ROOT_PATH . $new_path , $qr_conf['headpic_width'],  $qr_conf['headpic_height'], ROOT_PATH . 'images/headpic_thumb/', '', 'png');   
		  $sql = "UPDATE wxch_qr SET headpic_thumb='$new_head_img' WHERE qid=".$qr_data['qid'];
		  $GLOBALS['db']->query($sql);
	   }
	   $head_img_info = @getimagesize($head_img);
	   if(!$head_img_info){
		   $new_head_img = ROOT_PATH . 'data/static/images/get_avatar.png';   
	   }
	   
	   /* 开始生成分销二维码 */ 
	   $new_img = $image->add_watermark_position($new_img, '', ROOT_PATH . $original_qr_img,  $qr_conf['qr_src_x'],  $qr_conf['qr_src_y'], 1);  //嵌入二维码
	   if(!$new_img){
		   $res['errmsg'] = '二维码嵌入失败';
		   $res['status'] = 0;
		   return $res;     
	   }
   
	   $new_img = $image->add_watermark_position(ROOT_PATH . $new_img, '', $new_head_img, $qr_conf['headpic_src_x'],  $qr_conf['headpic_src_y'],  1); //嵌入头像
	   if(!$new_img){
		   $res['errmsg'] = '头像嵌入失败';
		   $res['status'] = 0;
		   return $res;   
	   }
	   //嵌入昵称和代言对象
	   $string = "我是:" . $user_info['nick_name'] . "\n我为[" . $qr_conf['shop_name'] . "]代言";
	   $color = array(129,24,24);
       $fontface = ROOT_PATH . "data/static/font/simhei.ttf";
	   $image->add_txt( ROOT_PATH.$new_img, 16, 0, $qr_conf['txt_src_x'],$qr_conf['txt_src_y'], $color, $fontface, $string);
	   if(!$new_img){
		   $res['errmsg'] = '嵌入昵称失败';
		   $res['status'] = 0;
		   return $res; 
	   }
	   if($user_id == 0){
	      echo("<img src='/mobile/".$new_img."'>");
	   }else{
		  $new_img = "mobile/" . $new_img; 
		  $res['url'] = $new_img;
		  $res['status'] = 1;
		  return $res; 
	   }
  }
   
}

?>