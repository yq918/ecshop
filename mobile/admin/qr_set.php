<?php



/*

  / 分销二维码管理

*/

define('IN_ECTOUCH', true);



require(dirname(__FILE__) . '/includes/init.php');

require_once(ROOT_PATH . 'include/cls_distribute.php');

require_once(ROOT_PATH . 'include/cls_image.php');

/* 权限判断 */

admin_priv('qr_set');

$distri = new Distribute();

$wxch_lang['ur_here'] = '分销二维码设置';



/* 设置 */

if($_REQUEST['act'] == 'index'){

	if(!empty($_POST['shop_name']))

	{

		$shop_name               = trim($_POST['shop_name']);

		$headpic_width           = intval($_POST['headpic_width']);

		$headpic_height          = intval($_POST['headpic_height']);

		$headpic_src_x           = intval($_POST['headpic_src_x']);

		$headpic_src_y           = intval($_POST['headpic_src_y']);

		$qr_width                = intval($_POST['qr_width']);

		$qr_height               = intval($_POST['qr_height']);

		$qr_src_x                = intval($_POST['qr_src_x']);

		$qr_src_y                = intval($_POST['qr_src_y']);

		$txt_src_x               = intval($_POST['txt_src_x']);

		$txt_src_y               = intval($_POST['txt_src_y']);

		$font_size               = intval($_POST['font_size']);

        /* 上传背景图片处理 */

        $file_url = '';

        if ((isset($_FILES['file']['error']) && $_FILES['file']['error'] == 0) || (!isset($_FILES['file']['error']) && isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != 'none'))

        {

           // 检查文件格式

           if (!check_file_type($_FILES['file']['tmp_name'], $_FILES['file']['name'], $allow_file_types))

           {

              sys_msg($_LANG['invalid_file']);

           }

           

           // 复制文件

           $res = upload_article_file($_FILES['file']);

           if ($res != false)

           {

              $file_url = $res;

           }

         }

         if ($file_url == '')

              $file_url = $_POST['dst_image'];

	

		$ret = $db->query("UPDATE `wxch_qr_set` SET `shop_name`='$shop_name', ".

		   "dst_image        = '$file_url',  ".

		   "headpic_width    = $headpic_width,  ".

		   "headpic_height   = $headpic_height, ".

		   "headpic_src_x    = $headpic_src_x, ".

		   "headpic_src_y    = $headpic_src_y, ".

		   "qr_width         = $qr_width, ".

		   "qr_height        = $qr_height, ".

		   "qr_src_x         = $qr_src_x,".        

		   "qr_src_y         = $qr_src_y, ".

		   "txt_src_x        = $txt_src_x, ".  

		   "txt_src_y        = $txt_src_y, ".

		   "font_size        = $font_size ".

		   " WHERE `set_id`=1;");

		$link[] = array('href' =>'qr_set.php?act=index', 'text' => '分销二维码设置');

		if($ret)

		{

			sys_msg('码哥分销提示您设置成功',0,$link);

		}

		else

		{

			sys_msg('码哥分销提示您设置失败',0,$link);

		}

	}

	else

	{

		$ret = $db->getRow("SELECT * FROM `wxch_qr_set` WHERE `set_id` = 1");

		$smarty->assign('ret',$ret);

		$smarty->assign('wxch_lang',$wxch_lang);

		$smarty->display('qr_set.html');

	}

/*  测试生成的二维码效果图 */	

}elseif($_REQUEST['act'] == 'test'){

    $distri->create_qr_code(0);

}

/* 上传文件 */

function upload_article_file($upload)

{

    if (!make_dir("../" . DATA_DIR . "/static/images/"))

    {

        /* 创建目录失败 */

        return false;

    }



    $filename = cls_image::random_filename() . substr($upload['name'], strpos($upload['name'], '.'));

    $path     = ROOT_PATH. DATA_DIR . "/static/images/" . $filename;



    if (move_upload_file($upload['tmp_name'], $path))

    {

        return DATA_DIR . "/static/images/" . $filename;

    }

    else

    {

        return false;

    }

}	

?>