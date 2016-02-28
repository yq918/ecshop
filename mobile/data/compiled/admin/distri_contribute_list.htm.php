<?php if ($this->_var['full_page']): ?>
<!-- $Id: users_list.htm 17053 2010-03-15 06:50:26Z sxc_shop $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>

<div class="form-div">
  <form action="javascript:searchUser()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    &nbsp;
    &nbsp;会员号 &nbsp;<input type="text" name="keyword" />
    &nbsp;昵称 &nbsp;<input type="text" name="nick_name" /> <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" />
  </form>
</div>

<form method="POST" action="" name="listForm" onsubmit="return confirm_bath()">

<!-- start users list -->
<div class="list-div" id="listDiv">
<?php endif; ?>
<!--用户列表部分-->
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>
      <a href="javascript:listTable.sort('user_id'); "><?php echo $this->_var['lang']['record_id']; ?></a><?php echo $this->_var['sort_user_id']; ?>
    </th>
    <th>会员头像 昵称</th>
    <th width="17%">一层上家</th>
    <th width="17%">二层上家</th>
    <th width="17%">三层上家</th>
    <th width="8%">一层贡献值</th>
    <th width="8%">二层贡献值</th>
    <th width="8%">三层贡献值</th>
  <tr>
  <?php $_from = $this->_var['user_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user');if (count($_from)):
    foreach ($_from AS $this->_var['user']):
?>
  <tr>
    <td><?php echo $this->_var['user']['user_id']; ?></td>
    <td><?php if (! empty ( $this->_var['user']['head_url'] )): ?><img src="<?php echo $this->_var['user']['head_url']; ?>" width="55" height="55" style="border-radius:5px;"><?php endif; ?>&nbsp; <?php if (! empty ( $this->_var['user']['nick_name'] )): ?><?php echo $this->_var['user']['nick_name']; ?><?php else: ?><?php echo $this->_var['user']['user_name']; ?><?php endif; ?></td>
    <td><?php if ($this->_var['user']['affiliate_id'] > 0): ?><img src="<?php echo $this->_var['user']['first_head_url']; ?>" width="55" height="55" style="border-radius:5px;"><?php endif; ?>&nbsp; <?php if (! empty ( $this->_var['user']['first_nick_name'] )): ?><?php echo $this->_var['user']['first_nick_name']; ?><?php else: ?>无<?php endif; ?></td>
    <td><?php if ($this->_var['user']['second_affiliate_id'] > 0): ?><img src="<?php echo $this->_var['user']['second_head_url']; ?>" width="55" height="55" style="border-radius:5px;"><?php endif; ?>&nbsp; <?php if (! empty ( $this->_var['user']['second_nick_name'] )): ?><?php echo $this->_var['user']['second_nick_name']; ?><?php else: ?>无<?php endif; ?></td>
    <td><?php if ($this->_var['user']['third_affiliate_id'] > 0): ?><img src="<?php echo $this->_var['user']['third_head_url']; ?>" width="55" height="55" style="border-radius:5px;"><?php endif; ?>&nbsp; <?php if (! empty ( $this->_var['user']['third_nick_name'] )): ?><?php echo $this->_var['user']['third_nick_name']; ?><?php else: ?>无<?php endif; ?></td>
    <td align="right">￥<?php echo $this->_var['user']['first_contribute_money']; ?></td>
    <td align="right">￥<?php echo $this->_var['user']['second_contribute_money']; ?></td>
    <td align="right">￥<?php echo $this->_var['user']['third_contribute_money']; ?></td>
  </tr>
  <?php endforeach; else: ?>
  <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
  <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <tr>
      <td colspan="2">
       </td>
      <td align="right" nowrap="true" colspan="8">
      <?php echo $this->fetch('page.htm'); ?>
      </td>
  </tr>
</table>

<?php if ($this->_var['full_page']): ?>
</div>
<!-- end users list -->
</form>
<script type="text/javascript" language="JavaScript">
<!--
listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


onload = function()
{
    document.forms['searchForm'].elements['keyword'].focus();
    // 开始检查订单
    startCheckOrder();
}

/**
 * 搜索用户
 */
function searchUser()
{
    listTable.filter['keywords'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
	listTable.filter['nick_name'] = Utils.trim(document.forms['searchForm'].elements['nick_name'].value);
    listTable.filter['page'] = 1;
    listTable.loadList();
}

function confirm_bath()
{
  userItems = document.getElementsByName('checkboxes[]');

  cfm = '<?php echo $this->_var['lang']['list_remove_confirm']; ?>';

  for (i=0; userItems[i]; i++)
  {
    if (userItems[i].checked && userItems[i].notice == 1)
    {
      cfm = '<?php echo $this->_var['lang']['list_still_accounts']; ?>' + '<?php echo $this->_var['lang']['list_remove_confirm']; ?>';
      break;
    }
  }

  return confirm(cfm);
}
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>