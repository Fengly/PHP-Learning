<?php
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
?>
<style type="text/css">
.style1 {
	font-size: 14px;
	font-family: "宋体";
	font-weight: normal;
}
a:link {
	color: #FF0000;
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
	color: #000000;
}
.style6 {font-size: 13px; font-family: "宋体"; font-weight: normal; } 
.style7 {font-size: 13px}
</style>
<table width="776" height="29" border="0" cellpadding="0" cellspacing="0" background="image/2.gif">
  <form action="dl_ok.php" method="post" name="dlform">
    <tr>
      <td width="76" align="center" valign="middle" class="style1">&nbsp;</td>
      <td width="65" height="24" align="center" valign="middle" class="style1"><div align="center" class="style1 style7">用户名:</div>      </td>
      <td width="106" height="25" valign="middle"><input name="username" type="text" id="username" size="12"></td>
      <td width="66" align="left" valign="middle"><span class="style6">密&nbsp;&nbsp;码:</span></td>
      <td width="94" valign="middle"><input name="password" type="password" id="password" size="12"></td>
      <td width="63" align="left" valign="middle"><input name="imageField" type="image" src="image/denglu.gif" width="45" height="19" border="0"></td>
      <td width="201" align="left" valign="middle"><a href="zhuce.php"><img src="image/zhuce.gif" width="45" height="19" border="0"></a></td>
      <td width="87" align="center" valign="middle">&nbsp;</td>
    </tr>
  </form>
</table>
<?php
}else{
?>
<table width="776" height="25" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="455">&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username'];?>已登录,欢迎您发表评论和回复主题!!</td>
    <td width="80" height="25" align="center"><a href="zx_ok.php">注销登录!</a></td>
  </tr>
</table>
<?php
}
?>