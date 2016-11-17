<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>上传文件</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>

<body>
<table width="1004" height="635" border="0" cellpadding="0" cellspacing="0" background="images/file.jpg">
  <tr>
    <td width="358" height="300">&nbsp;</td>
    <td width="469">&nbsp;</td>
    <td width="177">&nbsp;</td>
  </tr>
  <tr>
    <td height="150" rowspan="3">&nbsp;</td>
    <td height="40" align="left" valign="middle"><table width="451" border="0" cellspacing="0" cellpadding="0">
      <!--  上传文件的form表单，必须有enctype属性  -->
      <form action="" method="post" enctype="multipart/form-data">
        <tr>
          <td width="136" height="30" align="right" valign="middle">请选择上传文件：</td>
          <!--  上传文件域，type类型为file  -->
          <td width="235"><input type="file" name="up_file"/></td>
          <!--  提交按钮  -->
          <td width="80"><input type="submit" name="submit" value="上传" /></td>
        </tr>
      </form>
    </table></td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="130" align="left" valign="top">
	<!--  处理表单返回结果  -->
<?php
/*  判断是否有上传文件  */
	if(!empty($_FILES['up_file']['name'])){
/*  将文件信息赋给变量$fileinfo  */
		$fileinfo = $_FILES['up_file'];
		if($fileinfo['size'] < 2097152 && $fileinfo['size'] > 0){	/*  判断文件大小  */
  			$path="upfile/".$_FILES["up_file"]["name"];				//定义上传文件的路径
			move_uploaded_file($fileinfo['tmp_name'],$path);		//上传文件
			echo "文件上传成功";
		}else{
			echo '文件大小不符合要求';
		}
	}
?></td>
  </tr>
  <tr>
    <td height="135">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>



