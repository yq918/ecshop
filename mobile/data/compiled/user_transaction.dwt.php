<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/images/touch-icon.png" rel="apple-touch-icon-precomposed" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/ectouch.css" rel="stylesheet" type="text/css" />


<?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,common.js,user.js')); ?>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/jquery-1.4.4.min.js"></script>
</head>
<body>
<div id="tbh5v0">
  <div class="login"> 
     
    <?php if ($this->_var['action'] == 'profile'): ?> 
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?> 
    <script type="text/javascript">
          <?php $_from = $this->_var['lang']['profile_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
            var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </script>
    <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="user.php"> 返回 </a> </div>
      <h1> <?php echo $this->_var['lang']['profile']; ?> </h1>
    </header>
    <div class="blank3"></div>
    <section class="wrap">
      <form name="formEdit" action="user.php" method="post" onSubmit="return userEdit()">
        <section class="order_box padd1 radius10" style="padding-top:0;padding-bottom:0;">
          <div class="table_box table_box2">
            <dl>
              <dd class="dd1">昵称 </dd>
              <input name="nick_name" type="text" placeholder="输入昵称"  value="<?php echo $this->_var['profile']['nick_name']; ?>" class="dd2" />
            </dl>
            <dl>
              <dd class="dd1">真实姓名 </dd>
              <input name="real_name" type="text" placeholder="输入真实姓名"  value="<?php echo $this->_var['profile']['real_name']; ?>" class="dd2" />
            </dl>
            <dl>
              <dd class="dd1">手机号 </dd>
              <input name="mobile_phone" type="text" placeholder="输入手机号码"  value="<?php echo $this->_var['profile']['mobile_phone']; ?>" class="dd2" />
            </dl>
			<dl>
              <dd class="dd1">性别</dd>
			  <dd>
			<input  style="width: 3%;" type="radio" name="sex" value="1" <?php if ($this->_var['profile']['sex'] == 1): ?>checked<?php endif; ?> > 男<input       type="radio" style="width: 3%;" name="sex" value="0" <?php if ($this->_var['profile']['sex'] == 0): ?>checked<?php endif; ?>> 女 
			</dd>			
            </dl>
			<dl>
              <dd class="dd1">生日</dd>
			  <dd>
			<input type="date" name="birthday" value="<?php echo $this->_var['profile']['birthday']; ?>" />
			</dd>			
            </dl>
            <dl>
              <dd class="dd1">开户行 </dd>
              <input name="bank_name" type="text" placeholder="输入提现的银行名称"  value="<?php echo $this->_var['profile']['bank_name']; ?>" class="dd2" />
            </dl>  
             <dl>
              <dd class="dd1">银行账号 </dd>
              <input name="bank_account" type="text" placeholder="输入提现的银行账号"  value="<?php echo $this->_var['profile']['bank_account']; ?>" class="dd2" />
            </dl>  
			</div>
        </section>
        <div class="blank3"></div>
        <input name="act" type="hidden" value="act_edit_profile" />
        <input name="submit" type="submit" value="<?php echo $this->_var['lang']['confirm_edit']; ?>" class="c-btn3"   />
      </form>
      <div class="blank3"></div>
    </section>
    <?php endif; ?> 
     

    <?php if ($this->_var['action'] == 'bonus'): ?> 
    <script type="text/javascript">
        <?php $_from = $this->_var['lang']['profile_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </script>
    <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="user.php"> 返回 </a> </div>
      <h1> <?php echo $this->_var['lang']['label_bonus']; ?> </h1>
    </header>
    <section class="wrap bonus_list">
	  <section class="order_box padd1 radius10 single_item">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
        <tr>
          <th align="center">序号</th>
          <th align="center">名称</th>
          <th align="center">金额</th>
          <th align="center">最小订单</th>
          <th align="center">截止日期</th>
          <th align="center">状态</th>
        </tr>
        <?php if ($this->_var['bonus']): ?> 
        <?php $_from = $this->_var['bonus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        <tr>
          <td align="center"><?php echo empty($this->_var['item']['bonus_sn']) ? 'N/A' : $this->_var['item']['bonus_sn']; ?></td>
          <td align="center"><?php echo $this->_var['item']['type_name']; ?></td>
          <td align="center"><?php echo $this->_var['item']['type_money']; ?></td>
          <td align="center"><?php echo $this->_var['item']['min_goods_amount']; ?></td>
          <td align="center"><?php echo $this->_var['item']['use_enddate']; ?></td>
          <td align="center"><?php echo $this->_var['item']['status']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        <?php else: ?>
        <tr>
          <td colspan="6" bgcolor="#FFFFFF"><?php echo $this->_var['lang']['user_bonus_empty']; ?></td>
        </tr>
        <?php endif; ?>
      </table>
      </section>

	  <section class="order_box padd1 radius10">
      <form name="addBouns" action="user.php" method="post" onSubmit="return addBonus()" style="text-align:center">
        <input  placeholder="<?php echo $this->_var['lang']['bonus_number']; ?>" name="bonus_sn" type="text" class="inputBg_touch" style="margin-bottom:10px" />
        <input type="hidden" name="act" value="act_add_bonus" class="inputBg" />
        <input type="submit" class="c-btn3"   value="<?php echo $this->_var['lang']['add_bonus']; ?>" />
      </form>
      </section>
    </section>
    <?php endif; ?> 
     
     
    <?php if ($this->_var['action'] == 'order_list'): ?>
    <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="user.php"> 返回 </a> </div>
      <h1> <?php echo $this->_var['lang']['label_order']; ?> </h1>
    </header>
    <section class="wrap order_list">
      <section class="order_box padd1 radius10 single_item">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
      	<tr>
        	<td class="order_status" style="border-bottom:1px #CCCCCC dashed"></td>
        </tr>
        <tr>
        	<td class="order_content"></td>
        </tr>
        <tr>
          <td class="order_handler"></td>
        </tr>
        <tr>
            <td class="order_tracking"></td>
        </tr>
      </table>
    </section>
    <a href="javascript:;" style="text-align:center" class="get_more"></a>
    </section>
	<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/jquery.more.js"></script>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['merge_order_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    jQuery(function($){
    	$('.order_list').more({'address': 'user.php?act=async_order_list', amount: 3, 'spinner_code':'<div style="text-align:center; margin:10px;"><img src="<?php echo $this->_var['ectouch_themes']; ?>/images/loader.gif" /></div>'})
		$(window).scroll(function () {
			if ($(window).scrollTop() == $(document).height() - $(window).height()) {
				$('.get_more').click();
			}
		});
    });
    </script>
    <?php endif; ?> 
     
     
    <?php if ($this->_var['action'] == 'track_packages'): ?>
    <header id="header">
      <div class="c-inav">
        <section>
          <button class="back">
          <span><em></em></span><a href="javascript:history.go(-1)">返回</a>
          </button>
        </section>
        <section> <span style="font-size:14px; color:#333; font-weight:normal"><?php echo $this->_var['lang']['label_track_packages']; ?></span> </section>
        <section></section>
      </div>
    </header>
    <div class="fullscreen">
      <div class="blank"></div>
      <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="order_table">
        <tr align="center">
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['order_number']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['handle']; ?></td>
        </tr>
        <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        <tr>
          <td align="center" bgcolor="#ffffff"><a href="user.php?act=order_detail&order_id=<?php echo $this->_var['item']['order_id']; ?>"><?php echo $this->_var['item']['order_sn']; ?></a></td>
          <td align="center" bgcolor="#ffffff"><?php echo $this->_var['item']['query_link']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </table>
      <script>
      var query_status = '<?php echo $this->_var['lang']['query_status']; ?>';
      var ot = document.getElementById('order_table');
      for (var i = 1; i < ot.rows.length; i++)
      {
        var row = ot.rows[i];
        var cel = row.cells[1];
        cel.getElementsByTagName('a').item(0).innerHTML = query_status;
      }
      </script>
      <div class="blank5"></div>
      <?php echo $this->fetch('library/pages.lbi'); ?> </div>
    <?php endif; ?> 
    

     
    <?php if ($this->_var['action'] == 'order_tracking'): ?>
    <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="javascript:history.go(-1)"> 返回 </a> </div>
      <h1> <?php echo $this->_var['lang']['label_track_packages']; ?> </h1>
    </header>
    <div class="fullscreen">
      <div class="blank"></div>
      <div data-role="content" class="smart-result">
        <div class="content-primary" style="margin-left:20px; font-size:14px; text-align:center; margin-top:10px; ">
         快递单：<font color="red">  <?php if ($this->_var['orders']['invoice_no'] != ''): ?><?php echo $this->_var['orders']['invoice_no']; ?><?php else: ?>暂无快递单号<?php endif; ?></font>
        </div>
        <div class="content-primary">
          <table id="queryResult" cellpadding="0" cellspacing="0"></table>
        </div>
      </div>
<script type="text/javascript">
jQuery(function($){
	var resultJson = eval('(<?php echo $this->_var['trackinfo']; ?>)');
	var resultTable = $("#queryResult");
	resultTable.empty();
	if(resultJson.status == 200) { //成功
		var resultData = resultJson.data;
		for (var i = resultData.length - 1; i >= 0; i--) {
			var className = "";
			if(i%2 == 0){
				className = "even";
			}else{
				className="odd";
			}
			if(resultData.length == 1){
				if(resultJson.ischeck == 1){
					className += " checked";
				}else{
					className += " wait";
				}
			}else if(i == resultData.length - 1){
				className += " first-line";
			}else if(i == 0){
				className += " last-line";
				if(resultJson.ischeck == 1){
					className += " checked";
				}else{
					className += " wait";
				}
			}

			var index = resultData[i].ftime.indexOf(" ");
			var result_date = resultData[i].ftime.substring(0,index);
			var result_time = resultData[i].ftime.substring(index+1);

			var s_index = result_time.lastIndexOf(":");
			result_time = result_time.substring(0,s_index);

			resultTable.append("<tr class='" + className + "'><td class='col1'><span class='result-date'>" + result_date + "</span><span class='result-time'>" + result_time + "</span></td><td class='colstatus'></td><td class='col2'><span>" + resultData[i].context + "</span></td></tr>");
		}
		$("body").animate({scrollTop: "1000px"}, 1000);
	}else if(resultJson.status == 400){
		resultTable.append("<tr><td>订单暂未发货，请稍后再来查询</td></tr>");				
	}else{
		resultTable.append("<tr><td>"+ resultJson.message +"</td></tr>");				
	}
})
</script>
    </div>
    <?php endif; ?> 
     
    
     
    <?php if ($this->_var['action'] == order_detail): ?>
    <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="javascript:history.go(-1)"> 返回 </a> </div>
      <h1> <?php echo $this->_var['lang']['order_status']; ?> </h1>
    </header>
    <section class="wrap">
      <section class="order_box padd1 radius10">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
      	<tr>
        	<td>订单状态：<?php echo $this->_var['order']['order_status']; ?> <?php echo $this->_var['order']['pay_status']; ?> <?php echo $this->_var['order']['shipping_time']; ?></td>
        </tr>
        <tr>
        	<td>订单编号：<?php echo $this->_var['order']['order_sn']; ?></td>
        </tr>
        <tr>
        	<td>订单金额：<?php echo $this->_var['order']['formated_total_fee']; ?></td>
        </tr>
        <tr>
        	<td>下单时间：<?php echo $this->_var['order']['formated_add_time']; ?></td>
        </tr>
        <?php if ($this->_var['order']['to_buyer']): ?>
        <tr>
          <td><?php echo $this->_var['lang']['detail_to_buyer']; ?>：<?php echo $this->_var['order']['to_buyer']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($this->_var['virtual_card']): ?>
        <tr>
          <td><?php echo $this->_var['lang']['virtual_card_info']; ?>：<br>
          	<?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?> 
            <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?> 
            <hr style="border:none;border-top:1px #CCCCCC dashed; margin:5px 0" />
            <?php if ($this->_var['card']['card_sn']): ?><?php echo $this->_var['lang']['card_sn']; ?>:<span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span><br><?php endif; ?>
            <?php if ($this->_var['card']['card_password']): ?><?php echo $this->_var['lang']['card_password']; ?>:<span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span><br><?php endif; ?> 
            <?php if ($this->_var['card']['end_date']): ?><?php echo $this->_var['lang']['end_date']; ?>:<?php echo $this->_var['card']['end_date']; ?><br><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($this->_var['order']['is_service']): ?>
        <tr>
            <td><a href="user.php?act=order_service&order_id=<?php echo $this->_var['order']['order_id']; ?>" class="c-btn3">退换货(售后)申请</a></td>
        </tr>
        <?php endif; ?>
        <?php if ($this->_var['order']['invoice_no']): ?>
        <tr>
            <td><a href="user.php?act=order_tracking&order_id=<?php echo $this->_var['order']['order_id']; ?>" class="c-btn3">订单跟踪</a></td>
        </tr>
        <?php endif; ?>
      </table>
      </section>
      
      <section class="order_box padd1 radius10">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
        <tr>
          <td width="32%" align="right"><?php echo $this->_var['lang']['consignee_name']; ?>：</td>
          <td width="68%" align="left"><?php echo $this->_var['order']['consignee']; ?></td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['email_address']; ?>：</td>
          <td align="left"><?php echo $this->_var['order']['email']; ?></td>
        </tr>
        <?php if ($this->_var['order']['exist_real_goods']): ?>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['detailed_address']; ?>：</td>
          <td align="left"><?php echo $this->_var['order']['address']; ?> 
            <?php if ($this->_var['order']['zipcode']): ?> 
            [<?php echo $this->_var['lang']['postalcode']; ?>: <?php echo $this->_var['order']['zipcode']; ?>] 
            <?php endif; ?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['phone']; ?>：</td>
          <td align="left"><?php echo $this->_var['order']['tel']; ?> </td>
        </tr>
        <?php if ($this->_var['order']['exist_real_goods']): ?>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['deliver_goods_time']; ?>：</td>
          <td align="left"><?php echo $this->_var['order']['best_time']; ?></td>
        </tr>
        <?php endif; ?>
      </table>
      </section>
      
      <section class="order_box padd1 radius10">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
      	  <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <tr>
            <td rowspan="2" width="60" align="center" valign="middle" style="border-bottom:1px #CCCCCC dashed">
            <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['site_url']; ?>mobile/<?php echo $this->_var['goods']['goods_thumb']; ?>" width="60" height="60" /></a></td>
            <td><?php echo $this->_var['goods']['goods_name']; ?></td>
          </tr>
          <tr>
            <td style="border-bottom:1px #CCCCCC dashed">售价：<?php echo $this->_var['goods']['goods_price']; ?> 数量：<?php echo $this->_var['goods']['goods_number']; ?><br>小计：<?php echo $this->_var['goods']['subtotal']; ?></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </table>
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
        <tr>
          <td align="right"> <?php echo $this->_var['lang']['goods_all_price']; ?><?php if ($this->_var['order']['extension_code'] == "group_buy"): ?><?php echo $this->_var['lang']['gb_deposit']; ?><?php endif; ?>: <?php echo $this->_var['order']['formated_goods_amount']; ?> 
            <?php if ($this->_var['order']['discount'] > 0): ?> 
            - <?php echo $this->_var['lang']['discount']; ?>: <?php echo $this->_var['order']['formated_discount']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['tax'] > 0): ?> 
            + <?php echo $this->_var['lang']['tax']; ?>: <?php echo $this->_var['order']['formated_tax']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['shipping_fee'] > 0): ?> 
            + <?php echo $this->_var['lang']['shipping_fee']; ?>: <?php echo $this->_var['order']['formated_shipping_fee']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['insure_fee'] > 0): ?> 
            + <?php echo $this->_var['lang']['insure_fee']; ?>: <?php echo $this->_var['order']['formated_insure_fee']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['pay_fee'] > 0): ?> 
            + <?php echo $this->_var['lang']['pay_fee']; ?>: <?php echo $this->_var['order']['formated_pay_fee']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['pack_fee'] > 0): ?> 
            + <?php echo $this->_var['lang']['pack_fee']; ?>: <?php echo $this->_var['order']['formated_pack_fee']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['card_fee'] > 0): ?> 
            + <?php echo $this->_var['lang']['card_fee']; ?>: <?php echo $this->_var['order']['formated_card_fee']; ?> 
            <?php endif; ?></td>
        </tr>
        <tr>
          <td align="right"><?php if ($this->_var['order']['money_paid'] > 0): ?> 
            - <?php echo $this->_var['lang']['order_money_paid']; ?>: <?php echo $this->_var['order']['formated_money_paid']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['surplus'] > 0): ?> 
            - <?php echo $this->_var['lang']['use_surplus']; ?>: <?php echo $this->_var['order']['formated_surplus']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['integral_money'] > 0): ?> 
            - <?php echo $this->_var['lang']['use_integral']; ?>: <?php echo $this->_var['order']['formated_integral_money']; ?> 
            <?php endif; ?> 
            <?php if ($this->_var['order']['bonus'] > 0): ?> 
            - <?php echo $this->_var['lang']['use_bonus']; ?>: <?php echo $this->_var['order']['formated_bonus']; ?> 
            <?php endif; ?></td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['order_amount']; ?>: <?php echo $this->_var['order']['formated_order_amount']; ?> 
            <?php if ($this->_var['order']['extension_code'] == "group_buy"): ?><br />
            <?php echo $this->_var['lang']['notice_gb_order_amount']; ?><?php endif; ?></td>
        </tr>
        <?php if ($this->_var['allow_edit_surplus']): ?>
        <tr>
          <td align="right" bgcolor="#ffffff"><form action="user.php" method="post" name="formFee" id="formFee">
              <?php echo $this->_var['lang']['use_more_surplus']; ?>：
              <input name="surplus" type="text" size="8" value="0" style="border:1px solid #ccc; padding:3px; border-radius:5px;"/><br>
              <?php echo $this->_var['max_surplus']; ?>
              <input type="submit" name="Submit" class="c-btn3" value="<?php echo $this->_var['lang']['button_submit']; ?>余额付款" />
              <input type="hidden" name="act" value="act_edit_surplus" />
              <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>" />
            </form></td>
        </tr>
        <?php endif; ?>
      </table>
      </section>
      
      <section class="order_box padd1 radius10">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
        <tr>
          <td bgcolor="#ffffff"> <?php echo $this->_var['lang']['select_payment']; ?>: <?php echo $this->_var['order']['pay_name']; ?>。<br><?php echo $this->_var['lang']['order_amount']; ?>: <strong><?php echo $this->_var['order']['formated_order_amount']; ?></strong><br />
            <?php echo $this->_var['order']['pay_desc']; ?><br><?php if ($this->_var['order']['order_amount'] > 0): ?><?php echo $this->_var['order']['pay_online']; ?><?php endif; ?></td>
        </tr>
        <tr>
          <td bgcolor="#ffffff" align="center"><?php if ($this->_var['payment_list']): ?>
            
            <form name="payment" method="post" action="user.php">
              <?php echo $this->_var['lang']['change_payment']; ?>: <br/>
              <select name="pay_id" style="margin:6px 0">
                <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                <option value="<?php echo $this->_var['payment']['pay_id']; ?>"> <?php echo $this->_var['payment']['pay_name']; ?>(<?php echo $this->_var['lang']['pay_fee']; ?>:<?php echo $this->_var['payment']['format_pay_fee']; ?>) </option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <br/>
              <input type="hidden" name="act" value="act_edit_payment" />
              <input type="hidden" name="order_id" value="<?php echo $this->_var['order']['order_id']; ?>" />
              <input type="submit" name="Submit" class="c-btn3" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
            </form>
            
            <?php endif; ?></td>
        </tr>
      </table>
      </section>
      
      <section class="order_box padd1 radius10">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
        <?php if ($this->_var['order']['shipping_id'] > 0): ?>
        <tr>
          <td width="25%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['shipping']; ?>：</td>
          <td colspan="3" width="75%" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['shipping_name']; ?></td>
        </tr>
        <?php endif; ?>
        
        <tr>
          <td width="15%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['payment']; ?>：</td>
          <td colspan="3" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['pay_name']; ?></td>
        </tr>
        <?php if ($this->_var['order']['insure_fee'] > 0): ?> 
        <?php endif; ?> 
        <?php if ($this->_var['order']['pack_name']): ?>
        <tr>
          <td width="15%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['use_pack']; ?>：</td>
          <td colspan="3" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['pack_name']; ?></td>
        </tr>
        <?php endif; ?> 
        <?php if ($this->_var['order']['card_name']): ?>
        <tr>
          <td width="15%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['use_card']; ?>：</td>
          <td colspan="3" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['card_name']; ?></td>
        </tr>
        <?php endif; ?> 
        <?php if ($this->_var['order']['card_message']): ?>
        <tr>
          <td width="15%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['bless_note']; ?>：</td>
          <td colspan="3" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['card_message']; ?></td>
        </tr>
        <?php endif; ?> 
        <?php if ($this->_var['order']['surplus'] > 0): ?> 
        <?php endif; ?> 
        <?php if ($this->_var['order']['integral'] > 0): ?>
        <tr>
          <td width="15%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['use_integral']; ?>：</td>
          <td colspan="3" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['integral']; ?></td>
        </tr>
        <?php endif; ?> 
        <?php if ($this->_var['order']['bonus'] > 0): ?> 
        <?php endif; ?> 
        <?php if ($this->_var['order']['inv_payee'] && $this->_var['order']['inv_content']): ?>
        <tr>
          <td width="15%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['invoice_title']; ?>：</td>
          <td width="36%" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['inv_payee']; ?></td>
          <td width="19%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['invoice_content']; ?>：</td>
          <td width="25%" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['inv_content']; ?></td>
        </tr>
        <?php endif; ?> 
        <?php if ($this->_var['order']['postscript']): ?>
        <tr>
          <td width="15%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['order_postscript']; ?>：</td>
          <td colspan="3" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['postscript']; ?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td width="15%" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['booking_process']; ?>：</td>
          <td colspan="3" align="left" bgcolor="#ffffff"><?php echo $this->_var['order']['how_oos_name']; ?></td>
        </tr>
      </table>
      </section>
      
    </section>
    <?php endif; ?> 
    
     
    
     
    <?php if ($this->_var['action'] == order_service): ?>
     <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="javascript:history.go(-1)"> 返回 </a> </div>
      <h1> 退换货（售后）申请 </h1>
    </header>
      
      <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,transport.js,region.js,shopping_flow.js')); ?> 
     <script>
        $(function(){
			$('#form_surplus').submit(function(){
				if($("#question_desc").val()==""){
				   alert_msg("问题描述不能为空");
				   return false;	
				}
				if($("#service_desc").val()==""){
				   alert_msg("希望售后不能为空");
				   return false;	
				}
				if($("#consignee").val()==""){
				   alert_msg("联系人不能为空");
				   return false;	
				}
				if($("#tel").val()==""){
				   alert_msg("联系电话不能为空");
				   return false;	
				}
				return true;
			});
		});
      </script>
    <section class="wrap">
      <section class="order_box padd1 radius10">
      <form action="user.php" method="post" name="theForm">
        <input name="order_id" type="hidden" value="<?php echo $this->_var['order']['order_id']; ?>" />
        <input name="user_id" type="hidden" value="<?php echo $this->_var['user_id']; ?>" />
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
          <tr>
          	<td width="70">订单号</td>
            <td align="left" ><?php echo $this->_var['order']['order_sn']; ?> </td>
          </tr>
          <tr>
          	<td width="70">售后类型</td>
            <td align="left" >
              <!--<input type="radio" name="service_type" id="service_type1" value="1" checked> 退货&nbsp;--> <input type="radio" name="service_type" id="service_type2" value="2"> 换货&nbsp; <input type="radio" name="service_type" id="service_type3" value="3"> 维修
              <br><font color="#999">[温馨提示] 本系统为自动返利结佣系统，为避免佣金出现差错，因此于本系统购买的产品不予退货，如存在质量问题，可以换货，往返邮费请自行承担</font>
          </td>
          </tr>
          <tr>
          	<td>问题描述</td>
            <td align="left" > <textarea placeholder="输入问题描述" name="question_desc" id="question_desc" class="B_blue" style="width:100%; height:100px; border:0px; font-size:1em;"></textarea></td>
          </tr>
          <tr>
          	<td>希望售后</td>
            <td align="left" > <textarea placeholder="输入希望得到的售后服务" name="service_desc" id="service_desc" class="B_blue" style="width:100%; height:100px; border:0px; font-size:1em;"></textarea></td>
          </tr>
          <tr>
          	<td width="70">联系人</td>
            <td align="left" ><input name="consignee" placeholder="<?php echo $this->_var['lang']['consignee_name']; ?><?php echo $this->_var['lang']['require_field']; ?>" type="text" class="inputBg_touch" value="<?php echo htmlspecialchars($this->_var['order']['consignee']); ?>" /> </td>
          </tr>
          <tr>
          	<td>联系电话</td>
            <td align="left" ><input placeholder="<?php echo $this->_var['lang']['phone']; ?><?php echo $this->_var['lang']['require_field']; ?>" name="tel" type="text" class="inputBg_touch" value="<?php echo htmlspecialchars($this->_var['order']['tel']); ?>" /></td>
          </tr>
          <tr>
            <td align="center" colspan="2"><?php if ($this->_var['consignee']['consignee'] && $this->_var['consignee']['email']): ?>
              <input type="submit" name="submit"  class="c-btn3" value="售后申请"  style="margin-right:5px;" />
              <?php else: ?>
              <input type="submit" name="submit"  class="c-btn3"  value="售后申请"/>
              <?php endif; ?>
              <input type="hidden" name="act" value="service_add" />
             </td>
          </tr>
        </table>
      </form>
      </section>
    </section>
    <?php endif; ?>
    
    
     
    <?php if ($this->_var['action'] == "account_raply" || $this->_var['action'] == "account_log" || $this->_var['action'] == "account_deposit" || $this->_var['action'] == "account_detail"): ?>
    <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="user.php"> 返回 </a> </div>
      <h1> 提现申请 </h1>
    </header>

    
    <div class="fullscreen"> 
      <script type="text/javascript">
          <?php $_from = $this->_var['lang']['account_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'itaccount_depositem');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['itaccount_depositem']):
?>
            var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </script>
      <div class="blank"></div>
      <table width="100%" border="0" cellpadding="5" cellspacing="1">
        <tr>
          <td align="right" bgcolor="" style="padding-top:10px;"><a href="user.php?act=account_deposit" class="f6"><?php echo $this->_var['lang']['surplus_type_0']; ?></a> | <a href="user.php?act=account_raply" class="f6"><?php echo $this->_var['lang']['surplus_type_1']; ?></a> | <a href="user.php?act=account_detail" class="f6">账户明细</a> | <a href="user.php?act=account_log" class="f6">申请记录</a></td>
        </tr>
      </table>
      <?php endif; ?> 
      <?php if ($this->_var['action'] == "account_raply"): ?>
      <script>
        $(function(){
			$('#form_surplus').submit(function(){
				if($(".dd2[name=amount]").val()==""){
				   alert_msg("提现金额不能为空");
				   return false;	
				}
				if($(".dd2[name=real_name]").val()==""){
				   alert_msg("真实姓名不能为空");
				   return false;	
				}
				if($(".dd2[name=bank_name]").val()==""){
				   alert_msg("开户行不能为空");
				   return false;	
				}
				if($(".dd2[name=bank_account]").val()==""){
				   alert_msg("银行账号不能为空");
				   return false;	
				}
				if($(".dd2[name=mobile_phone]").val()==""){
				   alert_msg("手机号不能为空");
				   return false;	
				}
				return true;
			});
		});
      </script>
      <form name="formSurplus" method="post" action="user.php" id="form_surplus">
      <section class="order_box padd1 radius10" style="padding-top:0;padding-bottom:0;">
          <div class="table_box table_box2">
            <dl>
              <dd class="dd1">提现金额</dd>
			  <dd>
			<input name="amount" type="text" placeholder="提现金额"  class="dd2" />
			</dd>			
            </dl>
            <dl>
              <dd class="dd1">真实姓名 </dd>
              <input name="real_name" type="text" placeholder="输入真实姓名"  value="<?php echo $this->_var['profile']['real_name']; ?>" class="dd2" />
            </dl>
             <dl>
              <dd class="dd1">开户行 </dd>
              <input name="bank_name" type="text" placeholder="输入提现的银行名称"  value="<?php echo $this->_var['profile']['bank_name']; ?>" class="dd2" />
            </dl>  
             <dl>
              <dd class="dd1">银行账号 </dd>
              <input name="bank_account" type="text" placeholder="输入提现的银行账号"  value="<?php echo $this->_var['profile']['bank_account']; ?>" class="dd2" />
            </dl>  
            <dl>
              <dd class="dd1">手机号 </dd>
              <input name="mobile_phone" type="text" placeholder="输入手机号码"  value="<?php echo $this->_var['profile']['mobile_phone']; ?>" class="dd2" />
            </dl>
			<dl>
              <dd class="dd1">备注 </dd>
              <textarea placeholder="<?php echo $this->_var['lang']['process_notic']; ?>" name="user_note"class="B_blue" style="width:100%; height:70px; border:0px; font-size:1em;"><?php echo htmlspecialchars($this->_var['order']['user_note']); ?></textarea>
            </dl>
            <?php if ($this->_var['wxconf']['withdraw_alert_msg'] != ''): ?>
            <dl>
              <dd style="line-height:26px;"><font color="#999">[温馨提示]<?php echo $this->_var['wxconf']['withdraw_alert_msg']; ?></font></dd>
            </dl>
            <?php endif; ?>
			</div>
        </section>
        <div class="blank3"></div>
         <div class="dd_btn">
              <input type="hidden" name="act" value="act_account" />
              <input type="hidden" name="surplus_type" value="1" />
              <input type="submit" name="submit"  class="btn1" style="margin-right:5px;" value="<?php echo $this->_var['lang']['submit_request']; ?>" />
              <input type="reset" name="reset" class="btn2" value="<?php echo $this->_var['lang']['button_reset']; ?>" />
        </div>
       
      </form>
      <?php endif; ?> 
      <?php if ($this->_var['action'] == "account_deposit"): ?>
      <form name="formSurplus" method="post" action="user.php" onSubmit="return submitSurplus()">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" >
          <tr>
            <td align="center" ><input placeholder="<?php echo $this->_var['lang']['deposit_money']; ?>" type="number" name="amount"  class="inputBg" value="<?php echo htmlspecialchars($this->_var['order']['amount']); ?>"/></td>
          </tr>
          <tr>
            <td align="center"><textarea  placeholder="<?php echo $this->_var['lang']['process_notic']; ?>" name="user_note" class="textarea"><?php echo htmlspecialchars($this->_var['order']['user_note']); ?></textarea></td>
          </tr>
          <tr>
            <td class="deposit_list">
             <?php $_from = $this->_var['payment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
             <input type="radio" name="payment_id" value="<?php echo $this->_var['list']['pay_id']; ?>" class="option-input radio" /> &nbsp;<?php echo $this->_var['list']['pay_name']; ?><br>
             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
            </td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="5" cellspacing="1" >
          <tr>
            <td colspan="3"  align="center"><div class="dd_btn"><input type="hidden" name="surplus_type" value="0" />
              <input type="hidden" name="rec_id" value="<?php echo $this->_var['order']['id']; ?>" />
              <input type="hidden" name="act" value="act_account" />
              <input type="submit" name="submit"  class="btn1" style="margin-right:5px;" value="<?php echo $this->_var['lang']['submit_request']; ?>" />
              <input type="reset" name="reset" class="btn2" value="<?php echo $this->_var['lang']['button_reset']; ?>" /></div>
          </tr>
        </table>
      </form>
      <?php endif; ?> 
      <?php if ($this->_var['action'] == "act_account"): ?>
      <table width="100%" border="0" cellpadding="5" cellspacing="1" >
        <tr>
          <td width="25%" align="right" ><?php echo $this->_var['lang']['surplus_amount']; ?></td>
          <td width="80%" bgcolor="#ffffff"><?php echo $this->_var['amount']; ?></td>
        </tr>
        <tr>
          <td align="right" ><?php echo $this->_var['lang']['payment_name']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['payment']['pay_name']; ?></td>
        </tr>
        <tr>
          <td align="right" ><?php echo $this->_var['lang']['payment_fee']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['pay_fee']; ?></td>
        </tr>
        <tr>
          <td align="right" valign="middle" ><?php echo $this->_var['lang']['payment_desc']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['payment']['pay_desc']; ?></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#ffffff"><?php echo $this->_var['payment']['pay_button']; ?></td>
        </tr>
      </table>
      <?php endif; ?> 
      <?php if ($this->_var['action'] == "account_detail"): ?>
      <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr align="center">
          <td bgcolor="#ffffff" height="28px"><?php echo $this->_var['lang']['process_time']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['surplus_pro_type']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['money']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['change_desc']; ?></td>
        </tr>
        <?php $_from = $this->_var['account_log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        <tr>
          <td align="center" bgcolor="#ffffff" height="28px"><?php echo $this->_var['item']['change_time']; ?></td>
          <td align="center" bgcolor="#ffffff"><?php echo $this->_var['item']['type']; ?></td>
          <td align="right" bgcolor="#ffffff"><?php echo $this->_var['item']['amount']; ?></td>
          <td bgcolor="#ffffff" title="<?php echo $this->_var['item']['change_desc']; ?>">&nbsp;&nbsp;<?php echo $this->_var['item']['short_change_desc']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <tr>
          <td colspan="4" align="center" bgcolor="#ffffff"><div align="right"><?php echo $this->_var['lang']['current_surplus']; ?><?php echo $this->_var['surplus_amount']; ?></div></td>
        </tr>
      </table>
      <?php echo $this->fetch('library/pages.lbi'); ?> 
      <?php endif; ?> 
      <?php if ($this->_var['action'] == "account_log"): ?>
      <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr align="center">
          <td bgcolor="#ffffff" height="28px"><?php echo $this->_var['lang']['process_time']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['surplus_pro_type']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['money']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['is_paid']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['handle']; ?></td>
        </tr>
        <?php $_from = $this->_var['account_log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        <tr>
          <td align="center" bgcolor="#ffffff" height="28px"><?php echo $this->_var['item']['add_time']; ?></td>
          <td align="left" bgcolor="#ffffff"><?php echo $this->_var['item']['type']; ?></td>
          <td align="right" bgcolor="#ffffff"><?php echo $this->_var['item']['amount']; ?></td>
          <td align="center" bgcolor="#ffffff"><?php echo $this->_var['item']['pay_status']; ?></td>
          <td align="right" bgcolor="#ffffff" class="tb_handle"><?php echo $this->_var['item']['handle']; ?> 
            <?php if (( $this->_var['item']['is_paid'] == 0 && $this->_var['item']['process_type'] == 1 ) || $this->_var['item']['handle']): ?> 
            <a href="user.php?act=cancel&id=<?php echo $this->_var['item']['id']; ?>" onclick="if (!confirm('<?php echo $this->_var['lang']['confirm_remove_account']; ?>')) return false;" class="cancel"><?php echo $this->_var['lang']['is_cancel']; ?></a> 
            <?php endif; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <tr>
          <td colspan="7" align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['current_surplus']; ?><?php echo $this->_var['surplus_amount']; ?></td>
        </tr>
      </table>
      <?php echo $this->fetch('library/pages.lbi'); ?> </div>
    <?php endif; ?> 
     
     
    <?php if ($this->_var['action'] == 'address_list'): ?>
    <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="user.php"> 返回 </a> </div>
      <h1> <?php echo $this->_var['lang']['consignee_info']; ?> </h1>
    </header>
    <section class="wrap">
      <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
      <section class="order_box padd1 radius10">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
        <tr>
          <td width="32%" align="right"><?php echo $this->_var['lang']['consignee_name']; ?>：</td>
          <td width="68%" align="left"><?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?></td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['phone']; ?>：</td>
          <td align="left"><?php echo $this->_var['consignee']['tel']; ?> </td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['detailed_address']; ?>：</td>
          <td align="left"><?php echo htmlspecialchars($this->_var['consignee']['address']); ?> 
            <?php if ($this->_var['consignee']['zipcode']): ?> 
            [<?php echo $this->_var['lang']['postalcode']; ?>: <?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?>] 
            <?php endif; ?></td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['email_address']; ?>：</td>
          <td align="left"><?php echo htmlspecialchars($this->_var['consignee']['email']); ?></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><a href="user.php?act=act_edit_address&id=<?php echo $this->_var['consignee']['address_id']; ?>&flag=display">编辑</a> | <a href="user.php?act=drop_consignee&id=<?php echo $this->_var['consignee']['address_id']; ?>" onClick="return confirm('您真的要删除该地址吗？');">删除</a></td>
        </tr>
      </table>
      </section>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <a href="user.php?act=act_edit_address&flag=display" class="c-btn3"><?php echo $this->_var['lang']['add_address']; ?></a>
    </section>
    <?php endif; ?> 
     
     
    <?php if ($this->_var['action'] == 'act_edit_address'): ?>
    <header id="header">
      <div class="header_l header_return"> <a class="ico_10" href="javascript:history.go(-1)"> 返回 </a> </div>
      <h1> <?php echo $this->_var['lang']['consignee_info']; ?> </h1>
    </header>
      
      <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,transport.js,region.js,shopping_flow.js')); ?> 
      <script type="text/javascript">
		  region.isAdmin = false;
		  <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
		  var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		  
		  onload = function() {
			if (!document.all)
			{
			  document.forms['theForm'].reset();
			}
		  }
		  
	  </script>
    <section class="wrap">
      <section class="order_box padd1 radius10">
      <form action="user.php" method="post" name="theForm" onsubmit="return checkConsignee(this)">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="ectouch_table">
          <tr>
          	<td width="70">收货人</td>
            <td align="left" ><input name="consignee" placeholder="<?php echo $this->_var['lang']['consignee_name']; ?><?php echo $this->_var['lang']['require_field']; ?>" type="text" class="inputBg_touch" value="<?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?>" /> </td>
          </tr>
          <tr>
          	<td>联系电话</td>
            <td align="left" ><input placeholder="<?php echo $this->_var['lang']['phone']; ?><?php echo $this->_var['lang']['require_field']; ?>" name="tel" type="text" class="inputBg_touch" value="<?php echo htmlspecialchars($this->_var['consignee']['tel']); ?>" /></td>
          </tr>
          <tr>
          	<td>电子邮箱</td>
            <td align="left" ><input name="email" placeholder="<?php echo $this->_var['lang']['email_address']; ?><?php echo $this->_var['lang']['require_field']; ?>" type="text" class="inputBg_touch" value="<?php echo htmlspecialchars($this->_var['consignee']['email']); ?>" /></td>
          </tr>
          <tr>
          	<td><?php echo $this->_var['lang']['country_province']; ?></td>
            <td align="left" >
               <!--<select name="country" onchange="region.changed(this, 1, 'selProvinces')">
                <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></option>
                <?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
                <option value="<?php echo $this->_var['country']['region_id']; ?>" <?php if ($this->_var['consignee']['country'] == $this->_var['country']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['country']['region_name']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>-->
              <select name="province" id="selProvinces" onchange="region.changed(this, 2, 'selCities')">
                <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></option>
                <?php $_from = $this->_var['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
                <option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['consignee']['province'] == $this->_var['province']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <select name="city" id="selCities" onchange="region.changed(this, 3, 'selDistricts')">
                <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></option>
                <?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
                <option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['consignee']['city'] == $this->_var['city']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <select name="district" id="selDistricts" <?php if (! $this->_var['district_list']): ?>style="display:none"<?php endif; ?>>
                <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></option>
                <?php $_from = $this->_var['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
                <option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['consignee']['district'] == $this->_var['district']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select></td>
          </tr>
          <tr>
          	<td>详细地址</td>
            <td align="left" ><input name="address" placeholder="<?php echo $this->_var['lang']['detailed_address']; ?><?php echo $this->_var['lang']['require_field']; ?>" type="text" class="inputBg_touch" value="<?php echo htmlspecialchars($this->_var['consignee']['address']); ?>" /></td>
          </tr>
          <tr>
          	<td>邮政编码</td>
            <td align="left" ><input placeholder="<?php echo $this->_var['lang']['postalcode']; ?>" name="zipcode" type="text" class="inputBg_touch" value="<?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?>" /></td>
          </tr>
          <tr>
            <td align="center" colspan="2"><?php if ($this->_var['consignee']['consignee'] && $this->_var['consignee']['email']): ?>
              <input type="submit" name="submit"  class="c-btn3" value="<?php echo $this->_var['lang']['confirm_edit']; ?>"  style="margin-right:5px;" />
              <?php else: ?>
              <input type="submit" name="submit"  class="c-btn3"  value="<?php echo $this->_var['lang']['add_address']; ?>"/>
              <?php endif; ?>
              <input type="hidden" name="act" value="act_edit_address" />
              <input name="address_id" type="hidden" value="<?php echo $this->_var['consignee']['address_id']; ?>" /></td>
          </tr>
        </table>
      </form>
      </section>
    </section>
    <?php endif; ?> 
     
     
    <?php if ($this->_var['action'] == 'transform_points'): ?>
    <h5><span><?php echo $this->_var['lang']['transform_points']; ?></span></h5>
    <div class="blank"></div>
    <?php if ($this->_var['exchange_type'] == 'ucenter'): ?>
    <form action="user.php" method="post" name="transForm" onsubmit="return calcredit();">
      <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
          <th width="120" bgcolor="#FFFFFF" align="right" valign="top"><?php echo $this->_var['lang']['cur_points']; ?>:</th>
          <td bgcolor="#FFFFFF"><label for="pay_points"><?php echo $this->_var['lang']['exchange_points']['1']; ?>:</label>
            <input type="text" size="15" id="pay_points" name="pay_points" value="<?php echo $this->_var['shop_points']['pay_points']; ?>" style="border:0;border-bottom:1px solid #DADADA;" readonly />
            <br />
            <div class="blank"></div>
            <label for="rank_points"><?php echo $this->_var['lang']['exchange_points']['0']; ?>:</label>
            <input type="text" size="15" id="rank_points" name="rank_points" value="<?php echo $this->_var['shop_points']['rank_points']; ?>" style="border:0;border-bottom:1px solid #DADADA;" readonly /></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <th align="right" bgcolor="#FFFFFF"><label for="amount"><?php echo $this->_var['lang']['exchange_amount']; ?>:</label></th>
          <td bgcolor="#FFFFFF"><input size="15" name="amount" id="amount" value="0" onkeyup="calcredit();" type="text" />
            <select name="fromcredits" id="fromcredits" onchange="calcredit();">
              
                  <?php echo $this->html_options(array('options'=>$this->_var['lang']['exchange_points'],'selected'=>$this->_var['selected_org'])); ?>
                
            </select></td>
        </tr>
        <tr>
          <th align="right" bgcolor="#FFFFFF"><label for="desamount"><?php echo $this->_var['lang']['exchange_desamount']; ?>:</label></th>
          <td bgcolor="#FFFFFF"><input type="text" name="desamount" id="desamount" disabled="disabled" value="0" size="15" />
            <select name="tocredits" id="tocredits" onchange="calcredit();">
              
                <?php echo $this->html_options(array('options'=>$this->_var['to_credits_options'],'selected'=>$this->_var['selected_dst'])); ?>
              
            </select></td>
        </tr>
        <tr>
          <th align="right" bgcolor="#FFFFFF"><?php echo $this->_var['lang']['exchange_ratio']; ?>:</th>
          <td bgcolor="#FFFFFF">1 <span id="orgcreditunit"><?php echo $this->_var['orgcreditunit']; ?></span> <span id="orgcredittitle"><?php echo $this->_var['orgcredittitle']; ?></span> <?php echo $this->_var['lang']['exchange_action']; ?> <span id="descreditamount"><?php echo $this->_var['descreditamount']; ?></span> <span id="descreditunit"><?php echo $this->_var['descreditunit']; ?></span> <span id="descredittitle"><?php echo $this->_var['descredittitle']; ?></span></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><input type="hidden" name="act" value="act_transform_ucenter_points" />
            <input type="submit" name="transfrom" value="<?php echo $this->_var['lang']['transform']; ?>" /></td>
        </tr>
      </table>
    </form>
    <script type="text/javascript">
        <?php $_from = $this->_var['lang']['exchange_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'lang_js');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['lang_js']):
?>
        var <?php echo $this->_var['key']; ?> = '<?php echo $this->_var['lang_js']; ?>';
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        var out_exchange_allow = new Array();
        <?php $_from = $this->_var['out_exchange_allow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'ratio');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['ratio']):
?>
        out_exchange_allow['<?php echo $this->_var['key']; ?>'] = '<?php echo $this->_var['ratio']; ?>';
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        function calcredit()
        {
            var frm = document.forms['transForm'];
            var src_credit = frm.fromcredits.value;
            var dest_credit = frm.tocredits.value;
            var in_credit = frm.amount.value;
            var org_title = frm.fromcredits[frm.fromcredits.selectedIndex].innerHTML;
            var dst_title = frm.tocredits[frm.tocredits.selectedIndex].innerHTML;
            var radio = 0;
            var shop_points = ['rank_points', 'pay_points'];
            if (parseFloat(in_credit) > parseFloat(document.getElementById(shop_points[src_credit]).value))
            {
                alert(balance.replace('{%s}', org_title));
                frm.amount.value = frm.desamount.value = 0;
                return false;
            }
            if (typeof(out_exchange_allow[dest_credit+'|'+src_credit]) == 'string')
            {
                radio = (1 / parseFloat(out_exchange_allow[dest_credit+'|'+src_credit])).toFixed(2);
            }
            document.getElementById('orgcredittitle').innerHTML = org_title;
            document.getElementById('descreditamount').innerHTML = radio;
            document.getElementById('descredittitle').innerHTML = dst_title;
            if (in_credit > 0)
            {
                if (typeof(out_exchange_allow[dest_credit+'|'+src_credit]) == 'string')
                {
                    frm.desamount.value = Math.floor(parseFloat(in_credit) / parseFloat(out_exchange_allow[dest_credit+'|'+src_credit]));
                    frm.transfrom.disabled = false;
                    return true;
                }
                else
                {
                    frm.desamount.value = deny;
                    frm.transfrom.disabled = true;
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
       </script> 
    <?php else: ?> 
    <b><?php echo $this->_var['lang']['cur_points']; ?>:</b>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
      <tr>
        <td width="30%" valign="top" bgcolor="#FFFFFF"><table border="0">
            <?php $_from = $this->_var['bbs_points']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'points');if (count($_from)):
    foreach ($_from AS $this->_var['points']):
?>
            <tr>
              <th><?php echo $this->_var['points']['title']; ?>:</th>
              <td width="120" style="border-bottom:1px solid #DADADA;"><?php echo $this->_var['points']['value']; ?></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table></td>
        <td width="50%" valign="top" bgcolor="#FFFFFF"><table>
            <tr>
              <th><?php echo $this->_var['lang']['pay_points']; ?>:</th>
              <td width="120" style="border-bottom:1px solid #DADADA;"><?php echo $this->_var['shop_points']['pay_points']; ?></td>
            </tr>
            <tr>
              <th><?php echo $this->_var['lang']['rank_points']; ?>:</th>
              <td width="120" style="border-bottom:1px solid #DADADA;"><?php echo $this->_var['shop_points']['rank_points']; ?></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <br />
    <b><?php echo $this->_var['lang']['rule_list']; ?>:</b>
    <ul class="point clearfix">
      <?php $_from = $this->_var['rule_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rule');if (count($_from)):
    foreach ($_from AS $this->_var['rule']):
?>
      <li><font class="f1">·</font>"<?php echo $this->_var['rule']['from']; ?>" <?php echo $this->_var['lang']['transform']; ?> "<?php echo $this->_var['rule']['to']; ?>" <?php echo $this->_var['lang']['rate_is']; ?> <?php echo $this->_var['rule']['rate']; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    <form action="user.php" method="post" name="theForm">
      <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" style="border-collapse:collapse;border:1px solid #DADADA;">
        <tr style="background:#F1F1F1;">
          <th><?php echo $this->_var['lang']['rule']; ?></th>
          <th><?php echo $this->_var['lang']['transform_num']; ?></th>
          <th><?php echo $this->_var['lang']['transform_result']; ?></th>
        </tr>
        <tr>
          <td><select name="rule_index" onchange="changeRule()">
              <?php $_from = $this->_var['rule_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'rule');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['rule']):
?>
              <option value="<?php echo $this->_var['key']; ?>"><?php echo $this->_var['rule']['from']; ?>-><?php echo $this->_var['rule']['to']; ?></option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select></td>
          <td><input type="text" name="num" value="0" onkeyup="calPoints()"/></td>
          <td><span id="ECS_RESULT">0</span></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><input type="hidden" name="act" value="act_transform_points"  />
            <input type="submit" value="<?php echo $this->_var['lang']['transform']; ?>" /></td>
        </tr>
      </table>
    </form>
    <script type="text/javascript">
          //<![CDATA[
            var rule_list = new Object();
            var invalid_input = '<?php echo $this->_var['lang']['invalid_input']; ?>';
            <?php $_from = $this->_var['rule_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'rule');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['rule']):
?>
            rule_list['<?php echo $this->_var['key']; ?>'] = '<?php echo $this->_var['rule']['rate']; ?>';
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            function calPoints()
            {
              var frm = document.forms['theForm'];
              var rule_index = frm.elements['rule_index'].value;
              var num = parseInt(frm.elements['num'].value);
              var rate = rule_list[rule_index];

              if (isNaN(num) || num < 0 || num != frm.elements['num'].value)
              {
                document.getElementById('ECS_RESULT').innerHTML = invalid_input;
                rerutn;
              }
              var arr = rate.split(':');
              var from = parseInt(arr[0]);
              var to = parseInt(arr[1]);

              if (from <=0 || to <=0)
              {
                from = 1;
                to = 0;
              }
              document.getElementById('ECS_RESULT').innerHTML = parseInt(num * to / from);
            }

            function changeRule()
            {
              document.forms['theForm'].elements['num'].value = 0;
              document.getElementById('ECS_RESULT').innerHTML = 0;
            }
          //]]>
       </script> 
    <?php endif; ?> 
    <?php endif; ?> 
     
    <?php echo $this->fetch('library/link_to.lbi'); ?>
    <?php echo $this->fetch('library/page_footer.lbi'); ?> </div>
</div>
</body>
<script type="text/javascript">
<?php $_from = $this->_var['lang']['clips_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</script>
</html>
