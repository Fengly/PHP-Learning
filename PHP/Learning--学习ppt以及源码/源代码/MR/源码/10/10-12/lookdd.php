<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�鿴����</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<body topmargin="0" leftmargin="0" bottommargin="0">
<?php
    include("conn/conn.php");//�������ݿ��ļ�
	$sql=mysqli_query($conn,"select count(*) as total from tb_dingdan ");
	$info=mysqli_fetch_array($sql);//�����������ݱ���Ϣ
	$total=$info['total']; //�����û�������Ŀ
	if($total==0){//���������ĿΪ0���򵯳������ʾ
		echo "��վ���޶���!";
	}
	   	else{//���������Ŀ��Ϊ�գ������������Ϣ
           	$sql1=mysqli_query($conn,"select * from tb_dingdan order by time desc");
		   	$info1=mysqli_fetch_array($sql1);
?>
<form name="form1" method="post" action="deletedd.php">   
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" bgcolor="#FFCF60"><div align="center" class="style1">�鿴���� </div></td>
  </tr>
  <tr>
    <td height="40" bgcolor="#666666"><table width="750" height="44" border="0" align="center" cellpadding="0" cellspacing="1">
	  <tr>
        <td width="121" height="20" bgcolor="#FFFFFF"><div align="center">������</div></td>
        <td width="59" bgcolor="#FFFFFF"><div align="center">�µ���</div></td>
        <td width="60" bgcolor="#FFFFFF"><div align="center">������</div></td>
        <td width="70" bgcolor="#FFFFFF"><div align="center">����ܼ�</div></td>
        <td width="88" bgcolor="#FFFFFF"><div align="center">���ʽ</div></td>
        <td width="87" bgcolor="#FFFFFF"><div align="center">�ջ���ʽ</div></td>
        <td width="141" bgcolor="#FFFFFF"><div align="center">����״̬</div></td>
        <td width="115" bgcolor="#FFFFFF"><div align="center">����</div></td>
	  </tr>
	  <?php
		    do{//Ӧ��do��whileѭ��������������Ϣ
	  ?>
      <tr>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['dingdanhao'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['xiadanren'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['shouhuoren'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['total'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['zfff'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['shff'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['zt'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center">
        <input type="checkbox" name=<?php echo $info1['id'];?> value=<?php echo $info1['id'];?>></div></td>
      </tr>
	  <?php
	      }while($info1=mysqli_fetch_array($sql1))//do��whileѭ��������
	  ?>
    </table></td>
  </tr>
</table>
<table width="750" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="right"><input type="submit" value="ɾ��ѡ����" class="buttoncss"></div></td>
  </tr>
</table>
<?php
 }
?>
</form>
</body>
</html>
