<?php
	header("Content-type: text/html; charset=gb2312"); //�����ļ������ʽ
  	include("conn/conn.php");//�������ݿ��ļ�
  	while(list($value,$name)=each($_POST)){ //Ӧ��whileѭ����䣬ɾ��ָ���Ķ�����Ϣ
     	mysqli_query($conn,"delete from tb_dingdan where id='".$value."'");//ִ��ɾ������
   	}
 	header("location:lookdd.php");//���¶�λ���鿴����ҳ
?>