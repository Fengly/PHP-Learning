<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ͨ��$_FILES��������ϴ��ļ�������</title>
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
      <!--  �ϴ��ļ���form����������enctype����  -->
      <form action="" method="post" enctype="multipart/form-data">
        <tr>
          <td width="134" height="30" align="right" valign="middle">��ѡ���ϴ��ļ���</td>
          <!--  �ϴ��ļ���type����Ϊfile  -->
          <td width="237"><input type="file" name="upfile"/></td>
          <!--  �ύ��ť  -->
          <td width="80"><input type="submit" name="submit" value="�ϴ�" /></td>
        </tr>
      </form>
    </table></td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="100" align="left" valign="middle"><!--  ��������ؽ��  -->
<?php

	if(!empty($_FILES)){								//�жϱ���$_FIELS�Ƿ�Ϊ��
		foreach($_FILES['upfile'] as $name => $value)		//ʹ��foreachѭ������ϴ��ļ���Ϣ������ֵ
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
