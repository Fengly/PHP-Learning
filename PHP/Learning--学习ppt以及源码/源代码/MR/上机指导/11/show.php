<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学涯在线</title>
</head>

<body>
<?php
	if(!isset($_SESSION['time'])){//判断SESSION变量是否为空
	  echo "<script>alert('您无权限查看本页面，请先登录！');location='index.php';</script>";//不允许直接登录
	}elseif((time()-$_SESSION['time'])<600){//如果登录时间没有超过10分钟
	  $_SESSION['time']=time();//把当前时间戳赋给SESSION变量
?>
<table width="469" border="0" align="center">
  <tr>
    <td colspan="3"><img src="images/mysql_01.gif" width="464" height="139" /></td>
  </tr>
  <tr>
    <td width="81"><img src="images/mysql_02.gif" width="78" height="136" /></td>
    <td width="301" align="center" style="font-size:24px; color:#CC00CC; font-weight:bolder">欢迎来到学涯在线！</td>
    <td width="74"><img src="images/mysql_04.jpg" width="74" height="136" /></td>
  </tr>
  <tr>
    <td height="63" colspan="3"><img src="images/mysql_05.gif" width="464" height="61" /></td>
  </tr>
</table>
<?php
	}else{//如果登录时间超过10分钟并且10分钟内没有刷新页面则提示登录超时
		echo "<script>alert('登录超时，请重新登录！');location='index.php';</script>";
    }
?>
</body>
</html>
