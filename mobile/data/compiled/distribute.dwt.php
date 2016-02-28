<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0" name="viewport" /> 
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<title><?php echo $this->_var['wxconf']['distribute_keywords']; ?></title>
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/css/feather.css" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/j171.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/qo.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/js.js"></script>

<script type="text/javascript">
	$(function() {
		$('.distribution').find('.item h3').click(function(){
			if($(this).hasClass('show')){
				$(this).removeClass('show');
  				$(this).next().animate({'height':'0px'}, 'fast');
			} else {
				$(this).addClass('show');
				$(this).next().animate({'height':$(this).next().find('li').size()*41+'px'}, 'fast');
			}
		});
	});
</script>

</head>
<body> 
<?php if ($this->_var['action'] == 'default'): ?>
<div class="distribution">
	<div class="item uinfo" <?php if ($this->_var['info']['is_distributor'] == 0): ?>style="height:120px;"<?php endif; ?>>
		 <?php if ($this->_var['info']['head_url'] != ''): ?><img src="<?php echo $this->_var['info']['head_url']; ?>"><?php else: ?><img src="<?php echo $this->_var['ectouch_themes']; ?>/images/get_avatar.png" style="border-radius:40px"><?php endif; ?> 
		<div class="info">
			<h5><?php if ($this->_var['info']['nick_name']): ?><?php echo $this->_var['info']['nick_name']; ?><?php else: ?><?php echo $this->_var['info']['user_name']; ?><?php endif; ?>[<?php if ($this->_var['distri']['all_affiliate_persons'] >= $this->_var['plus_supper_price_num']): ?>高级会员<?php elseif ($this->_var['distri']['all_affiliate_persons'] >= $this->_var['plus_middle_price_num']): ?> 中级会员<?php else: ?> 普通会员<?php endif; ?>]</h5>
			<p>关注时间：<?php if ($this->_var['info']['is_subscribe']): ?><?php echo $this->_var['info']['subscribe_time']; ?><?php else: ?>未关注<?php endif; ?></p>
			<p>推荐人：<?php echo $this->_var['info']['parent_user']; ?></p>
            <?php if ($this->_var['info']['is_distributor'] == 0): ?>
            <p style='color:red'><?php echo $this->_var['wxconf']['distributor_name']; ?> ( 否 ) <a href="javascript:link_to('index.php')" style="color:blue">立即购买成为<?php echo $this->_var['wxconf']['distributor_name']; ?></a></p>
            <?php else: ?>
            <p style='color:red'>恭喜您，您已经成为分销商！</p>
            <?php endif; ?>
		</div>
	</div>
	<div class="item total">
		<table>
			<tbody>
				<tr>
					<th>累计销售：</th>
					<td>￥<?php echo $this->_var['info']['sales_all']; ?></td>
					<th>累计收入：</th>
					<td>￥<?php echo $this->_var['info']['brokerage_all']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="item">
		<h3>我的会员<em><?php echo $this->_var['distri']['all_affiliate_persons']; ?>人</em></h3>
		<ul>
			<li><a href="javascript:link_to('distribute.php?act=member&level=1')"><p><?php echo $this->_var['wxconf']['one_level_member_name']; ?></p><em><?php echo $this->_var['distri']['first_affiliate_persons']; ?>人</em><span></span></a></li>
			<li><a href="javascript:link_to('distribute.php?act=member&level=2')"><p><?php echo $this->_var['wxconf']['two_level_member_name']; ?></p><em><?php echo $this->_var['distri']['second_affiliate_persons']; ?>人</em><span></span></a></li>
			<li class="last"><a href="javascript:link_to('distribute.php?act=member&level=3')"><p><?php echo $this->_var['wxconf']['three_level_member_name']; ?></p><em><?php echo $this->_var['distri']['third_affiliate_persons']; ?>人</em><span></span></a></li>
		</ul>
	</div>
	<div class="item count">
		<h3>我的推广<em><?php echo $this->_var['distri']['promote_clicks']; ?>人</em></h3>
		<ul>
			<li><a href="#here"><p>点击量</p><em><?php echo $this->_var['distri']['promote_clicks']; ?>人</em><span></span></a></li>
			<li><a href="#here"><p>关注量</p><em><?php echo $this->_var['distri']['promote_subscribe']; ?>人</em><span></span></a></li>
			<li class="last"><a href="#here"><p>成为<?php echo $this->_var['wxconf']['distributor_name']; ?></p><em><?php echo $this->_var['distri']['promote_distributor']; ?>人</em><span></span></a></li>
		</ul>
	</div>
	<div class="item order">
		<h3>我的收入<em>￥<?php echo $this->_var['distri']['real_brokerage']; ?></em></h3>
		<ul>
			<li><a href="#here"><p>未生效(<?php echo $this->_var['wxconf']['distribute_keywords']; ?>)收入</p><em>￥<?php echo $this->_var['distri']['undistri_brokerage_all']; ?></em></a></li>
			<li><a href="#here"><p>已生效(<?php echo $this->_var['wxconf']['distribute_keywords']; ?>)收入</p><em>￥<?php echo $this->_var['distri']['real_brokerage']; ?></em></a></li>
		</ul>
	</div>
	<div class="item apply">
		<h3><a href="#here" onClick="javascript:link_to('user.php?act=account_raply');">申请提现<span></span></a></h3>
	</div>
	<div class="item sqcode" onClick="link_to('distribute.php?act=qr_show')">
		<h3><a href="javascript:link_to('distribute.php?act=qr_show')">推广二维码<span></span></a></h3>
	</div>
