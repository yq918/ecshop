
<div id="content" class="footer mr-t20">
  <div style="height:46px;">&nbsp;</div>
</div>

<link href="<?php echo $this->_var['ectouch_themes']; ?>/css/foot.css" type="text/css" rel="stylesheet"/>

<div class="footbar clearfix">
	<ul>
		<li <?php if ($this->_var['request_page'] == 'index.php'): ?>class="active"<?php endif; ?>><a href="index.php"><em class="bar1"></em><p>首页</p></a></li>
		<li <?php if ($this->_var['request_page'] == 'cart.php'): ?>class="active"<?php endif; ?>><a href="flow.php?step=cart"><em class="bar3"></em><p>购物车 <div id="carId" style="display:none"></div><div id="globalId" style="display:none"></div></p></a></li>
		<li <?php if ($this->_var['request_page'] == 'user.php'): ?>class="active"<?php endif; ?>><a href="user.php"><em class="bar4"></em><p>会员中心</p></a></li>
        <li <?php if ($this->_var['request_page'] == 'distribute.php'): ?>class="active"<?php endif; ?>><a href="distribute.php"><em class="bar2"></em><p><?php echo $this->_var['wxconf']['distribute_keywords']; ?></p></a></li>
	</ul>
</div>

<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/zepto.min.js?v=20140408"></script>
<script src="<?php echo $this->_var['ectouch_themes']; ?>/js/lazyload.js"></script>
<?php if ($this->_var['php_self'] == 'goods.php'): ?>
<script type="text/javascript">
$(function(){
//延迟加载图片
	$("img:not(.goods_slde)").lazyload({	 
       effect : "fadeIn" 
    });	
});	
</script>
<?php elseif ($this->_var['php_self'] == 'index.php'): ?>
<script type="text/javascript">
$(function(){
//延迟加载图片
	$("img:not(.slideimg)").lazyload({	 
       effect : "fadeIn" 
    });	
});	
</script>
<?php else: ?>
<script type="text/javascript">
$(function(){
//延迟加载图片
	$("img").lazyload({	 
       effect : "fadeIn" 
    });	
});	
</script>
<?php endif; ?>
<script type="text/javascript">
function onBridgeReady(){
   WeixinJSBridge.call('hideToolbar');
}

if (typeof WeixinJSBridge == "undefined"){
    if( document.addEventListener ){
        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    }else if (document.attachEvent){
        document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }
}else{
    onBridgeReady();
}
</script>
