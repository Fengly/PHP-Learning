<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>截取超长字符串</title>
</head>
<body>
<?php
function msubstr($str,$start,$len){  		//$str是字符串，$start是截取字符串的起始位置，$len是截取的长度
	$tmpstr="";//声明变量
	$strlen=$start+$len;				//用$strlen指定截取字符串的结束位置
	for($i=$start;$i<$strlen;$i++){		//通过for循环语句，循环读取字符串
		if(ord(substr($str,$i,1))>0xa0){	//如果字符串中首个字节的ASCII序数值大于0xa0，则表示为汉字
 			$tmpstr.=substr($str,$i,2);	//每次取出两位字符赋给变量$tmpstr，等于一个汉字
 			$i++;					//变量自加1
		}else{					//如果不是汉字，则每次取出一位字符赋给变量$tmpstr
  			$tmpstr.=substr($str,$i,1);
		}
	}
	return $tmpstr;					//输出字符串
}
$str="明日科技公司是一家以计算机软件技术为核心的高科技企业，多年来始终致力于行业管理软件开发、数字化出版物制作、计算机网络系统综合应用以及行业电子商务网站开发等领域，涉及生产、管理、控制、仓贮、物流、营销、服务等行业";					//定义字符串
if(strlen($str)>40){ 					//判断文本的字符串长度是否大于40
	echo msubstr($str,0,40)."……";		//输出文本的前40个字符串，然后输出省略号
}else{							//如果文本的字符串长度小于40
	echo $str; 						//直接输出文本
}
?>
</body>
</html>
