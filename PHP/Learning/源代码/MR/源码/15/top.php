<?php
session_start();
include_once("conn.php");
include_once("function.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>留言本</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="779" height="143" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="images/banner.gif"><table width="779" height="143" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="110" rowspan="2">&nbsp;</td>
        <td height="55">&nbsp;<marquee scrollamount="2" scrolldelay="80">
		<?php
		 if(isset($_SESSION["unc"]) && $_SESSION["unc"]!=""){
		 
		    echo "欢迎您登录：".$_SESSION["unc"];
		
		 }
		?></marquee>
		</td>
      </tr>
      <tr>
        <td height="55">&nbsp;</td>
      </tr>
      <tr>
        <td width="235">&nbsp;</td>
        <td width="544"><div align="center">|&nbsp;<a href="index.php" class="a3">首&nbsp;&nbsp;页</a>&nbsp;|&nbsp;<a href="reg.php" class="a3">用户注册</a>&nbsp;|&nbsp;<a href="
		<?php
		  if(isset($_SESSION["unc"]) && $_SESSION["unc"]!=""){
		    echo "leaveword.php";
		  
		  }else{
		    echo "javascript:alert('请先登录本站，然后留言！');";
		  
		  }
        ?>
		" 
		class="a3">发表留言</a>&nbsp;|&nbsp;<a href="" class="a3">查看留言</a>&nbsp;|&nbsp;<a href="searchword.php" class="a3">查询留言</a>&nbsp;|&nbsp;<a href="javascript:location.reload()" target="_self" class="a3">刷新页面</a>&nbsp;|<?php 
		 if(isset($_SESSION["unc"]) && $_SESSION["unc"]!=""){
		?>
		 &nbsp;<a href="logout.php" class="a3">退出登录</a>&nbsp;|
		
		<?php
		 }
		?></div></td>
      </tr>
    </table></td>
  </tr>
</table>
