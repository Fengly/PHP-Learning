<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������е����ݱ��浽Session��</title>
<style type="text/css">
<!--
.STYLE1 {color: #202A00}
.STYLE3 {
	color: #202A00;
	font-size: 13px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="995" height="626" border="0" cellpadding="0" cellspacing="0" background="images/bg.jpg">
  <tr>
    <td width="204" height="267">&nbsp;</td>
    <td width="550">&nbsp;</td>
    <td width="219">&nbsp;</td>
  </tr>
  <tr>
    <td height="220">&nbsp;</td>
    <td class="STYLE1">
	  <span class="STYLE3">
	  <?php 
	  	session_start();						//��ʼ��Session����
	$array=array('PHP�����ŵ���ͨ','PHP��������ѧ�ֲ�','PHP�����ο���ȫ','PHP��������ģ���ȫ','PHP�����̱�׼�̳�','PHP���򿪷���������');
	$_SESSION['mr_book']=$array;
		foreach($_SESSION['mr_book'] as $key=>$value){			//��ȡSession�����д洢������
			if($value=="PHP��������ģ���ȫ"){					//�жϵ�$value��ֵ����PHP��������ģ���ȫʱ����
				$br="<br><br>";
			}else{
				$br="&nbsp;&nbsp;";
			}
			echo $value.$br;									//���Session�����е�����
		}
	?>
    </span>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