</div>
<?php endif; ?>
<?php if ($this->_var['action'] == 'member'): ?>
<header id="header">
  <div class="header_l header_return"> <a class="ico" href="distribute.php"> 返回 </a> </div>
  <h1> <?php echo $this->_var['wxconf']['distributor_name']; ?> <?php if ($this->_var['level'] == 1): ?><?php echo $this->_var['wxconf']['one_level_member_name']; ?><?php elseif ($this->_var['level'] == 2): ?><?php echo $this->_var['wxconf']['two_level_member_name']; ?><?php else: ?><?php echo $this->_var['wxconf']['three_level_member_name']; ?><?php endif; ?><?php echo $this->_var['count']; ?>人 </h1>
</header>
<div class="blank3"></div>
<section class="wrap">
   <div class="content">
    <?php if ($this->_var['mem_list']): ?>
    <?php $_from = $this->_var['mem_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'm');if (count($_from)):
    foreach ($_from AS $this->_var['m']):
?> 
    	<a href="<?php echo $this->_var['m']['url']; ?>">
        	<dl>
            	<dt><?php if ($this->_var['m']['head_url'] != ''): ?><img src="<?php echo $this->_var['m']['head_url']; ?>" border=0><?php else: ?><img src="<?php echo $this->_var['ectouch_themes']; ?>/images/get_avatar.png"  border=0><?php endif; ?> </dt>
                <div>
                  <h3>会员ID：<?php echo $this->_var['m']['user_name']; ?></h3>
                  <h3>昵&nbsp; 称：<?php if ($this->_var['m']['nick_name']): ?><?php echo $this->_var['m']['nick_name']; ?><?php else: ?>暂无<?php endif; ?></h3>
                  <h3>关&nbsp; 注：<?php if ($this->_var['m']['is_subscribe']): ?><?php echo $this->_var['m']['sub_time']; ?><?php else: ?>未关注<?php endif; ?></h3>
                <p>
    </p></div>
            </dl>
        </a>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
    <?php else: ?>
      <div class="no_data">暂无相关数据</div>
    <?php endif; ?> 
  </div>  
  <?php echo $this->fetch('library/pager.lbi'); ?>
  <?php echo $this->fetch('library/pages.lbi'); ?>
</section>
<?php endif; ?> 

<?php if ($this->_var['action'] == 'detail'): ?>
<header id="header">
  <div class="header_l header_return"> <a class="ico" href="distribute.php?act=member&level=<?php echo $this->_var['level']; ?>"> 返回 </a> </div>
  <h1> 会员详情 </h1>
</header>
<div class="distribution">
	<div class="item uinfo">
		 <?php if ($this->_var['info']['head_url'] != ''): ?><img src="<?php echo $this->_var['info']['head_url']; ?>"><?php else: ?><img src="<?php echo $this->_var['ectouch_themes']; ?>/images/get_avatar.png" style="border-radius:40px"><?php endif; ?> 
		<div class="info">
			<h5><?php if ($this->_var['info']['nick_name']): ?><?php echo $this->_var['info']['nick_name']; ?><?php else: ?><?php echo $this->_var['info']['user_name']; ?><?php endif; ?></h5>
			<p>关注时间：<?php if ($this->_var['info']['is_subscribe']): ?><?php echo $this->_var['info']['subscribe_time']; ?><?php else: ?>未关注<?php endif; ?></p>
			<p>推荐人：<?php echo $this->_var['info']['parent_user']; ?></p>
		</div>
	</div>
	<div class="item total">
		<table>
			<tbody>
				<tr>
					<th>累计销售：</th>
					<td>￥<?php echo $this->_var['info']['sales_all']; ?></td>
					<th>累计收入：</th>
					<td>￥<?php echo $this->_var['info']['brokerage_all']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
    <?php $_from = $this->_var['levels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'level');if (count($_from)):
    foreach ($_from AS $this->_var['level']):
?>
	<div class="item">
		<h3><?php echo $this->_var['info']['sex']; ?><?php echo $this->_var['level']['name']; ?><em><?php echo $this->_var['level']['persons']; ?>人</em></h3>
		<ul>
			<li><p>人数</p><em><?php echo $this->_var['level']['persons']; ?>人</em><span></span></li>
			<li class="money"><p>消费金额</p><em>￥<?php echo $this->_var['level']['sales']; ?></em><span></span></li>
            <li class="money"><p>贡献收入</p><em>￥<?php echo $this->_var['level']['brokerage']; ?></em><span></span></li>
		</ul>
	</div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<?php endif; ?>
<?php if ($this->_var['action'] == 'qr_show'): ?>
<header id="header">
  <div class="header_l header_return"> <a class="ico" href="distribute.php"> 返回 </a> </div>
   <h1> 推广方式：长按图片发送或者保存~ </h1>
</header>
<div class="blank3"></div>
<section class="wrap">
   <div class="content">
    <?php if ($this->_var['is_qr']): ?>
    	<img src="<?php echo $this->_var['qr']['qr_url']; ?>" width="100%" height="auto">  
    <?php else: ?>
      <div class="no_data">暂无推广的二维码</div>
    <?php endif; ?> 
  </div>  
</section>
<?php endif; ?> 
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/link_to.lbi'); ?>
</body>
</html>