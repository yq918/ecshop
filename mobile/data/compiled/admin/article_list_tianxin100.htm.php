<!-- $Id: article_list.htm 16783 2009-11-09 09:59:06Z liuhui $ -->



<?php if ($this->_var['full_page']): ?>

<?php echo $this->fetch('pageheader.htm'); ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'../data/static/js/utils.js,./js/listtable.js')); ?>



<div class="form-div">

<font style="color:red">

教程提醒：添加完成后在分销设置里面把首页样式切换成单商品宣传页面即可！

</font>

</div>

<form method="POST" action="article.php?act=batch_remove" name="listForm">

<!-- start cat list -->

<div class="list-div" id="listDiv">

<?php endif; ?>



<table cellspacing='1' cellpadding='3' id='list-table'>

  <tr>

    <th><input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox">

      <a href="javascript:listTable.sort('article_id'); "><?php echo $this->_var['lang']['article_id']; ?></a><?php echo $this->_var['sort_article_id']; ?></th>

    <th><a href="javascript:listTable.sort('title'); ">单品页面标题</a><?php echo $this->_var['sort_title']; ?></th>



    <th><a href="javascript:listTable.sort('is_open'); ">是否可用</a><?php echo $this->_var['sort_is_open']; ?></th>

    <th><a href="javascript:listTable.sort('add_time'); "><?php echo $this->_var['lang']['add_time']; ?></a><?php echo $this->_var['sort_add_time']; ?></th>

    <th><?php echo $this->_var['lang']['handler']; ?></th>

  </tr>

  <?php $_from = $this->_var['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>

  <tr>

    <td><span><input name="checkboxes[]" type="checkbox" value="<?php echo $this->_var['list']['article_id']; ?>" <?php if ($this->_var['list']['cat_id'] <= 0): ?>disabled="true"<?php endif; ?>/><?php echo $this->_var['list']['article_id']; ?></span></td>

    <td class="first-cell">

    <span onclick="javascript:listTable.edit(this, 'edit_title', <?php echo $this->_var['list']['article_id']; ?>)"><?php echo htmlspecialchars($this->_var['list']['title']); ?></span></td>

    <td align="center"><?php if ($this->_var['list']['cat_id'] > 0): ?><span>

    <img src="images/<?php if ($this->_var['list']['is_open'] == 1): ?>yes<?php else: ?>no<?php endif; ?>.gif" onclick="listTable.toggle(this, 'toggle_show', <?php echo $this->_var['list']['article_id']; ?>)" /></span><?php else: ?><img src="images/yes.gif" alt="yes" /><?php endif; ?></td>

    <td align="center"><span><?php echo $this->_var['list']['date']; ?></span></td>

    <td align="center" nowrap="true"><span>

      <a href="../tuiguang.php?id=<?php echo $this->_var['list']['article_id']; ?>" target="_blank" title="<?php echo $this->_var['lang']['view']; ?>"><img src="images/icon_view.gif" border="0" height="16" width="16" /></a>&nbsp;

      <a href="article_tianxin100.php?act=edit&id=<?php echo $this->_var['list']['article_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>"><img src="images/icon_edit.gif" border="0" height="16" width="16" /></a>&nbsp;

     <!-- <?php if ($this->_var['list']['cat_id'] > 0): ?> --><a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['article_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>"><img src="images/icon_drop.gif" border="0" height="16" width="16"></a><!-- <?php endif; ?> --></span>

    </td>

   </tr>

   <?php endforeach; else: ?>

    <tr><td class="no-records" colspan="10">没有任何单品页面</td></tr>

  <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>

  <tr>&nbsp;

    <td align="right" nowrap="true" colspan="8"><?php echo $this->fetch('page.htm'); ?></td>

  </tr>

</table>



<?php if ($this->_var['full_page']): ?>

</div>



<div>

  <input type="hidden" name="act" value="batch" />

  <select name="type" id="selAction" onchange="changeAction()">

    <option value=""><?php echo $this->_var['lang']['select_please']; ?></option>

    <option value="button_remove"><?php echo $this->_var['lang']['button_remove']; ?></option>

    <option value="button_hide"><?php echo $this->_var['lang']['button_hide']; ?></option>

    <option value="button_show"><?php echo $this->_var['lang']['button_show']; ?></option>

    <option value="move_to"><?php echo $this->_var['lang']['move_to']; ?></option>

  </select>

  <select name="target_cat" style="display:none">

    <option value="0"><?php echo $this->_var['lang']['select_please']; ?></option>

    <?php echo $this->_var['cat_select']; ?>

  </select>



  <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" id="btnSubmit" name="btnSubmit" class="button" disabled="true" />

</div>

</form>

<!-- end cat list -->

<script type="text/javascript" language="JavaScript">

  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;

  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;



  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>

  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';

  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  



  onload = function()

  {

    // 开始检查订单

    startCheckOrder();

  }

	/**

   * @param: bool ext 其他条件：用于转移分类

   */

  function confirmSubmit(frm, ext)

  {

      if (frm.elements['type'].value == 'button_remove')

      {

          return confirm(drop_confirm);

      }

      else if (frm.elements['type'].value == 'not_on_sale')

      {

          return confirm(batch_no_on_sale);

      }

      else if (frm.elements['type'].value == 'move_to')

      {

          ext = (ext == undefined) ? true : ext;

          return ext && frm.elements['target_cat'].value != 0;

      }

      else if (frm.elements['type'].value == '')

      {

          return false;

      }

      else

      {

          return true;

      }

  }

	 function changeAction()

  {

		

      var frm = document.forms['listForm'];



      // 切换分类列表的显示

      frm.elements['target_cat'].style.display = frm.elements['type'].value == 'move_to' ? '' : 'none';



      if (!document.getElementById('btnSubmit').disabled &&

          confirmSubmit(frm, false))

      {

          frm.submit();

      }

  }



 /* 搜索文章 */

 function searchArticle()

 {

    listTable.filter.keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);

    listTable.filter.cat_id = parseInt(document.forms['searchForm'].elements['cat_id'].value);

    listTable.filter.page = 1;

    listTable.loadList();

 }



 

</script>

<?php echo $this->fetch('pagefooter.htm'); ?>

<?php endif; ?>

