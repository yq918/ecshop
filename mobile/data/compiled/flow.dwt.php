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

<script language="javascript">
var $wxid = "<?php echo $this->_var['wxid']; ?>";
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,shopping_flow.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,utils.js')); ?>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/TouchSlide.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/ectouch.js"></script>
</head>

<body>
<?php if ($this->_var['step'] == "cart"): ?>
<div id="page">
  <header id="header">
    <div class="header_l"> <a class="ico_10" href="<?php echo $this->_var['jump_http_referer']; ?>"> 返回 </a> </div>
    <h1>购物车</h1>
    <div class="header_r"></div>
  </header>
</div>
 

  <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?> 
<script type="text/javascript">

	$(function(){
		//+-
 		$('.shopcart').find('.psprocount a').click(function(){
			var $id = $(this).attr('data-id');
			var $goods_num = 0;
			if($id == ""){
			   alert_msg("参数错误");
			   return;	
			}
			var price = parseFloat($(this).parents('.item').find('b.price').html());
			console.log(price)
 			if(!$(this).hasClass('r')){
				$goods_num = parseInt($(this).next().val())-1;
				if($goods_num==0) $goods_num=1;
				//$(this).next().val($goods_num);
			}
			if($(this).hasClass('r')){
				$goods_num = parseInt($(this).prev().val())+1;
 				//$(this).prev().val($goods_num);
			}
			//异步更新购物车的数据
			var $url = "flow.php?step=ajax_update_cart";
			$id = parseInt($id);
			$.post($url, {rec_id:$id, goods_number:$goods_num}, function(result){
			  if(result.error == 0){
				  var rec_id = result.rec_id;
			      $('#total_number').html(result.total_number);
			      $('#goods_subtotal').html(result.total_desc);
				  $('#goods_number_'+rec_id).val(result.goods_number);
				  $('.t_p[data-id='+rec_id+']').html(result.goods_subtotal);
			  }else if(result.message != ''){
			      alert_msg(result.message);
		      }        
	       }, 'json');
			//$(this).parents('.item').find('.total1 span').html(price*c);
			
		});
		
		//收藏
		$('.favourite').click(function(){
			var $id = $(this).attr('data-id');
			if($id==""){
			   alert_msg('参数错误');	
			}  
			var $url = "user.php?act=collect&id="+$id;
		    $.post($url, {}, function(data){
			if(data.error == 0){
				$(this).toggleClass('favourited');
				alert_msg(data.message);
			}else{
				alert_msg(data.message);
			}
	       }, 'json');
		});
 	});
	
	function changenum(rec_id){		
	        var goods_number = parseInt(document.getElementById('goods_number_'+rec_id).value);		  	   
			change_goods_number(rec_id,goods_number);
	}
			
	function change_goods_number(rec_id, goods_number)
	{
			Ajax.call('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id +'&goods_number=' + goods_number, change_goods_number_response, 'POST','JSON');  
	} 
			
	function change_goods_number_response(result)
	{    
		if (result.error == 0)
		{
			var rec_id = result.rec_id;
			$('#total_number').html(result.total_number);
			$('#goods_subtotal').html(result.total_desc);
			$('#goods_number_'+rec_id).val(result.goods_number);
			$('.t_p[data-id='+rec_id+']').html(result.goods_subtotal);
		}
		else if(result.message != '')
		{
			alert_msg(result.message);
		}                
	}
  </script>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li class="cur">1.购物车列表</li>
    <li>2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>
<?php if ($this->_var['goods_list']): ?>

  <form id="formCart" name="formCart" method="post" action="flow.php">
    <div class="shopcart">
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
      <div class="item pro">
		<div class="al">
			<div class="img">
				<a  href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"> <img class="lazy" src="<?php echo $this->_var['site_url']; ?>mobile/<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /> </a> 
			</div>
			<div class="info1">
				<h5><?php echo $this->_var['goods']['goods_name']; ?></h5>
				
				<?php if ($this->_var['goods']['plus_reduce']): ?>
				<p><em><b class="price">￥<?php echo $this->_var['goods']['goods_price_noformat']; ?></b></em>(返佣：<?php echo $this->_var['goods']['plus_reduce']; ?>)<span>￥<?php echo $this->_var['goods']['market_price_noformat']; ?></span></p>
				<?php else: ?>
				<p><em><b class="price">￥<?php echo $this->_var['goods']['goods_price_noformat']; ?></b></em><span>￥<?php echo $this->_var['goods']['market_price_noformat']; ?></span></p>
				<?php endif; ?>
				
				<div class="count psprocount">
					<span>数量：</span>
					<a href="#here" class="change" data-id="<?php echo $this->_var['goods']['rec_id']; ?>">-</a>
					<input  type="text" min="1" max="1000" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" onkeyup="changenum(<?php echo $this->_var['goods']['rec_id']; ?>)">
					<a class="r" href="#here" class="change"  data-id="<?php echo $this->_var['goods']['rec_id']; ?>">+</a>
				</div>
			</div>
		</div>
		<div class="total1"><a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>';" class="del"></a><a href="#here" <?php if ($this->_var['goods']['is_collect']): ?>class="favourited"<?php else: ?>class="favourite"<?php endif; ?> data-id="<?php echo $this->_var['goods']['goods_id']; ?>"></a><em><span class="t_p" data-id="<?php echo $this->_var['goods']['rec_id']; ?>">￥<?php echo $this->_var['goods']['total_price']; ?></span></em></div>
	  </div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <input type="hidden" name="step" value="update_cart" />
  </form>
<?php if ($this->_var['favourable_list']): ?>
<?php $_from = $this->_var['favourable_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'favourable');if (count($_from)):
    foreach ($_from AS $this->_var['favourable']):
?>
<form action="flow.php" method="post">
    <section class="order_box padd1  goodsBuy "> 
      <table class="ectouch_table" width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="25%" bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['label_act_name']; ?></td>
          <td width="75%" bgcolor="#ffffff" align="left"><?php echo $this->_var['favourable']['act_name']; ?></td>
        </tr>
        <tr>
          <td width="15%"  bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['favourable_period']; ?></td>
          <td width="35%" bgcolor="#ffffff" align="left"><?php echo $this->_var['favourable']['start_time']; ?> --- <?php echo $this->_var['favourable']['end_time']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['favourable_range']; ?></td>
          <td bgcolor="#ffffff" align="left"> <?php echo $this->_var['lang']['far_ext'][$this->_var['favourable']['act_range']]; ?><br />
              <?php echo $this->_var['favourable']['act_range_desc']; ?>
        </tr>
        <tr>
          <td bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['favourable_amount']; ?></td>
          <td bgcolor="#ffffff" align="left"> <?php echo $this->_var['favourable']['formated_min_amount']; ?> --- <?php echo $this->_var['favourable']['formated_max_amount']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#ffffff" align="right"><?php echo $this->_var['lang']['favourable_type']; ?></td>
          <td bgcolor="#ffffff" align="left"> 
          <span class="STYLE1"><?php echo $this->_var['favourable']['act_type_desc']; ?></span>
                <?php if ($this->_var['favourable']['act_type'] == 0): ?>
                <?php $_from = $this->_var['favourable']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gift');if (count($_from)):
    foreach ($_from AS $this->_var['gift']):
?><br />
                  <input type="checkbox" value="<?php echo $this->_var['gift']['id']; ?>" name="gift[]" />
                  <a href="goods.php?id=<?php echo $this->_var['gift']['id']; ?>" target="_blank" class="f6"><?php echo $this->_var['gift']['name']; ?></a> [<?php echo $this->_var['gift']['formated_price']; ?>]
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <?php endif; ?>  
          </td>
        </tr>
        <?php if ($this->_var['favourable']['available']): ?>
            <tr>
              <td align="right" bgcolor="#ffffff">&nbsp;</td>
              <td bgcolor="#ffffff" align="left">
                <div class="option">
                 <button class="btn cart radius5" type="image">
                <div class="ico_01"></div>
                加入购物车
                </button>
                 </div>
              </td>
            </tr>
            <?php endif; ?>
      </table>
      <input type="hidden" name="act_id" value="<?php echo $this->_var['favourable']['act_id']; ?>" />
          <input type="hidden" name="step" value="add_favourable" />
    </section>
    </form>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>

<footer class="toolbar">
  <p>合计: <em class="price" id="goods_subtotal"><?php echo $this->_var['total']['goods_price']; ?></em></p>
  <a href="flow.php?step=checkout">结算(<em class="num" id="total_number"><?php echo $this->_var['total']['total_number']; ?></em>)</a> </footer>
<?php else: ?>
<section class="wrap"  >
  <div class="empty-cart">
    <div class="ico_13 cart-logo"></div>
    <p class="message2">还没留下您的脚印？</p>
    <p class="message3">怎么能忍</p>
    <div class="flex"> <a class="c-btn2  flex_in radius5" href="index.php" style=" background:#6bd0a2"> <i class="ico_04_b"></i> 去购物 </a> <a class="c-btn2  flex_in radius5" href="user.php?act=collection_list" style=" margin-left:0.5rem"> 查看收藏夹</a> </div>
  </div>
</section>
<?php endif; ?> 
<?php if ($_SESSION['user_id'] > 0): ?> 
<?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?> 
<script type="text/javascript" charset="utf-8">
        function collect_to_flow(goodsId)
        {
          var goods        = new Object();
          var spec_arr     = new Array();
          var fittings_arr = new Array();
          var number       = 1;
          goods.spec     = spec_arr;
          goods.goods_id = goodsId;
          goods.number   = number;
          goods.parent   = 0;
          Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), collect_to_flow_response, 'POST', 'JSON');
        }
        function collect_to_flow_response(result)
        {
          if (result.error > 0)
          {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
              if (confirm(result.message))
              {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
              }
            }
            else if (result.error == 6)
            {
              openSpeDiv(result.message, result.goods_id);
            }
            else
            {
              alert(result.message);
            }
          }
          else
          {
            location.href = 'flow.php';
          }
        }
      </script> 

