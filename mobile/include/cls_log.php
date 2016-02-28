<?php

class Log_
{
	// 打印log
	function  log_result($file,$word) 
	{
	    $fp = fopen($file,"a");
	    flock($fp, LOCK_EX) ;
	    fwrite($fp,"---------------------执行日期：".strftime("%Y-%m-%d-%H：%M：%S",time())."-------------------\r\n".$word."\r\n\r\n");
	    flock($fp, LOCK_UN);
	    fclose($fp);
	}
}

?>