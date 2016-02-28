<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8" />
<title>用户中心</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/css/feather.css" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,common.js,user.js')); ?>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/j171.js"></script>
</head>
<body>
<div class="user">
	<div class="uinfo">
		 <?php if ($this->_var['info']['head_url'] != ''): ?><img src="<?php echo $this->_var['info']['head_url']; ?>"><?php else: ?><img src="<?php echo $this->_var['ectouch_themes']; ?>/images/get_avatar.png"><?php endif; ?> 
		<div class="info">
			<h5><?php if ($this->_var['info']['nick_name']): ?><?php echo $this->_var['info']['nick_name']; ?><?php else: ?><?php echo $this->_var['info']['user_name']; ?><?php endif; ?></h5>
			<p>关注时间：<?php if ($this->_var['info']['is_subscribe']): ?><?php echo $this->_var['info']['subscribe_time']; ?><?php else: ?>未关注<?php endif; ?></p>
			<p>推荐人：<?php echo $this->_var['info']['parent_user']; ?></p>
		</div>
	</div>
	<div class="total">
		<table>
			<tbody>
				<tr>
					<th>￥余额：</th>
					<td><?php echo $this->_var['info']['surplus']; ?></td>
					<th>积分：</th>
					<td><?php echo $this->_var['info']['integral']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="item u_f first">
		<h3><a href="javascript:link_to('distribute.php')"><?php echo $this->_var['wxconf']['distribute_keywords']; ?><span></span></a></h3>
	</div>
	<div class="item u_u">
		<h3><a href="javascript:link_to('user.php?act=profile')">用户信息<span></span></a></h3>
	</div>
	<div class="item u_o">
		<h3><a href="javascript:link_to('user.php?act=order_list')">我的订单<span></span></a></h3>
	</div>
	<div class="item u_a">
		<h3><a href="javascript:link_to('user.php?act=address_list')">收货地址<span></span></a></h3>
	</div>
	<div class="item u_p">
		<h3><a href="javascript:link_to('user.php?act=collection_list')">我的收藏<span></span></a></h3>
	</div>
	<div class="item u_b">
		<h3><a href="javascript:link_to('user.php?act=message_list')">我的留言<span></span></a></h3>
	</div>

</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/link_to.lbi'); ?>
</body>
</html>
