<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ϴ��ļ�</title>
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
      <!--  �ϴ��ļ���form����������enctype����  -->
      <form action="" method="post" enctype="multipart/form-data">
        <tr>
          <td width="136" height="30" align="right" valign="middle">��ѡ���ϴ��ļ���</td>
          <!--  �ϴ��ļ���type����Ϊfile  -->
          <td width="235"><input type="file" name="up_file"/></td>
          <!--  �ύ��ť  -->
          <td width="80"><input type="submit" name="submit" value="�ϴ�" /></td>
        </tr>
      </form>
    </table></td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="130" align="left" valign="top">
	<!--  ��������ؽ��  -->
<?php
/*  �ж��Ƿ����ϴ��ļ�  */
	if(!empty($_FILES['up_file']['name'])){
/*  ���ļ���Ϣ��������$fileinfo  */
		$fileinfo = $_FILES['up_file'];
		if($fileinfo['size'] < 2097152 && $fileinfo['size'] > 0){	/*  �ж��ļ���С  */
  			$path="upfile/".$_FILES["up_file"]["name"];				//�����ϴ��ļ���·��
			move_uploaded_file($fileinfo['tmp_name'],$path);		//�ϴ��ļ�
			echo "�ļ��ϴ��ɹ�";
		}else{
			echo '�ļ���С������Ҫ��';
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



