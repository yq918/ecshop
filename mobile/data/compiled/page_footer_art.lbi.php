<link rel="stylesheet" href="<?php echo $this->_var['ectouch_themes']; ?>/css/foot.css">
<div class="footer clearfix">
	<p>公司名称：<?php echo $this->_var['shop_address']; ?></p>
	<p>联系电话：<?php echo $this->_var['service_phone']; ?></p>
	<p>Copyright <?php echo $this->_var['copyright']; ?> All Rights Reserved</p>
</div>
<script src="<?php echo $this->_var['ectouch_themes']; ?>/js/lazyload.js"></script>
<script type="text/javascript">
$(function(){
//延迟加载图片
	$("img").lazyload({	 
       effect : "fadeIn" 
    }); 
});	
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