<?php 
session_start();	//��ʼ��session����
include "config.php";	//�������ݿ��ļ�
$furl=getenv("HTTP_REFERER");		//
echo $furl;
print_r($_POST);
if(isset($_POST['qrtj'])){		//���ύ��ť�����ж�
     	$username=$_POST['zc_username'];
	$password=$_POST['zc_password'];
     	$zsxm=$_POST['zsxm'];
	$sex=$_POST['sex'];
	$shengri=$_POST['shengri'];
	$lxdh=$_POST['lxdh'];
	$qq=$_POST['qq'];
	$tp=$_POST['ICO'];
	$email=$_POST['email'];
	$grzy=$_POST['grzy'];
	$lxdz=$_POST['lxdz'];
	$query="select * from mr_user where username='$username'";		//�����ݿ��в�ѯ�ύ���û���
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){		//�Բ�ѯ�ļ�¼�������ж�
	 	echo $username."�Ѿ���ע��!</font>";	//�û���ע���������ʾ
   		echo "<meta http-equiv=\"Refresh\" content=\"3;url=$furl\">3����ת��ע��ҳ,���Ե�...";		//��ת��ע��ҳ
	 }else{
		$passwords=md5($password);
		$tp="image/tx/".$_POST['ICO']; 
	 	$query="insert into mr_user (username,zsxm,password,sex,shengri,lxdh,qq,tx,email,grzy,lxdz)values('$username','$zsxm','$passwords','$sex','$shengri','$lxdh','$qq','$tp','$email','$grzy','$lxdz')";
	 	if(mysqli_query($conn,$query)){
	 		$_SESSION['username']=$username;	//ͨ��session��ȡ�ύ���û���
	 		$_SESSION['password']=$password;    //ͨ��session��ȡ�ύ������
	  		echo "<font class=\"red\">��ע�����Ϣ���£�</font><br>";
			echo "<li class=\"huise03\">�û���:<font color=red>".$username."<br>";		//���ע����û���
			echo "<li class=\"huise03\">E-Mail:<font color=red>".$email."<br>";   //���ע�������
			echo "<li class=\"huise03\"><font color=red>".$username."</font>��ϲ��ע��ɹ���";
			echo "<meta http-equiv=\"Refresh\" content=\"3;url=index.php\">5����ת����ҳ,���Ե�...";
	 	}else{
	 		echo "<font class='#ff0000'>ע��ʧ��!!!</font>";
	 		echo mysqli_error();
		} 
	}
}

?>
