<?php 
session_start(); 
include("config.php");
$furl=getenv("http_referer");
$user=$_POST['user'];
$pass=$_POST['pass'];
$query="select user from mr_gly where user='".$user."' and pass='".$pass."'";
$result=mysqli_query($conn,$query);
if($result){
	if(mysqli_num_rows($result)!=0){
		$_SESSION['user']=$user;
	 	$_SESSION['pass']=$pass;
		echo "<font color=\"#ff0000\">��ϲ����¼�ɹ���</font>"; 
	 	echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php\">2����ת��ǰҳ,...";
	 }else{
	 	echo "<font color=\"#ff2200\">��������û���ID<b>$user</b>�����ڻ����벻��ȷ!!";
	 	echo "<meta http-equiv=\"refresh\" content=\"3 url=$furl\"> 3����ת��ǰҳ,���Ե�...";
	 }
}else{
	echo "<font color=\"#6633cc\">��¼ʧ��!!";
}
?>   
