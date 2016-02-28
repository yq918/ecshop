<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/images/touch-icon.png" rel="apple-touch-icon-precomposed" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/ectouch.css" rel="stylesheet" type="text/css" />
</head>

<body>
<header id="header" >
  <?php if ($this->_var['catid'] != 0): ?>
  <div class="header_l"> <a class="ico_10" href="javascript:history.go(-1)"> 返回 </a> </div>
  <?php endif; ?>
  <h1> <?php echo $this->_var['article']['title']; ?> </h1>
  <div class="header_r"> <a class="ico_15" href="ectouch.php?act=share&content=<?php echo $this->_var['article']['title']; ?>"> 分享 </a> </div>
</header>
<div class="blank3"></div>
<section class="wrap">
  <div class="art_content radius10">
    <h2><span><?php echo $this->_var['article']['title']; ?></span> <?php echo $this->_var['article']['add_time']; ?></h2>
    <div class="art_content_show">
      <p> <?php echo $this->_var['article']['content']; ?> </p>
    </div>
  </div>
</section>
<?php echo $this->fetch('library/page_footer_art.lbi'); ?>
</body>
</html>
