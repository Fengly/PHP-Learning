<?php
session_start();
include "config.php";
$furl=getenv("HTTP_REFERER");
if(isset($_POST['username']) && isset($_POST['password'])){
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$query="select * from mr_user where username='$username' and password='$password'";
	$result=mysqli_query($conn,$query);
	if($result){
   		if(mysqli_num_rows($result)!=0){
			$row=mysqli_fetch_array($result);
			$dljf=$row["lxdz"];
			$_SESSION['username']=$username;
       		$_SESSION['password']=$password;        	   
       		echo "<font class=\"#ff0000\">$username.��ϲ����¼�ɹ���</font>";
       		echo "<meta http-equiv=\"Refresh\" content=\"5;url=$furl\">5����ת��ǰҳ,���Ե�....";
		}else{
			echo "��������û���<b>$username</b>����ȷ�򲻴���...";
			echo "<meta http-equiv=\"Refresh\" content=\"5;url=$furl\">5���ת��ǰҳ...";
		}
	}else{
		echo "<font class=\"#ff0000\" >��¼ʧ��!!!</font>" ;
	}
}else{
	echo "<font class=\"#ff0000\" >�û��������벻��Ϊ��!!!</font>" ;
}
?>
