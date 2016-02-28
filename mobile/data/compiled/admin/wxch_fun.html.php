<!-- $Id: wxch_fun.html 2013-11-16 09:59:06Z djks $ -->
<?php if ($this->_var['full_page']): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['wxch_lang']['cp_home']; ?><?php if ($this->_var['wxch_lang']['ur_here']): ?> - <?php echo $this->_var['wxch_lang']['ur_here']; ?> <?php endif; ?></title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../data/static/js/transport.js"></script><script type="text/javascript" src="./js/common.js"></script>
</head>
<body>

<h1>
<span class="action-span1"><a href="index.php?act=main"><?php echo $this->_var['wxch_lang']['cp_home']; ?></a> </span><span id="search_id" class="action-span1"> - <?php echo $this->_var['wxch_lang']['ur_here']; ?> </span>
<div style="clear:both"></div>
</h1>
<script type="text/javascript" src="../data/static/js/utils.js"></script><script type="text/javascript" src="./js/listtable.js"></script>


<form method="POST" action="wxch_fun.php?act=batch_remove" name="listForm">
<!-- start cat list -->
<div class="list-div" id="listDiv">
<?php endif; ?>
<table cellspacing='1' cellpadding='3' id='list-table' >
  <tr>
    <th><a href="javascript:listTable.sort('title'); ">功能名称</a></th>
    <th><a href="javascript:listTable.sort('cat_id'); ">关键词</a></th>
    <th><a href="javascript:listTable.sort('article_type'); ">变形词</a></th>
    <th><a href="javascript:listTable.sort('is_open'); ">变形数量</a></th>
    <th>操作</th>
  </tr>
   <?php $_from = $this->_var['wxchdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
    <tr>
    <td class="first-cell" align="center">
    <span onclick="javascript:listTable.edit(this, 'edit_title', <?php echo $this->_var['list']['id']; ?>)"><?php echo $this->_var['list']['name']; ?> </span></td>
    <td align="center"><span><?php echo $this->_var['list']['function']; ?></span></td>
    <td align="center"><span><?php echo $this->_var['list']['command']; ?></span></td>
    <td align="center"><?php echo $this->_var['list']['count']; ?></td>
    <td align="center" nowrap="true"><span>
      <a href="wxch_fun.php?act=edit&id=<?php echo $this->_var['list']['id']; ?>" title="编辑"><img src="images/icon_edit.gif" border="0" height="16" width="16" /></a>&nbsp;
     <!--  --></span>
    </td>
   </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     <tr>&nbsp;
    <td align="right" nowrap="true" colspan="8">      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
            <div id="turn-page">
        总计  <span id="totalRecords"><?php echo $this->_var['filter']['record_count']; ?></span>
        个记录分为 <span id="totalPages"><?php echo $this->_var['filter']['page_count']; ?></span>
        页当前第 <span id="pageCurrent"><?php echo $this->_var['filter']['page']; ?></span>
        页，每页 <input type='text' size='3' name="page_size" id='pageSize' value="<?php echo $this->_var['filter']['page_size']; ?>" onkeypress="return listTable.changePageSize(event)" />
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
              <?php echo $this->smarty_create_pages(array('count'=>$this->_var['filter']['page_count'],'page'=>$this->_var['filter']['page'])); ?>
          </select>
      </div>
</td>
  </tr>
</table>

<?php if ($this->_var['full_page']): ?>
</div>
</form>
<!-- end cat list -->
<script type="text/javascript" language="JavaScript">
    listTable.recordCount = <?php echo $this->_var['filter']['record_count']; ?>;
    listTable.pageCount = <?php echo $this->_var['filter']['page_count']; ?>;
    var page_size   = <?php echo $this->_var['filter']['page_size']; ?>;

    listTable.filter.type = 'keyword';
    listTable.filter.pagesize = '<?php echo $this->_var['filter']['page_size']; ?>';
    listTable.filter.record_count = '<?php echo $this->_var['filter']['record_count']; ?>';
    listTable.filter.page = '<?php echo $this->_var['filter']['page']; ?>';
    listTable.filter.page_count = '<?php echo $this->_var['filter']['record_count']; ?>';
    listTable.filter.start = '<?php echo $this->_var['filter']['start']; ?>';
    

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
    listTable.filter.page = 1;
    listTable.loadList();
 }

 
</script>
<?php echo $this->fetch('wxch_pagefooter.htm'); ?>
<?php endif; ?>