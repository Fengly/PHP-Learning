<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>定义一个取绝对值的函数</title>
</head>

<body>
<?php
    function abso($num){		//定义函数abso，参数为输入的数字变量$num
       if($num>=0){				//如果参数值不是负数
	      return $num;			//返回参数值本身
	   }else{
	      return $num*(-1);		//否则如果是负数则返回参数值乘以-1，即它的绝对值
	   }
    }
?>
<form name="form" method="post" action="#">
  <label>请输入数字：</label>
  <input type="text" name="num" id="num">
  <input type="submit" name="sub" value="提交"><p>
</form>
<?php
    if(isset($_POST['num']) && $_POST['num']!=""){//如果文本框输入的内容不为空
       echo "您输入的数字是".$_POST['num']."，";//输出字符串以及变量值
	   echo $_POST['num']."的绝对值是".abso($_POST['num']);//输出字符串并调用函数
    }
?>
</body>
</html>
