<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
.STYLE1 {color: #2F7134}
-->
</style></head>
<script language="javascript">
function checkit(){						//自定义函数
	if(form1.name.value==""){				//判断用户名是否为空
	        alert("请输入用户名!");
   		    form1.name.select();
			return false;
         }		        		
       if(form1.pwd.value==""){			//判断密码是否为空
			alert("请输入密码!");
			form1.pwd.select();
			return false ;
		 }
		 	return true;
					 
}	
</script>
<body>
<?php
include("conn/conn.php");
if(isset($_POST['name']) and $_POST['pwd']!=null){
	$select=mysqli_query($conn,"select * from tb_user where name='".$_POST['name']."' and pwd='".$_POST['pwd']."'");
	if($row=mysqli_num_rows($select)==1){
		$_SESSION['name']=$_POST['name'];
		echo "<script>alert('登录成功！');window.location.href='indexs.php';</script>;";	
	}else{
		echo "<script>alert('用户名和密码不正确！');window.location.href='user.php';</script>;";	
	}
}
?>
<form id="form1" name="form1" method="post" action="user.php">
  <table width="801" height="481" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
    <tr>
      <td colspan="5"><img src="images/user_01.gif" width="800" height="197" alt="" /></td>
      <td><img src="images/分隔符.gif" width="1" height="197" alt="" /></td>
    </tr>
    <tr>
      <td rowspan="4"><img src="images/user_02.gif" width="188" height="284" alt="" /></td>
      <td width="226" height="91" rowspan="2" align="center" valign="middle" background="images/user_03.gif"><table width="215" height="58" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="65"><span class="STYLE1"><strong>用户名：</strong></span></td>
          <td width="150"><input name="name" type="text" id="name" size="20" /></td>
        </tr>
        <tr>
          <td><span class="STYLE1"><strong>密码：</strong></span></td>
          <td><input name="pwd" type="password" id="pwd" size="21" /></td>
        </tr>
        
      </table></td>
      <td rowspan="4"><img src="images/user_04.gif" width="128" height="284" alt="" /></td>
      <td width="173" height="64"><input type="image" name="imageField" onclick="return checkit();" src="images/user_05.gif" /></td>
      <td rowspan="4"><img src="images/user_06.gif" width="85" height="284" alt="" /></td>
      <td><img src="images/分隔符.gif" width="1" height="64" alt="" /></td>
    </tr>
    <tr>
      <td width="173" height="59" rowspan="2"><input type="image" name="imageField2" onclick="form.reset();return false;" src="images/user_07.gif" /></td>
      <td><img src="images/分隔符.gif" width="1" height="27" alt="" /></td>
    </tr>
    <tr>
      <td rowspan="2"><img src="images/user_08.gif" width="226" height="193" alt="" /></td>
      <td><img src="images/分隔符.gif" width="1" height="32" alt="" /></td>
    </tr>
    <tr>
      <td><img src="images/user_09.gif" width="173" height="161" alt="" /></td>
      <td><img src="images/分隔符.gif" width="1" height="161" alt="" /></td>
    </tr>
  </table>
</form>

</body>

</html>
