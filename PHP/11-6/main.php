<div align="center">
<?php
header("content-type:text/html;charset=utf-8");//设置页面编码格式
session_start();			//初始化SESSION变量
if(isset($_SESSION['user']) || isset($_SESSION['pass'])){		//判断SESSION变量的值是否存在
include("top.php");			//调用外部文件
?>
<html>
<head>
<title>管理员登录成功页面</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
.STYLE2 {
	color: #55A729;
	font-weight: bold;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="830">
  <tr>
    <td align="center" bgcolor="#FFFFFF">
<table width="745" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#99db69">
  <tr>
    <td bgcolor="#FFFFFF">
	<table width="720" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3"><img src="images/bg_04.jpg" width="720" height="37"></td>
        </tr>
      <tr>
        <td height="50">&nbsp;</td>
        <td><div align="right"><span class="STYLE2">
		<?php
		echo $_SESSION['user']."管理员登录成功！";
		echo " &nbsp; &nbsp; &nbsp; &nbsp;";
		echo date("Y年m月d日 H:i:s");		//输出当前时间
		?></span></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="169">&nbsp;</td>
        <td width="445" background = "images/face.JPG" rowspan="2" height="248"></td>
        <td width="106">&nbsp;</td>
      </tr>
      <tr>
        <td height="60">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</td>
    </tr>
</table>
</td>
  </tr>
</table>

</body>
</html>
<?php
include("bottom.php");
}else{						//如果值不正确，则跳转到首页
	echo "<script>alert('您不具备访问本页面的权限!');window.location.href='index.php';</script>";
}
?>
</div>
