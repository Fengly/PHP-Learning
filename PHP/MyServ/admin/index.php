<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link href="css/font.css" rel="stylesheet">
    <title>admin</title>
</head>
<body bgcolor="#FFFFFF" marginleft="0" margintop="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<p></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script language="JavaScript">
    function chkinput(form) {
        if (form.name.value == '') {
            alert("请输入用户名!");
            form.name.select();
            return false;
        }
        if (form.pwd.value == '') {
            alert("请输入密码!");
            form.pwd.select();
            return false;
        }
        if (form.pwd.value.length < 6) {
            alert("密码错误,请重新输入");
            form.pwd.select();
            return false;
        }
    }
</script>
<form name="form1" method="post" action="chkadmin.php" onsubmit="return chkinput(this)">
     <table bgcolor="#f5f5dc" width="545" border="0" cellpadding="0" cellspacing="0" align="center" id="__01">
         <tr>
             <td height="226" background="images/default_01.gif">&nbsp;</td>
         </tr>
         <tr>
             <td height="45" background="images/default_02.gif">
                 <table align="right" width="407" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                         <td width="57" align="center">用户名:&nbsp;</td>
                         <td width="94" align="center"><input title="" type="text" name="name" size="14" maxlength="20" class="inputcss"/></td>
                         <td width="53" align="center">密&nbsp;码:&nbsp;</td>
                         <td width="104" align="center"><input title="" type="password" name="pwd" size="14" maxlength="20" class="inputcss"></td>
                         <td width="99">&nbsp;<input name="imageField" type="image" src="images/default_07.gif" width="74" height="24" border="0"></td>
                     </tr>
                 </table>
             </td>
         </tr>
         <tr>
             <td background="images/default_04.gif" height="23"></td>
         </tr>
     </table>
</form>
</body>
</html>