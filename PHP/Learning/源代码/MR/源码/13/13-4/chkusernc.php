<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");//�������ݿ������ļ�
$nc=trim(isset($_GET['nc'])?$_GET['nc']:"");//��ȡͨ��GET�������ݵ�ֵ
if($nc==""){//���ֵΪ��
	echo 0;//���0
}else{
	$sql=mysqli_query($conn,"select * from tb_user where name='".$nc."'");  //ִ�в�ѯ
	$info=mysqli_fetch_array($sql);//����ѯ�������Ϊ����
	if($info==true){//�����ѯ���Ϊ��
		echo 1;//���1
	}else{
		echo 2;//���2
	} 
}
?>
