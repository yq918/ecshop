<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="keywords" content="<?php echo $this->_var['page_title']; ?>" />
<meta name="description" content="<?php echo $this->_var['page_title']; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/css/promote.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/css/foot.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/jquery.min.js"></script>
</head>
<body>
<div class="index">
  <div class="header"><a href="<?php if ($this->_var['article']['link'] != ''): ?><?php echo $this->_var['article']['link']; ?>#<?php else: ?><?php endif; ?>"><?php echo $this->_var['article']['content']; ?></a></div>
</div>
<?php if ($this->_var['pid']): ?>
<?php echo $this->fetch('library/page_gz.lbi'); ?>
<?php else: ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php endif; ?>
<script src="<?php echo $this->_var['ectouch_themes']; ?>/js/lazyload.js"></script>
<script type="text/javascript">
$(function(){
//延迟加载图片
	$("img").lazyload({	 
       effect : "fadeIn" 
    });	
});	
</script>
</body>
</html>