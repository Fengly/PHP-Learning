<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>通过$_FILES变量输出上传文件的资料</title>
</head>

<body>
<table width="1004" height="635" border="0" cellpadding="0" cellspacing="0" background="images/file.jpg">
  <tr>
    <td width="358" height="300">&nbsp;</td>
    <td width="469">&nbsp;</td>
    <td width="177">&nbsp;</td>
  </tr>
  <tr>
    <td height="150" rowspan="2">&nbsp;</td>
    <td height="50" align="left" valign="middle"><table width="451" border="0" cellspacing="0" cellpadding="0">
      <!--  上传文件的form表单，必须有enctype属性  -->
      <form action="" method="post" enctype="multipart/form-data">
        <tr>
          <td width="134" height="30" align="right" valign="middle">请选择上传文件：</td>
          <!--  上传文件域，type类型为file  -->
          <td width="237"><input type="file" name="upfile"/></td>
          <!--  提交按钮  -->
          <td width="80"><input type="submit" name="submit" value="上传" /></td>
        </tr>
      </form>
    </table></td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="100" align="left" valign="middle"><!--  处理表单返回结果  -->
<?php

	if(!empty($_FILES)){								//判断变量$_FIELS是否为空
		foreach($_FILES['upfile'] as $name => $value)		//使用foreach循环输出上传文件信息的名和值
			echo $name.' = '.$value.'<br>';
	}
?></td>
  </tr>
  <tr>
    <td height="185">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
