<?php
session_start();						//��ʼ��SESSION����
include("config.php");					//�������ݿ������ļ�
$furl=getenv("http_referer");					//��ȡ��ǰ�ļ�
$page=(isset($_GET['page']))?$_GET['page']:"1";		//�����ҳ������ֵ
$lmbs=(isset($_GET['lmbs']))?$_GET['lmbs']:"";		//������Ŀ��ʶ���ݵĲ���ֵ
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){	//�жϵ�ǰ�û���Ȩ��
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��̳����</title>
<style type="text/css">
<!--
a:link {
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
}
.style1 {font-size: 13px;
	font-family: "����";
	font-weight: normal;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EFF3FF;
}
-->
</style></head>
<script language="javascript" src="../script/zc_check.js" type="text/javascript"></script>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("head.php");?></td>
  </tr>
  <tr>
    <td background="../image/index4.gif"><img src="../image/555.gif" width="776" height="29"></td>
  </tr>
</table>

<table width="776" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="180" height="200" align="center" valign="top">
	<table width="175" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center"><a href="index.php?lmbs=<?php echo urlencode('��Ŀ����');?>">��Ŀ����</a></td>
      </tr>
      <tr>
        <td height="30" align="center"><a href="index.php?lmbs=<?php echo urlencode('��̳����');?>">�������</a></td>
      </tr>
      <tr>
        <td height="30" align="center"><a href="index.php?lmbs=<?php echo urlencode('�ظ�����');?>">�ظ��������</a></td>
      </tr>
      <tr>
        <td height="30" align="center"><a href="index.php?lmbs=<?php echo urlencode('�û�����');?>">�û�����</a></td>
      </tr>
    </table></td>
    <td width="596" align="center" valign="top">
<?php 
switch($lmbs){		//ͨ���������������Ӧ���ļ�
	    case "��Ŀ����":
		    include "lmgl.php";		 //�������ĳ����ӵ�����Ŀ���������lmgl.phpҳ
		break;						//������ǣ�������������������ѭ��
		case "��̳����":
		    include "ztgl.php";
		break;	
		case "�ظ�����":
		    include "hfztgl.php";
		break;	
		case "�û�����":
		    include "hygl.php";
		break;
		default:
		    include "lmgl.php";
		break;	
	}
	?>
	</td>
  </tr>
</table>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("under.php");?></td>
  </tr>
</table>
</body>
</html>
<?php 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">����</a>";
}
?>