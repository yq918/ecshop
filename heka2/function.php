<?php
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
*/ 
function wenjian($photo,$nomb,$shijian){
//限制文件类型
$allowedExts = array("gif", "jpeg", "jpg", "png");
//拆分文件，进数组
$temp = explode(".", $photo["name"]);
//定位数组结尾
$extension = end($temp);
//判断文件类型，文件大小，查找数组
if ((($photo["type"] == "image/gif")
|| ($photo["type"] == "image/jpeg")
|| ($photo["type"] == "image/pjpeg")
|| ($photo["type"] == "image/png"))
&&($photo["size"] < 6000000) 
&& in_array($extension,$allowedExts)
)
  {
  if ($photo["error"] > 0){
    return "错误，返回代码: " . $photo["error"];
    }else{
    //return "图片名: " . "$photo[name]" . "<br>";
    //return "图片类型: " . "$photo[type]" . "<br>";
    //return "图片大小: " . "($photo[size] / 1024)" . " kB<br>";
    //return "图片路径: " . "$photo[tmp_name]" . "<br>";
    $file="$shijian"."."."$extension";
    $url= "./upload/".$nomb."/".$file;
    mk_dir("upload/$nomb/");
    if (file_exists("$url")){
      return "$file";
      }else{
      move_uploaded_file($photo["tmp_name"],"$url");
      }
    //return "Stored in: " . "$url" . "<br>".'<img src="'.$url.'">';
    return "$file";
    }
   }else{
  return "图片不符合要求";
  }
}

function mk_dir($dir,$mode = 0755) 
{if (is_dir($dir) || @mkdir($dir,$mode)) return true; 
if (!mk_dir(dirname($dir),$mode)) return false; 
return @mkdir($dir,$mode);
} 

?>
