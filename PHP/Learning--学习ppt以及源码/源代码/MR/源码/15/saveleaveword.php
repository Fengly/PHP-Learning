<?php
session_start();					//��ʼ��SESSION����
include_once("conn.php");			//�������ݿ������ļ�
$sql=mysqli_query($conn,"select id from tb_user where usernc='".$_SESSION["unc"]."'");	//ִ�в�ѯ���
$info=mysqli_fetch_array($sql);			//��ȡ��ѯ���
$userid=$info['id'];					//��ȡ�û�ID	
$createtime=date("Y-m-d H:i:s");		//��ȡϵͳ��ǰʱ��
//ִ��������
if(mysqli_query($conn,"insert into tb_leaveword(userid,createtime,title,content)values('$userid','$createtime','".$_POST['title']."','".$_POST['content']."')")){
	echo "<script>alert('���Է���ɹ���');history.back();</script>";
}else{
  	echo "<script>alert('���Է���ʧ�ܣ�');history.back();</script>";
}
?>