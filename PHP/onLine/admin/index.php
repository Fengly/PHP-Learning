<?php
session_start();						//初始化SESSION变量
include("config.php");					//包含数据库连接文件
$furl=getenv("http_referer");					//获取当前文件
$page=(isset($_GET['page']))?$_GET['page']:"1";		//定义分页变量的值
$lmbs=(isset($_GET['lmbs']))?$_GET['lmbs']:"";		//定义栏目标识传递的参数值
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){	//判断当前用户的权限
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>论坛管理</title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EFF3FF;
}
-->
</style></head>
<script language="javascript" src="../script/zc_check.js" type="text/javascript"></script>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("head.php");?></td>
  </tr>
  <tr>
    <td background="../image/index4.gif"><img src="../image/555.gif" width="776" height="29"></td>
  </tr>
</table>

<table width="776" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="180" height="200" align="center" valign="top">
	<table width="175" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center"><a href="index.php?lmbs=<?php echo urlencode('栏目管理');?>">栏目管理</a></td>
      </tr>
      <tr>
        <td height="30" align="center"><a href="index.php?lmbs=<?php echo urlencode('论坛主题');?>">主题管理</a></td>
      </tr>
      <tr>
        <td height="30" align="center"><a href="index.php?lmbs=<?php echo urlencode('回复主题');?>">回复主题管理</a></td>
      </tr>
      <tr>
        <td height="30" align="center"><a href="index.php?lmbs=<?php echo urlencode('用户管理');?>">用户管理</a></td>
      </tr>
    </table></td>
    <td width="596" align="center" valign="top">
<?php 
switch($lmbs){		//通过该语句来调用相应的文件
	    case "栏目管理":
		    include "lmgl.php";		 //如果点击的超链接等于栏目管理，则输出lmgl.php页
		break;						//如果不是，则跳出，继续其他的循环
		case "论坛主题":
		    include "ztgl.php";
		break;	
		case "回复主题":
		    include "hfztgl.php";
		break;	
		case "用户管理":
		    include "hygl.php";
		break;
		default:
		    include "lmgl.php";
		break;	
	}
	?>
	</td>
  </tr>
</table>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("under.php");?></td>
  </tr>
</table>
</body>
</html>
<?php 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">这里</a>";
}
?>