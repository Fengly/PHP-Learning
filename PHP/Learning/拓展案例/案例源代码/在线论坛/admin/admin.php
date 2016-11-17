<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-weight: bold;
	font-family: "宋体";
}
body {
	margin-left: 00px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EFF3FF;
}
-->
</style>

<script language="javascript">
   function checklogin()
   {   
       if((login.user.value!="")&&(login.pass.value!=""))
	      return true
		else{
		   alert("呢称或密码不能为空!")
		   return false
		
		
		}  
   
   }
</script>
<body>
<table width="346" border="0" align="center" cellpadding="0" cellspacing="0" background="../image/admin1.gif">
  <tr>
    <td height="65">&nbsp;</td>
  </tr>
</table>
<table width="346" height="75" border="0" align="center" cellpadding="0" cellspacing="0" background="../image/admin2.gif">
 <form action="admin_ok.php" method="post" name="login" onSubmit="return checklogin()">
  <tr>
    <td width="130" height="29">&nbsp;</td>
    <td width="216" valign="bottom"><span class="style1">
      <input name="user" type="text" id="user" size="22">
    </span></td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td valign="bottom"><span class="style1">
      <input name="pass" type="password" id="pass2" size="22">
    </span></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td>      <table width="100%"  border="0">
        <tr>
          <td width="20%">&nbsp;</td>
          <td width="79%"><input name="denglu" type="image" id="denglu" src="../image/admin4.gif" width="45" height="25" border="0"></td>
        </tr>
      </table></td>
  </tr>
    </form>
</table>
<table width="346" border="0" align="center" cellpadding="0" cellspacing="0" background="../image/admin3.gif">
  <tr>
    <td height="48">&nbsp;</td>
  </tr>
</table>
</body>
</html>