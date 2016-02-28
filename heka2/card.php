
<?php
header("Content-Type:text/html; charset=utf-8;");
/* 
 
名称：手机电子名片免费在线生成系统（PHP版）
演示站：www.law-tv.cn/card
功能简介：
电子名片不光具有纸名片的功能，并且它无须携带名片，就可以远距离传送给在不同地点的朋友或客户。电子名片和二维码都包含了名片姓名和电话等信息，手机扫二维码后，就可以自动将信息保存到手机通讯录，不需要手工录入。拨打电话和发送短信也可以直接点击名片，同样快捷方便。

当代社会是信息爆炸的社会，人们要求名片存储更多信息。电子名片可以把大量信息、图片、音频、视频和文件等集承到一张电子名片里，丰富了名片的内容，也带给您低碳、高效、便捷的生活体验。

微信等转发有显示头像和联系方式等功能。
作者：TTT
QQ：294955933
免费绿色源码

if ("$_POST[passwd]"!="123")
{
echo "密码错误！";
exit;
}
*/
error_reporting(E_ALL || ~E_NOTICE);
include "function.php";
include "phpqrcode/phpqrcode.php";

foreach ($_POST as &$val) {
    $val = htmlspecialchars($val);
}

//显示接收参数
//print_r ($_POST);
//print_r ($_FILES);

//获取时间戳
date_default_timezone_set('asia/shanghai');
$shijian=intval(time());

//url参数赋值给变量
$name=$_POST["name"];
$org=$_POST["org"];


//图片属性数组 赋值给数组


//自定义变量
$filedir="upload/";
$filedir_all="http://".$_SERVER ['HTTP_HOST']."/card/upload/";
$myhost=$_SERVER ['HTTP_HOST'];

//检测目录，生成。
mk_dir("upload/"); 
mk_dir("upload/vcf/"); 


//图片函数生成图片，返回文件名.文件类型

$bg_pic=wenjian($bg,"bg",$shijian);

//vcrd内容
$url="BEGIN:VCARD
VERSION:3.0
FN:$name
NICKNAME:$nickname
ORG:$org
TITLE:$title
TEL;WORK;VOICE:$tel_work
TEL;TYPE=CELL:$tel_phone
EMAIL:$email
END:VCARD";

//生成vcrd二维码图片
$errorCorrectionLevel = 'L';
$matrixPointSize = 4;
$erweima_pic="$filedir"."QR_Code/"."$shijian".".png";
QRcode::png($url,"$erweima_pic",$errorCorrectionLevel, $matrixPointSize);

//生成vcf文件
$filedir_vcf="upload/vcf/";
$filedir_vcf1="vcf/";
$vcf_filename="$filedir_vcf"."$shijian".".vcf";
$vcf_filename1="$filedir_vcf1"."$shijian".".vcf";
$url=iconv("UTF-8","GBK",$url);
file_put_contents ("$vcf_filename","$url");

//判断空图片，不显示
if($bg_pic!="图片不符合要求"){
$bg_pic="bg/$bg_pic";
}else{
$bg_pic="bg/0.jpg";
}

if($logo_pic!="图片不符合要求"){
$ttt1="<img src=\"logo/$logo_pic\" width=\"60px\" height=\"60px\">";
}else{
$ttt1="";
}

if($photo_pic!="图片不符合要求"){
$ttt2="<img src=\"photo/$photo_pic\" align=\"left\" width=\"120px\" height=\"160px\">";
$imgUrl="$filedir_all"."photo/"."$photo_pic";
}else{
$ttt2="";
$imgUrl="";
}

$name_tit="$name"."的名片";
$lineLink="$filedir_all"."$shijian".".html";
$descContent="$name"."\\n手机："."$tel_phone"."\\n"."$org"." "."$title";
$shareTitle="【"."$name"."】的名片";

//名片内容
$ttt=<<<str

<html>
<head>
<meta http-equiv=Content-Type content=text/html; charset="utf-8">
<title>$shareTitle</title>
<meta name=description content="$name_tit">
<meta name= content="$descContent">
<style textstyle=text/css>
.div {
      border:1px solid #666666;
      padding:5px;
      margin:5px
      }
</style>
<head>
<body style=background-image:url("$bg_pic");>
<div style="width:1063px; height:657px;background:url(1.gif) no-repeat;color:#1d64a5;font-size:40pt;font-weight:bold;font-family:黑体;">

  <div style="width:399;height:48px; line-height:48px; margin-left:356px; float:left; display:inline; padding-top:401px;">$org</div>
   <div style="width:284;height:48px; line-height:48px; float:left; display:inline; padding-top:401px;">$name</div>
</div>
<hr>
<div class="bshare-custom"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=3&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
<hr>



<script>
var imgUrl = "$imgUrl";
var lineLink = "$lineLink";
var descContent = "$descContent";
var shareTitle = "$shareTitle";
var appid = "";

function shareFriend() {
    WeixinJSBridge.invoke('sendAppMessage',{
                            "appid": appid,
                            "img_url": imgUrl,
                            "img_width": "640",
                            "img_height": "640",
                            "link": lineLink,
                            "desc": descContent,
                            "title": shareTitle
                            }, function(res) {
                            _report('send_msg', res.err_msg);
                            })
}
function shareTimeline() {
    WeixinJSBridge.invoke('shareTimeline',{
                            "img_url": imgUrl,
                            "img_width": "640",
                            "img_height": "640",
                            "link": lineLink,
                            "desc": descContent,
                            "title": shareTitle
                            }, function(res) {
                            _report('timeline', res.err_msg);
                            });
}
function shareWeibo() {
    WeixinJSBridge.invoke('shareWeibo',{
                            "content": descContent,
                            "url": lineLink,
                            }, function(res) {
                            _report('weibo', res.err_msg);
                            });
}
// 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {

        // 发送给好友
        WeixinJSBridge.on('menu:share:appmessage', function(argv){
            shareFriend();
            });

        // 分享到朋友圈
        WeixinJSBridge.on('menu:share:timeline', function(argv){
            shareTimeline();
            });

        // 分享到微博
        WeixinJSBridge.on('menu:share:weibo', function(argv){
            shareWeibo();
            });
        }, false);
</script>

</body>
</html>
str;
$creatfile="$filedir"."$shijian".".html";
$creatfile_long ="$filedir_all"."$shijian".".html";
file_put_contents ("$creatfile","$ttt");

echo "<br><br><br>电子贺卡已制作完成:<br>电子贺卡地址是：'$creatfile_long'。请<a href='$creatfile' target=_blank style=color:red;>点击查看</a><br>";

?>