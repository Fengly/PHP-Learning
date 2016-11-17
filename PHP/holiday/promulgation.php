<?php
session_start();
if(isset($_SESSION['name'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>假日发布</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 36px;
	color: #990000;
	font-weight: bold;
}
body,td,th {
	font-size: 12px;
}
-->
</style>
</head>

<body>
<div align="center">
  <form action="promulgation_ok.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table id="__01" width="800" height="600" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3"><a href="indexs.php"><img src="images/manage_01.gif" alt="" width="800" height="201" border="0" /></a></td>
      </tr>
      <tr>
        <td><img src="images/manage_02.gif" width="140" height="251" alt="" /></td>
        <td width="523" height="251" align="center" valign="top" background="images/manage_03.gif"><table width="416" height="232">
          <tr>
            <td width="89" height="30">假日名称：</td>
            <td width="315" align="left"><input name="name" type="text" size="40" /></td>
          </tr>
          <tr>
            <td height="30">假日文件：</td>
            <td align="left"><input name="files" type="file" size="31" /></td>
          </tr>
          <tr>
            <td height="30">假日图片1：</td>
            <td align="left"><?php
	  	for($a=0;$a<4;$a++){
	  ?>
                <input type="file" name="photo_<?php echo $a;?>" />
      <?php
	  	}
	  ?>
            </td>
          </tr>
          <tr>
            <td height="30">是否执行：</td>
            <td><label>
              <input name="radio" type="radio" value="1" checked="checked" />
              是
              <input type="radio" name="radio" value="0" />
              否 </label>（<font color="#FF0000">* 文件为.html格式，图片为jpg或者gif格式</font>）</td>
          </tr>
          <tr>
            <td height="30" colspan="2"><div align="center">
                <input type="submit" name="Submit" value="发布" />
                <input type="reset" name="Submit2" value="取消" />
            </div></td>
          </tr>
        </table></td>
        <td><img src="images/manage_04.gif" width="137" height="251" alt="" /></td>
      </tr>
      <tr>
        <td colspan="3"><img src="images/manage_05.gif" width="800" height="148" alt="" /></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
<?php
}else{
	echo "<script>alert('请先登录！');window.location.href='user.php';</script>";
}
?>