<?php if ($this->_var['full_page']): ?>
<!-- $Id: wxch_users_list.html 2013-12-1 Z djks $ -->
<?php echo $this->fetch('wxch_pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../data/static/js/utils.js')); ?>
<script type="text/javascript" src="js/listtable.js"></script>
<div class="form-div">
    <form action="javascript:searchUser()" name="searchForm">
        <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
        &nbsp;<?php echo $this->_var['lang']['label_rank_name']; ?> <select name="user_type"><option value="nickname" selected="selected">昵称</option><option value="province">省份</option><option value="city">城市</option></select>
        &nbsp;<?php echo $this->_var['lang']['label_user_name']; ?> &nbsp;<input type="text" name="keyword" /> <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" />
    </form>
</div>
<style>
    .nickname{padding-left: 5px;}
</style>
<form method="POST" action="" name="listForm" onsubmit="return confirm_bath()">

    <!-- start users list -->
    <div class="list-div" id="listDiv">
        <?php endif; ?>
        <!--用户列表部分-->
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>
                    <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox">
                    <a href="javascript:listTable.sort('user_id'); ">编号</a>
                </th>
                <th>昵称</th>
                <th>会员名称</th>
                <th>绑定会员</th>
                <th>性别</th>
                <th>省份</th>
                <th>城市</th>
                <th>关注时间</th>
                <th>操作</th>
            <tr>
                <?php $_from = $this->_var['user_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user');if (count($_from)):
    foreach ($_from AS $this->_var['user']):
?>
            <tr>
                <td align="center"><input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['user']['uid']; ?>" notice="<?php if ($this->_var['user']['user_money'] != 0): ?>1<?php else: ?>0<?php endif; ?>"/><?php echo $this->_var['user']['uid']; ?></td>
                <td align="center">
                    <?php if ($this->_var['user']['headimgurl']): ?><img src="<?php echo $this->_var['user']['headimgurl']; ?>" title="<?php echo $this->_var['user']['nickname']; ?>" width="46" /><span class="nickname"><?php echo $this->_var['user']['nickname']; ?></span><?php else: ?><?php echo $this->_var['user']['nickname']; ?> <?php endif; ?>
                </td>
                <td align="center"><?php echo $this->_var['user']['ec_user_name']; ?></td>
                <td align="center"><?php echo $this->_var['user']['user_name']; ?></td>
                <td align="center"><?php echo $this->_var['user']['sex']; ?></td>
                <td align="center"><?php echo $this->_var['user']['province']; ?></td>
                <td align="center"><?php echo $this->_var['user']['city']; ?></td>
                <td align="center"><?php echo $this->_var['user']['subscribe_time']; ?></td>
                <td align="center">
                    <a href="wxch_users.php?act=view&uid=<?php echo $this->_var['user']['uid']; ?>" ><img src="images/icon_view.gif" border="0" height="16" width="16" /></a>
                    <a href="wxch_users.php?act=send&uid=<?php echo $this->_var['user']['uid']; ?>" ><img src="images/icon_title.gif" border="0" height="16" width="16" /></a>
					 <a href="javascript:confirm_redirect('是否删除该粉丝', 'wxch_users.php?act=remove&id=<?php echo $this->_var['user']['uid']; ?>')" title="移除"><img src="images/icon_drop.gif" border="0" height="16" width="16" /></a>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <tr>
                <td align="right" nowrap="true" colspan="8">
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
       </span>
                    </div>
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
        listTable.filter['type'] = document.forms['searchForm'].elements['user_type'].value;
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


<?php echo $this->fetch('wxch_pagefooter.htm'); ?>
<?php endif; ?>