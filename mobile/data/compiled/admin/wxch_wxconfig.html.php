<!-- $Id: wxch_config.htm 14216 2013-10-13 14:27:21Z djks $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['wxch_lang']['cp_home']; ?><?php if ($this->_var['wxch_lang']['ur_here']): ?> - <?php echo $this->_var['wxch_lang']['ur_here']; ?> <?php endif; ?></title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'../data/static/js/transport.js,./js/common.js')); ?>
<script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
<?php $_from = $this->_var['lang']['js_languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
//-->
</script>
</head>
<body>

<h1>
<?php if ($this->_var['action_link']): ?>
<span class="action-span"><a href="<?php echo $this->_var['action_link']['href']; ?>"><?php echo $this->_var['action_link']['text']; ?></a></span>
<?php endif; ?>
<?php if ($this->_var['action_link2']): ?>
<span class="action-span"><a href="<?php echo $this->_var['action_link2']['href']; ?>"><?php echo $this->_var['action_link2']['text']; ?></a>&nbsp;&nbsp;</span>
<?php endif; ?>
<span class="action-span1"><a href="index.php?act=main"><?php echo $this->_var['wxch_lang']['cp_home']; ?></a> </span><span id="search_id" class="action-span1"> -  <?php echo $this->_var['wxch_lang']['ur_here']; ?></span>
<div style="clear:both"></div>
</h1>
<div class="main-div">
  <form name="theForm" method="post" action="wxch-ent.php?act=wxconfig" >
  <table width="100%" >
  <tr>
    <td class="label">Token:</td>
    <td><input type="text" name="token" size="20" value="<?php echo $this->_var['ret']['token']; ?>"/></td>
  </tr>
  <tr>
    <td class="label">AppId:</td>
    <td><input type="text " name="appid" size="20" value="<?php echo $this->_var['ret']['appid']; ?>"/></td>
  </tr>
 <tr>
    <td class="label">AppSecret:</td>
    <td><input type="text " name="appsecret" size="32" value="<?php echo $this->_var['ret']['appsecret']; ?>"/></td>
  </tr>
  <tr>
    <td class="label">公众号名称:</td>
    <td><input type="text " name="app_name" size="20" value="<?php echo $this->_var['ret']['app_name']; ?>"/> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">用在关注回复时提示“感谢您关注***”</span>
  </td>
  </tr>
  <tr>
    <td class="label">分销商名称:</td>
    <td><input type="text " name="distributor_name" size="20" value="<?php echo $this->_var['ret']['distributor_name']; ?>"/> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">自己定义“分销商”的名称</span>
  </td>
  </tr>
   <tr>
    <td class="label">一级会员名称:</td>
    <td><input type="text " name="one_level_member_name" size="20" value="<?php echo $this->_var['ret']['one_level_member_name']; ?>"/> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">自己定义“一级会员名称”的名称</span>
  </td>
  </tr>
   <tr>
    <td class="label">二级会员名称:</td>
    <td><input type="text " name="two_level_member_name" size="20" value="<?php echo $this->_var['ret']['two_level_member_name']; ?>"/> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">自己定义“二级会员名称”的名称</span>
  </td>
  </tr>
   <tr>
    <td class="label">三级会员名称:</td>
    <td><input type="text " name="three_level_member_name" size="20" value="<?php echo $this->_var['ret']['three_level_member_name']; ?>"/> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">自己定义“三级会员名称”的名称</span>
  </td>
  </tr>
  <tr>
    <td class="label">初始关注人数:</td>
    <td><input  type="number" name="init_subscribe_user_counts" size="20" value="<?php echo empty($this->_var['ret']['init_subscribe_user_counts']) ? '0' : $this->_var['ret']['init_subscribe_user_counts']; ?>" /> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">关注回复时的初始人数</span>
</td>
  </tr>
  <tr>
    <td class="label">成为分销商的消费额度:</td>
    <td><input type="text " name="be_distributor" size="20" value="<?php echo empty($this->_var['ret']['be_distributor']) ? '100' : $this->_var['ret']['be_distributor']; ?>"/> 元<br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">输入成为分销商的消费价格，以元为单位，只需要输入数值，默认为100元</span>
</td>
  </tr>
  <tr>
    <td class="label">一级会员提成:</td>
    <td><input type="text " name="one_level_deduct" size="20" value="<?php echo empty($this->_var['ret']['one_level_deduct']) ? '0' : $this->_var['ret']['one_level_deduct']; ?>"/> %<br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">一级会员提成，单位为(%)，仅需要输入数值即可，0为不返佣</span>
</td>
  </tr>
   <tr>
    <td class="label">二级会员提成:</td>
    <td><input type="text " name="two_level_deduct" size="20" value="<?php echo empty($this->_var['ret']['two_level_deduct']) ? '0' : $this->_var['ret']['two_level_deduct']; ?>"/> %<br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">二级会员提成，单位为(%)，仅需要输入数值即可，0为不返佣</span>
</td>
  </tr>
   <tr>
    <td class="label">三级会员提成:</td>
    <td><input type="text " name="three_level_deduct" size="20" value="<?php echo empty($this->_var['ret']['three_level_deduct']) ? '0' : $this->_var['ret']['three_level_deduct']; ?>"/> %<br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">三级会员提成，单位为(%)，仅需要输入数值即可，0为不返佣</span>
</td>
  </tr>
  <tr>
    <td class="label">自定义关注回复:</td>
    <td><?php if ($this->_var['ret']['is_userdefine_subscribe'] == 1): ?><input type="radio" name="is_userdefine_subscribe" value="1" checked="checked"> 开启&nbsp; <input type="radio" name="is_userdefine_subscribe" value="0"> 关闭
     <?php else: ?>
       <input type="radio" name="is_userdefine_subscribe" value="1" > 开启&nbsp; <input type="radio" name="is_userdefine_subscribe" value="0" checked="checked"> 关闭
     <?php endif; ?>
    <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">系统默认回复关注者“您是多少位关注者，由谁推荐”，可以开启自定义回复</span>
</td>
  </tr>
  <tr>
    <td class="label">是否自动分销:</td>
    <td><?php if ($this->_var['ret']['is_auto_distribute'] == 1): ?><input type="radio" name="is_auto_distribute" value="1" checked="checked"> 开启&nbsp; <input type="radio" name="is_auto_distribute" value="0"> 关闭
     <?php else: ?>
       <input type="radio" name="is_auto_distribute" value="1" > 开启&nbsp; <input type="radio" name="is_auto_distribute" value="0" checked="checked"> 关闭
     <?php endif; ?>
    <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">自动分销是用户付款后系统自动分销返佣，否则人工后台审核分销返佣</span>
</td>
  </tr>
  <tr>
    <td class="label">自己关注成为分销商:</td>
    <td><?php if ($this->_var['ret']['is_distributor_limit'] == 1): ?><input type="radio" name="is_distributor_limit" value="1" checked="checked"> 允许&nbsp; <input type="radio" name="is_distributor_limit" value="0"> 不允许
     <?php else: ?>
       <input type="radio" name="is_distributor_limit" value="1" > 允许&nbsp; <input type="radio" name="is_distributor_limit" value="0" checked="checked"> 不允许
     <?php endif; ?>
    <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">自己关注公众号的会员，是否允许成为分销商</span>
</td>
  </tr>
  <tr>
    <td class="label">不是分销商访问'我的分销':</td>
    <td><?php if ($this->_var['ret']['is_my_distribute_view'] == 1): ?><input type="radio" name="is_my_distribute_view" value="1" checked="checked"> 允许&nbsp; <input type="radio" name="is_my_distribute_view" value="0"> 不允许
     <?php else: ?>
       <input type="radio" name="is_my_distribute_view" value="1" > 允许&nbsp; <input type="radio" name="is_my_distribute_view" value="0" checked="checked"> 不允许
     <?php endif; ?>
</td>
  </tr>
  <tr>
    <td class="label">没有关注访问'商城子页':</td>
    <td><?php if ($this->_var['ret']['is_my_subscribe_view'] == 1): ?><input type="radio" name="is_my_subscribe_view" value="1" checked="checked"> 允许&nbsp; <input type="radio" name="is_my_subscribe_view" value="0"> 不允许
     <?php else: ?>
       <input type="radio" name="is_my_subscribe_view" value="1" > 允许&nbsp; <input type="radio" name="is_my_subscribe_view" value="0" checked="checked"> 不允许
     <?php endif; ?>
    <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">没有关注公众号的情况下，是否允许访问除首页之外的页面</span>
</td>
  </tr>
  <tr>
    <td class="label">首页样式:</td>
    <td><?php if ($this->_var['ret']['home_page_style'] == 1): ?><input type="radio" name="home_page_style" value="1" checked="checked"> 商城样式&nbsp; <input type="radio" name="home_page_style" value="2"> 单商品宣传页面（类似小C）
     <?php else: ?>
     <input type="radio" name="home_page_style" value="1" > 商城样式&nbsp; <input type="radio" name="home_page_style" value="2" checked="checked"> 单商品宣传页面（类似小C）
     <?php endif; ?>
</td>
  <tr>
    <td class="label">提现底限:</td>
    <td><input  type="number" name="withdraw_lower_limit" size="20" value="<?php echo empty($this->_var['ret']['withdraw_lower_limit']) ? '100' : $this->_var['ret']['withdraw_lower_limit']; ?>" /> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">默认为100元</span>
</td>
  </tr>
  <tr>
    <td class="label">充值底限:</td>
    <td><input  type="number" name="deposit_lower_limit" size="20" value="<?php echo empty($this->_var['ret']['deposit_lower_limit']) ? '1' : $this->_var['ret']['deposit_lower_limit']; ?>" /> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">默认为1元</span>
</td>
  </tr>
  <tr>
    <td class="label">"分销"关键词自定义:</td>
    <td><input type="text" name="distribute_keywords" size="50" value="<?php echo $this->_var['ret']['distribute_keywords']; ?>"/> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">此设置可以将前台的“分销”文字，改成其它</span>
</td>
  </tr>
  <tr>
    <td class="label">"提现"页面提示信息:</td>
    <td><input type="text" name="withdraw_alert_msg" size="50" value="<?php echo $this->_var['ret']['withdraw_alert_msg']; ?>"/> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">提现页面显示的提示信息</span>
</td>
  </tr>
  <tr>
    <td class="label">关注引导页url:</td>
    <td><input type="text" name="subscribe_guide_page" size="50" value="<?php echo $this->_var['ret']['subscribe_guide_page']; ?>"/> <br />
          <span class="notice-span" style="display:block"  id="noticeshop_title">引导微信用户关注公众号的网页地址</span>
</td>
  </tr>
  
  <tr>
    <td colspan="2" align="center">
      <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
      <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button" />
    </td>
  </tr>
</table>
  </form>

</div>

<?php echo $this->fetch('wxch_pagefooter.htm'); ?>