<?php endif; ?> 
<?php endif; ?> 

<?php if ($this->_var['step'] == "consignee"): ?> 
 
<?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?> 
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
<div id="page">
  <header id="header">
    <div class="header_l"> <a class="ico_10" href="flow.php?step=cart"> 返回 </a> </div>
    <h1> 收货人信息 </h1>
  </header>
</div>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li  class="cur">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>
<div class="wrap"> 
   
  <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
  <section class="order_box padd1" style="padding-top:0;padding-bottom:0;">
    <div class="table_box2 table_box radius0" >
      <form style="padding:8px;" action="flow.php" method="post" name="theForm" id="theForm" onSubmit="return checkConsignee(this)">
        <?php echo $this->fetch('library/consignee.lbi'); ?>
      </form>
    </div>
  </section>
  <div class="blank3"></div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
  
</div>

<?php endif; ?> 


<?php if ($this->_var['step'] == "checkout"): ?>
<script>
 onload = function() {  
 var sp = document.getElementsByName('shipping');
         
             for (i=0;i<sp.length;i++){
                 if (sp[i].checked){
                    oRadioValue = sp[i];
                   }
            }
             selectShipping(oRadioValue );   

   var py = document.getElementsByName('payment');
   for (i=0;i<py.length;i++){
             if (py[i].checked){
                oRadioValue = py[i];
               }
        }
         selectPayment(oRadioValue );   

var pack = document.getElementsByName('pack');
 for (i=0;i<pack.length;i++){
             if (pack[i].checked){
                oRadioValue = pack[i];
               }
        }
         selectPack(oRadioValue );   
var bonus = document.getElementsByName('bonus');
 for (i=0;i<bonus.length;i++){
             if (bonus[i].checked){
                oRadioValue = bonus[i];
               }
        }
         changeBonus(oRadioValue ); 



var card = document.getElementsByName('card');
 for (i=0;i<card.length;i++){
             if (card[i].checked){
                oRadioValue = card[i];
               }
        }
         selectCard(oRadioValue ); 
 
          }
