<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, 95era, Inc.
 * @link		http://www.d-winner.com
 */
 
//中文截取函数
/*
return String
$str		传入的字符
$start		起始位置
$start		结束位置
*/
function cSubstr($str,$start,$len){
	for($i=$start;$i<$len;$i++){
	   $temp_str=substr($str,0,1);
	   if(ord($temp_str) > 127){
		$i++;
		if($i<$len){
		 $new_str[]=substr($str,0,3);
		 $str=substr($str,3);
		}
	   }
	   else{
		$new_str[]=substr($str,0,1);
		$str=substr($str,1);
	   }
	}
	return join($new_str);
}