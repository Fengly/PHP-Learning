
<html>
<head>
<title>管理员登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
<div align="center">
  <?php
  include("top.php");			//调用外部文件
  ?>
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
		<form name="form1" method="post" action="index_ok.php">
      <tr>
        <td height="50">&nbsp;</td>
        <td><div align="right"><span class="STYLE2">
		<?php
		echo " &nbsp; &nbsp; &nbsp; &nbsp;";
		echo date("Y年m月d日 H:i:s");		//输出当前时间
		?></span></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="169">&nbsp;</td>
        <td width="445"><p>用户名：
          <input name="user" type="text" id="user" size="28">
          <span class="STYLE1">*&nbsp;&nbsp;</span></p>
          <p>密&nbsp;&nbsp;&nbsp;&nbsp;码：
            <input name="pass" type="password" id="pass" size="28">
            <span class="STYLE1">*&nbsp;&nbsp;</span></p></td>
        <td width="106">&nbsp;</td>
      </tr>
      <tr>
        <td height="60">&nbsp;</td>
        <td align="center">
        <input type="image" name="imageField" src="images/bg_09.jpg"> &nbsp; &nbsp; &nbsp; &nbsp;<input type="image" name="imageField2" src="images/bg_11.jpg" onClick="form.reset();return false;"></td>
        <td>&nbsp;</td>
      </tr>
	  </form>
    </table>
	</td>
    </tr>
</table>
</td>
  </tr>
</table>
  <?php
  include("bottom.php");
  ?>
</div>
</body>
</html>
