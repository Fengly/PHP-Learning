<?php
	header('Content-type: text/html;charset=GB2312'); 			//ָ���������ݵı����ʽ
	include_once 'conn/conn.php';								//�������ݿ�
	$user =iconv('UTF-8','gb2312',$_POST['users']);				//��ȡAjax���ݵ�ֵ,��ʵ���ַ�����ת��
	$number = iconv('UTF-8','gb2312',$_POST['numbers']);		//��ȡAjax���ݵ�ֵ,��ʵ���ַ�����ת��
	$explains = iconv('UTF-8','gb2312',$_POST['explaines']);	//��ȡAjax���ݵ�ֵ,��ʵ���ַ�����ת��	
	$sql="insert into tb_administrator(user,number,explains)values('$user','$number','$explains')";
	$result=mysqli_query($conn,$sql);						//ִ��������
	if($result){
		$sqles="select * from tb_administrator ";
		$results=mysqli_query($conn,$sqles);
		echo "<table width='500' border='1' cellpadding='1' cellspacing='1' bordercolor='#FFFFCC' bgcolor='#666666'>";
		echo "<tr><td height='30' align='center' bgcolor='#FFFFFF'>ID</td><td align='center' bgcolor='#FFFFFF'>����</td><td align='center' bgcolor='#FFFFFF'>���</td><td align='center' bgcolor='#FFFFFF'>����</td></tr>";
		while($myrow=mysqli_fetch_array($results)){ 			//ѭ�������ѯ���
 			echo "<tr><td height='22' bgcolor='#FFFFFF'>".$myrow['id']."</td>";
  			echo "<td bgcolor='#FFFFFF'>".$myrow['user']."</td>";
			echo "<td bgcolor='#FFFFFF'>".$myrow['number']."</td>";
			echo "<td bgcolor='#FFFFFF'>".$myrow['explains']."</td>";
			echo "</tr>";
		}
		echo "</table>";  
	}	
?>