</script>
<div id="page">
  <header id="header">
    <div class="header_l"> <a class="ico_10" href="flow.php"> 返回 </a> </div>
    <h1> 确认订单 </h1>
  </header>
</div>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li class="cur">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>
<section class="wrap1">
  <form action="flow.php" method="post" name="theForm" id="theForm" onSubmit="return checkOrderForm(this)">
    <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
        </script>
    <h4 class="order_title">收货人信息</h4>
    <section class="order_box padd1" style="padding-top:0">
        <div class="table_box table_box1">
          <dl>
            <dd class="w50"><?php echo $this->_var['lang']['consignee_name']; ?> <span class="f1"><?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?></span></dd>
            <dd class="w50 c999">
              <div class="ico_14"></div>
              <?php echo $this->_var['consignee']['tel']; ?> <a href="flow.php?step=consignee" class="modify radius5"><?php echo $this->_var['lang']['modify']; ?></a></dd>
          </dl>
          <dl>
            <dd class="w50 b_no" ><?php echo $this->_var['lang']['detailed_address']; ?> <?php echo htmlspecialchars($this->_var['consignee']['address']); ?> </dd>
          </dl>
        </div>
    </section>
    <div class="blank3"></div>
      <h4 class="order_title">配送与支付</h4>
    <section class="order_box padd1" style="padding-top:0.3rem;padding-bottom:0.3rem;">
      <div class="table_box table_box2">
        <?php if ($this->_var['total']['real_goods_count'] != 0): ?>
        <dl>
          <dd class="dd1"><?php echo $this->_var['lang']['shipping_method']; ?> <span class="span1 radius5">必填</span></dd>
          <dd class="dd2" id="selected1">请选择配送方式</dd>
          <i></i>
        </dl>
		<div class="dl_box" id="shipping" style="display:none">
		  <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
		  <p>
            <input name="shipping" type="radio" class="radio" id="shipping_<?php echo $this->_var['shipping']['shipping_id']; ?>" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked="true"<?php endif; ?> supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" style="vertical-align:middle"/><label for="shipping_<?php echo $this->_var['shipping']['shipping_id']; ?>"> <?php echo $this->_var['shipping']['shipping_name']; ?> [<?php echo $this->_var['shipping']['format_shipping_fee']; ?>]</label>
           </p>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
             <!--  <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  />
                <?php echo $this->_var['lang']['need_insure']; ?>-->
		</div>
        <?php else: ?>
        <input name="shipping"  type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?>
         <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>
        <dl>
          <dd class="dd1"><?php echo $this->_var['lang']['payment_method']; ?> <span class="span1 radius5">必填</span></dd>
          <dd class="dd2 selectPayment" id="selected2">请选择支付方式</dd>
          <i></i>
        </dl>
		<div class="dl_box" id="payment" style="display:none">
		  <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
		  <p>
           <input type="radio" class="radio" name="payment" id="payment_<?php echo $this->_var['payment']['pay_id']; ?>" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?>checked<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" class="option-input radio" style="vertical-align:middle" /><label for="payment_<?php echo $this->_var['payment']['pay_id']; ?>"><?php echo $this->_var['payment']['pay_name']; ?> [<?php echo $this->_var['payment']['format_pay_fee']; ?>]</label>
           </p>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
        <?php else: ?>
        <input name = "payment" type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?>  
        <!--<dl class="b_no" style="line-height: 40px;">
          <dd class="dd1">是否开票</dd>
		  <span class="modRadio fr" style="margin-top: 10px;">
            <i class="fl"></i>
            <ins>否</ins>
         </span>
        </dl>-->
		<div class="dl_box" id="inviype_box" style="margin-bottom:0.5rem; display:none;">
            <?php if ($this->_var['inv_content_list']): ?>
                <dl style="line-height: 40px;">
                    <dd class="c333">发票类型</dd>
                    <dd>
                     <?php if ($this->_var['inv_type_list']): ?>
                    <?php echo $this->_var['lang']['invoice_type']; ?>
                    <select name="inv_type" id="ECS_INVTYPE"  onchange="changeNeedInv()" style="border:1px solid #ccc;">
                    <?php echo $this->html_options(array('options'=>$this->_var['inv_type_list'],'selected'=>$this->_var['order']['inv_type'])); ?></select>
                    <?php endif; ?>
                        </dd>
                      </dl>		
            
                <dl style="line-height: 40px;">
                    <dd class="c333">发票抬头</dd>
                    <dd><input name="inv_payee" type="text"  class="input" id="ECS_INVPAYEE" size="20" value="<?php echo $this->_var['order']['inv_payee']; ?>" onblur="changeNeedInv()" /></dd>
                </dl>	
                 <dl style="line-height: 40px;">
                    <dd class="c333">
                    发票内容
                    </dd>
                    <dd>
                   <select name="inv_content" id="ECS_INVCONTENT"  onchange="changeNeedInv()" style="border:1px solid #ccc;">

                <?php echo $this->html_options(array('values'=>$this->_var['inv_content_list'],'output'=>$this->_var['inv_content_list'],'selected'=>$this->_var['order']['inv_content'])); ?>
                   </select>
                     </dd> 
                </dl>	
            <?php endif; ?>
			  
		</div>	
      </div>
    </section>
    <div class="blank3"> </div>
     <h4 class="order_title">使用积分或红包</h4>
    <section class="order_box padd1" style="padding-top:0.3rem;padding-bottom:0.3rem;">
      <div class="table_box table_box2" style=" margin-bottom:0.5rem"> 
	  
        <?php if ($this->_var['allow_use_bonus']): ?>
        <dl>
          <dd class="dd1"> <?php echo $this->_var['lang']['use_bonus']; ?> </dd>
          <dd class="dd2" id="selected4"> 未选择 </dd>  
          <i></i>
        </dl>
		<div class="dl_box" id="bonus_box" style="display:none;">
          <?php $_from = $this->_var['bonus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
           <p>
            <input name="bonus" type="radio" class="radio" value="0" <?php if ($this->_var['order']['bonus_id'] == 0): ?>selected<?php endif; ?> onclick="changeBonus(this.value)" class="option-input radio"/>不使用红包
           </p>
            <p>
            <input name="bonus" type="radio" id="bonus_<?php echo $this->_var['bonus']['bonus_id']; ?>" class="radio" value="<?php echo $this->_var['bonus']['bonus_id']; ?>"  onclick="changeBonus(this.value)" class="option-input radio"/><label for="bonus_<?php echo $this->_var['bonus']['bonus_id']; ?>"><?php echo $this->_var['bonus']['type_name']; ?>[<?php echo $this->_var['bonus']['bonus_money_formated']; ?>]</label>
           </p>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
        <?php endif; ?> 
	
		
        <?php if ($this->_var['pack_list']): ?>
        <dl class="b_no">
          <dd class="dd1"><?php echo $this->_var['lang']['goods_package']; ?></dd>
		   <dd class="dd2" id="selected5"> 未选择 </dd>  
           <i></i>
        </dl>
		<div class="dl_box" id="package_box" style="display:none;">
         <p> <input type="radio" class="radio"  name="pack" value="0" <?php if ($this->_var['order']['pack_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" /><?php echo $this->_var['lang']['no_pack']; ?></p>
         <?php $_from = $this->_var['pack_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pack');if (count($_from)):
    foreach ($_from AS $this->_var['pack']):
?>
		  <p><input type="radio" class="radio" name="pack" id="pack_<?php echo $this->_var['pack']['pack_id']; ?>" value="<?php echo $this->_var['pack']['pack_id']; ?>" <?php if ($this->_var['order']['pack_id'] == $this->_var['pack']['pack_id']): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" /><label for="pack_<?php echo $this->_var['pack']['pack_id']; ?>"><?php echo $this->_var['pack']['pack_name']; ?>[<?php echo $this->_var['pack']['format_pack_fee']; ?>]</label></p>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 	
		</div>
        <?php endif; ?> 
		
		
        <?php if ($this->_var['card_list']): ?>
        <dl class="b_no">
          <dd class="dd1"><?php echo $this->_var['lang']['goods_card']; ?></dd>
           <dd class="dd2" id="selected6"> 未选择 </dd>  
          <i></i>
        </dl>
		
		<div class="dl_box" id="card_box" style="display:none;">
           <p> <input type="radio" class="radio"  name="card" value="0" <?php if ($this->_var['order']['card_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectCard(this)" class="option-input radio"/><?php echo $this->_var['lang']['no_card']; ?></p>
		    <?php $_from = $this->_var['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
           <p><input type="radio" class="radio"  name="card"  id="card_<?php echo $this->_var['card']['card_id']; ?>" value="<?php echo $this->_var['card']['card_id']; ?>" <?php if ($this->_var['order']['card_id'] == $this->_var['card']['card_id']): ?>checked="true"<?php endif; ?> onclick="selectCard(this)" class="option-input radio"/><label for="card_<?php echo $this->_var['card']['card_id']; ?>"><?php echo $this->_var['card']['card_name']; ?>[<?php echo $this->_var['card']['format_card_fee']; ?>]</label>
           </p>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
        <?php endif; ?> 
		            <?php if ($this->_var['allow_use_surplus']): ?>
								<div class="dl_box">
            <dl style="height:50px;">
              <dd class="dd1"><?php echo $this->_var['lang']['use_surplus']; ?></dd>
              <dd class="dd2" bgcolor="#ffffff"><input name="surplus" type="text" class="input_surplus" id="ECS_SURPLUS" size="10" value="<?php echo empty($this->_var['order']['surplus']) ? '0' : $this->_var['order']['surplus']; ?>" onblur="changeSurplus(this.value)" <?php if ($this->_var['disable_surplus']): ?>disabled="disabled"<?php endif; ?> />
              <div><?php echo $this->_var['lang']['your_surplus']; ?><?php echo empty($this->_var['your_surplus']) ? '0' : $this->_var['your_surplus']; ?> <span id="ECS_SURPLUS_NOTICE" class="notice"></span></div></dd>
            </dl>
				</div>	
            <?php endif; ?>
		
		<div class="dl_box">
		 <dl>
				<dd class="c333">
				留言备注
				</dd>
				<dd >	
			<input placeholder="请输入订单备注" name="inv_payee" type="text"   size="20"  />
				 </dd>
		 </dl>
		 <dl>
				<dd class="c333">
			 
				</dd>
				<dd >	
		 	<a href="flow.php" class="modify radius5"><?php echo $this->_var['lang']['modify']; ?></a>
			 
				 </dd>
			</dl>
		</div>	
		
		<?php if ($this->_var['allow_use_integral']): ?>
					<div class="dl_box">
            <dl>
              <dd class="dd1"><?php echo $this->_var['lang']['use_integral']; ?></dd>
              <dd class="dd2" bgcolor="#ffffff"><input name="integral" type="text" class="input" id="ECS_INTEGRAL" onblur="changeIntegral(this.value)" value="<?php echo empty($this->_var['order']['integral']) ? '0' : $this->_var['order']['integral']; ?>" size="10" />           
              <div><?php echo $this->_var['lang']['can_use_integral']; ?>:<?php echo empty($this->_var['your_integral']) ? '0' : $this->_var['your_integral']; ?> <?php echo $this->_var['points_name']; ?>，<?php echo $this->_var['lang']['noworder_can_integral']; ?><?php echo $this->_var['order_max_integral']; ?>  <?php echo $this->_var['points_name']; ?>. <span id="ECS_INTEGRAL_NOTICE" class="notice"></span></div>
               </dd>
            </dl>
			 </div>
			 					<div class="dl_box">
            <dl>
              <dd style="color:#999">  </dd>
			    </dl>
			 </div>
    <?php endif; ?>	
		
		
		
		
      </div>
    </section>
    
    
    <h4 class="order_title">使用优惠券或打折卡</h4>
     <section class="order_box padd1" style="padding-top:0.3rem;padding-bottom:0.3rem;">
      <div class="table_box table_box2" style=" margin-bottom:0.5rem">  
		      
		<div class="dl_box">
		 <dl style="width:75%">
				<dd class="c333">优惠卷或打折卡编号:</dd>
				<dd ><input placeholder="请输入优惠卷或打折卡编号" name="counpon_number" id="counpon_number" type="text"   size="20"  /> </dd>
                <dd class="dd1"><input   type="button" name="but" value="优惠兑换"  onClick="checkCoupon()" /></dd>
                <input type="hidden" value="<?php echo $this->_var['shop_price_arr']['pays']; ?>" id="pricepay"/>
		 </dl>		 
		</div> 
      </div>
    </section>
    
    
    
    
    <div class="blank3"> </div>
    <h4 class="order_title">返佣</h4>
    <section class="order_box padd1" style="padding-top:0.3rem;padding-bottom:0.3rem;">
      <div class="table_box table_box2" style=" margin-bottom:0.5rem"> 
		<div class="dl_box">
		 <dl>
              <dd class="c333">应付金额</dd>
				<dd ><?php echo $this->_var['shop_price_arr']['should_pay']; ?></dd>
		 </dl>
		 <dl>
		 <dl>
              <dd class="c333">优惠金额</dd>
				<dd ><?php echo $this->_var['shop_price_arr']['save']; ?></dd>
		 </dl>
		 <dl>
              <dd class="c333">实际支付</dd>
				<dd ><?php echo $this->_var['shop_price_arr']['pay']; ?></dd>
		 </dl>
		</div>	
      </div>
    </section>

    
    <div class="blank3"></div>
    <input type="submit" name="submit" value="提交订单" class="c-btn3" />
    <input type="hidden" name="step" value="done" />
  </form>
</section>

<?php endif; ?> 

<?php if ($this->_var['step'] == "done"): ?> 

<style type="text/css">
/* 本例子css */
.pay_bottom{
	display: inline-block;
	min-width: 60px;
	height: 40px;
	padding: 0 15px;
	border: 0;
	background: #f40;
	text-align: center;
	text-decoration: none;
	line-height: 40px;
	color: #fff;
	font-size: 14px;
	font-weight: 700;
	-webkit-border-radius: 2px;
	background: -webkit-gradient(linear,0 0,0 100%,color-stop(0,#f50),color-stop(1,#f40));
	text-shadow: 0 -1px 1px #ca3511;
	-webkit-box-shadow: 0 -1px 0 #bf3210 inset;
}	
</style>
<header id="header">
    <h1> 订单提交成功 </h1>
</header>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li>2.确认订单</li>
    <li class="cur">3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>

<section class="content">
  <div id="J_plugin_cart">
    
    <div class="bcont">
      <div id="J_allGoods">
        <div class="cont">
          <section class="order on">
            <h6 style="text-align:center;line-height:20px; font-size:16px;"><?php echo $this->_var['lang']['remember_order_number']; ?>: <font style="color:red"><?php echo $this->_var['order']['order_sn']; ?></font></h6>
            <table width="94%" align="center" border="0" cellpadding="15" cellspacing="0" class="buy_success_tb" bgcolor="#FFFFFF">
              <tr>
                <td align="left" style="padding: 5px;line-height: 24px;"><?php if ($this->_var['order']['shipping_name']): ?><?php echo $this->_var['lang']['select_shipping']; ?>: <?php echo $this->_var['order']['shipping_name']; ?><br><?php endif; ?><?php echo $this->_var['lang']['select_payment']; ?>: <?php echo $this->_var['order']['pay_name']; ?><br><?php echo $this->_var['lang']['order_amount']; ?>: <font color="red"><?php echo $this->_var['total']['amount_formated']; ?></font><br><?php echo $this->_var['order']['pay_desc']; ?></td>
              </tr>
              <?php if ($this->_var['pay_online']): ?> 
              
              <tr>
                <td align="center"><?php echo $this->_var['pay_online']; ?></td>
              </tr>
              <?php endif; ?>
            </table>
            <?php if ($this->_var['virtual_card']): ?>
            <div  style="text-align:center;overflow:hidden;border:1px solid #E2C822; background:#FFF9D7;margin:10px;padding:10px 50px 30px; margin:10px;"> 
              <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
              <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
              <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
              <ul style="list-style:none;padding:0;margin:0;clear:both">
                <?php if ($this->_var['card']['card_sn']): ?>
                <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span> </li>
                <?php endif; ?> 
                <?php if ($this->_var['card']['card_password']): ?>
                <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span> </li>
                <?php endif; ?> 
                <?php if ($this->_var['card']['end_date']): ?>
                <li style="float:left;"> <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?> </li>
                <?php endif; ?>
              </ul>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <?php endif; ?>
            
          </section>
          <div style="margin:0 atuo; padding:2%">
            <h4 class="order_title">您可以</h4>
             <div class="return_index">
                <ul>
                 <li><button type="button" class="c-btn5" name="Submit" onClick="link_to('index.php')">返回首页</button>
                 </li>
                 <li> <button type="button" class="c-btn3" name="Submit" onClick="link_to('user.php')">用户中心</button></li>
               </ul>  
            </div>
          </div>
        </dl>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>




<?php if ($this->_var['step'] == "ok"): ?> 

<style type="text/css">
/* 本例子css */
.pay_bottom{
  display: inline-block;
  min-width: 60px;
  height: 40px;
  padding: 0 15px;
  border: 0;
  background: #f40;
  text-align: center;
  text-decoration: none;
  line-height: 40px;
  color: #fff;
  font-size: 14px;
  font-weight: 700;
  -webkit-border-radius: 2px;
  background: -webkit-gradient(linear,0 0,0 100%,color-stop(0,#f50),color-stop(1,#f40));
  text-shadow: 0 -1px 1px #ca3511;
  -webkit-box-shadow: 0 -1px 0 #bf3210 inset;
} 
</style>
<header id="header">
    <div class="header_l"> <a class="ico_10" href="index.php"> 返回 </a> </div>
    <h1> </h1>
</header>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li>2.确认订单</li>
    <li class="cur">3.购买成功</li>
  </ul>
</div>
<div class="blank3"></div>

<section class="content">
  <div id="J_plugin_cart">
    
    <div class="bcont">
      <div id="J_allGoods">
        <div class="cont">
          <section class="order on">
            <h6 style="text-align:center;line-height:20px;"><?php echo $this->_var['lang']['remember_order_number']; ?>: <font style="color:red"><?php echo $this->_var['order']['order_sn']; ?></font></h6>
            <table width="90%" align="center" border="0" cellpadding="15" cellspacing="0" style="border:1px solid #ddd; margin:10px auto;" bgcolor="#FFFFFF">
              <tr>
                <td align="left" style="padding: 5px;line-height: 24px;"><?php if ($this->_var['order']['shipping_name']): ?><?php echo $this->_var['lang']['select_shipping']; ?>: <strong><?php echo $this->_var['order']['shipping_name']; ?></strong><br><?php endif; ?><?php echo $this->_var['lang']['select_payment']; ?>: <strong><?php echo $this->_var['order']['pay_name']; ?></strong><br><?php echo $this->_var['lang']['order_amount']; ?>: <strong><?php echo $this->_var['order']['order_amount_formated']; ?></strong><br><?php echo $this->_var['order']['pay_desc']; ?></td>
              </tr>
              <?php if ($this->_var['pay_online']): ?> 
              
              <tr>
                <td align="center" class="pay"><?php echo $this->_var['pay_online']; ?></td>
              </tr>
              <?php endif; ?>
            </table>
            <?php if ($this->_var['virtual_card']): ?>
            <div  style="text-align:center;overflow:hidden;border:1px solid #E2C822; background:#FFF9D7;margin:10px;padding:10px 50px 30px; margin:10px;"> 
              <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
              <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
              <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
              <ul style="list-style:none;padding:0;margin:0;clear:both">
                <?php if ($this->_var['card']['card_sn']): ?>
                <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span> </li>
                <?php endif; ?> 
                <?php if ($this->_var['card']['card_password']): ?>
                <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span> </li>
                <?php endif; ?> 
                <?php if ($this->_var['card']['end_date']): ?>
                <li style="float:left;"> <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?> </li>
                <?php endif; ?>
              </ul>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <?php endif; ?>
             <div style="margin:0 atuo; padding:2%">
            <h4 class="order_title">您可以</h4>
             <div class="return_index">
                <ul>
                 <li><button type="button" class="c-btn5" name="Submit" onClick="link_to('index.php')">返回首页</button>
                 </li>
                 <li> <button type="button" class="c-btn3" name="Submit" onClick="link_to('user.php')">用户中心</button></li>
               </ul>  
            </div>
          </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>  
<?php if ($this->_var['step'] == "login"): ?>
<div id="page">
  <header id="header">
    <div class="header_l"> <a class="ico_10" onClick="javascript:history.go(-1)"> 返回 </a> </div>
    <h1> 登录/注册 </h1>
  </header>
</div>
<div class="cart-step" id="J_cartTab">
  <ul>
    <li>1.购物车列表</li>
    <li class="cur">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<div class="blank2"></div>
<section class="wrap"> <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,user.js')); ?> 
  <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        
  </script> 
  
  <div id="leftTabBox" class="loginBox">
    <div class="hd"> <span>登录后可体验更多服务</span>
      <ul>
         <li<?php if ($this->_var['action'] == 'login'): ?> class="on"<?php endif; ?>><a>登录</a></li>
         <li<?php if ($this->_var['action'] == 'register'): ?> class="on"<?php endif; ?>><a>注册</a></li>
      </ul>
    </div>
    <div class="bd" id="tabBox1-bd" <?php if ($this->_var['action'] == 'register'): ?> style="display:none"<?php endif; ?>>
      <ul>
      <div class="table_box">
          <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
            <dl>
              <dd>
                <input placeholder="<?php echo $this->_var['lang']['username']; ?>/<?php echo $this->_var['lang']['mobile']; ?>/<?php echo $this->_var['lang']['email']; ?>" name="username" type="text"  class="inputBg" id="username" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input placeholder="<?php echo $this->_var['lang']['label_password']; ?>"  name="password" type="password" class="inputBg" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input type="checkbox" value="1" name="remember" id="remember" style="vertical-align:middle; zoom:200%;" /><label for="remember"> 一个月内免登录</label>
              </dd>
            </dl>
            <dl>
              <dd>
                 <input type="submit" name="login" class="c-btn3" value="<?php echo $this->_var['lang']['forthwith_login']; ?>" />
                 <?php if ($this->_var['anonymous_buy'] == 1): ?>
                <br/>
                 <input type="button" value="<?php echo $this->_var['lang']['direct_shopping']; ?>" class="c-btn3" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" />
                 <?php endif; ?>
                 <input name="act" type="hidden" value="signin" />
              </dd>
            </dl>
          </form>
          <dl>
            <dd> <a href="user.php?act=get_password" class="f6">忘记密码</a> </dd>
          </dl>
          <div class="hezuo">
            <p class="t">使用合作账号登录</p>
            <p class="b"><a href="user.php?act=oath&type=qq"><img src="<?php echo $this->_var['ectouch_themes']; ?>/images/quicklogin/qq.png"></a> <a href="user.php?act=oath&type=weibo"><img src="<?php echo $this->_var['ectouch_themes']; ?>/images/quicklogin/weibo.png"></a> <a href="user.php?act=oath&type=renren"><img src="<?php echo $this->_var['ectouch_themes']; ?>/images/quicklogin/renren.png"></a></p>
          </div>
        </div>
      </ul>
      </div>
        <div class="bd"<?php if ($this->_var['action'] == 'login'): ?> style="display:none"<?php endif; ?>>
          <ul style="height:25rem">
      	<?php if ($this->_var['enabled_sms_signin'] == 1): ?>
        <form action="user.php" method="post" name="formUser" onsubmit="return register2();">
          <input type="hidden" name="flag" id="flag" value="register" />
          <div class="table_box">
            <dl>
              <dd>
                <input placeholder="请输入手机号码" class="inputBg" name="mobile" id="mobile_phone" type="text" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input placeholder="请输入帐号密码" class="inputBg" name="password" id="mobile_pwd" type="password" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input placeholder="请输入验证码" class="inputBg" name="mobile_code" id="mobile_code" type="text" />
              </dd>
              <dd>
              <input id="zphone" name="sendsms" type="button" value="获取手机验证码" onClick="sendSms();" class="c-btn3" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input id="agreement" name="agreement" type="checkbox" value="1" checked="checked" style="vertical-align:middle; zoom:200%;" /><label for="agreement"> 我已看过并同意《<a href="article.php?cat_id=-1">用户协议</a>》</label>
              </dd>
            </dl>
            <dl>
              <dd>
                <input name="act" type="hidden" value="act_register" />
                <input name="enabled_sms" type="hidden" value="1" />
                <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                <input name="Submit" type="submit" value="下一步" class="c-btn3" />
              </dd>
            </dl>
          </div>
        </form>
        <?php else: ?>
        <form action="user.php" method="post" name="formUser" onsubmit="return register();">
          <input type="hidden" name="flag" id="flag" value="register" />
          <div class="table_box">
            <dl>
              <dd>
                <input placeholder="请输入用户名" class="inputBg" name="username" id="username" type="text" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input placeholder="请输入电子邮箱" class="inputBg" name="email" id="email" type="text" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input placeholder="请输入登录密码" class="inputBg" name="password" id="password1" type="password" />
              </dd>
            </dl>
            <dl>
              <dd>
                <input placeholder="请重新输入一遍密码" class="inputBg" name="confirm_password" id="confirm_password" type="password" />
              </dd>
            </dl>
            <?php if ($this->_var['enabled_captcha']): ?>
            <dl>
              <dd>
                <input placeholder="请输入验证码" class="inputBg" name="captcha" id="captcha" type="text" />
              </dd>
              <dd>
              <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="height:34px;vertical-align: middle; margin-left:5px;" onClick="this.src='captcha.php?'+Math.random()" />
              </dd>
            </dl>
            <?php endif; ?>
            <dl>
              <dd>
                <input id="agreement" name="agreement" type="checkbox" value="1" checked="checked" style="vertical-align:middle; zoom:200%;" /><label for="agreement"> 我已看过并同意《<a href="article.php?cat_id=-1">用户协议</a>》</label>
              </dd>
            </dl>
            <dl>
              <dd>
                <input name="act" type="hidden" value="act_register" />
                <input name="enabled_sms" type="hidden" value="0" />
                <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                <input name="Submit" type="submit" value="下一步" class="c-btn3" />
              </dd>
            </dl>
          </div>
        </form>
        <?php endif; ?>
        <?php if ($this->_var['need_rechoose_gift']): ?>
        <?php echo $this->_var['lang']['gift_remainder']; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/sms.js"></script>
</section>

<script type="text/javascript">
jQuery(function($){
	$('.hd ul li').click(function(){
		var index = $('.hd ul li').index(this);
		$(this).addClass('on').siblings('li').removeClass('on');
		$('.loginBox .bd:eq('+index+')').show().siblings('.bd').hide();
	})
})
</script>
 
<?php endif; ?>

<div class="blank3"></div>
<?php echo $this->fetch('library/public_link.lbi'); ?> 
</body>
<script type="text/javascript">
  function checkCoupon()
  {
	var coun=  $("#counpon_number").val(); 
	var pricepay = $("#pricepay").val();
    if(coun.length ==0 || coun.length>18){
		  alert('请输入优惠卷或打折卡编号');
		  return false;
		 }
   if(coun.length <10 || coun.length>18){
		  alert('优惠卷或打折卡编号格式错误');
		  return false;
	 }
  $.post("./flow.php?step=checkcounpon",{counpon_number:coun,pays:pricepay},function(result){
     // $("span").html(result);
	 var code = result.code;
	 if(code == '1'){
		  alert(result.msg);
		 }else{
			 alert(result.counponPrice);
			 }	 
   },'json');  
  }

var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
