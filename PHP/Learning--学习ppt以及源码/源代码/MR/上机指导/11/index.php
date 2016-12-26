<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
  function checkform(form){//检测表单内容是否为空
    if(form.user.value==""){
	  alert("请输入用户名");
	  form.user.focus();
	  return false;
	}
	if(form.pwd.value==""){
	  alert("请输入密码");
	  form.pwd.focus();
	  return false;
	}
  }
</script>
<form id="form1" name="form1" method="post" action="index_ok.php" onsubmit="return checkform(form1)">
  <fieldset style="width:500px"><legend style="font-size:16px">用户登录</legend><table width="300" border="0" align="center">
    <tr>
      <td width="77" align="right">用户名：</td>
      <td width="213"><input name="user" type="text" id="user" size="24" /></td>
    </tr>
    <tr>
      <td align="right">密码：</td>
      <td><input name="pwd" type="password" id="pwd" size="25" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="sub" value="登录" />
      <input type="reset" name="res" value="重置" /></td>
    </tr>
  </table>
  </fieldset>
</form>
