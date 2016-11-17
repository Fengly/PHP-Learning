<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<body>
<?php
	$str="为进一步丰富编程词典的内容和观赏性，公司决定组织“春季盎然杯”摄影大赛，本次参赛作品要求全部为春季拍摄，旨在展示我国北方地区春季生机盎然的景色。";
	if(strlen($str)>40){ 						//如果文本的字符串长度大于70
		echo substr($str,0,40)."...";				//输出文本的前70个字符串，然后输出省略号
	}else{									//如果文本的字符串长度小于70
		echo $str; 							//直接输出文本
	}
?>

</body>
</html>
