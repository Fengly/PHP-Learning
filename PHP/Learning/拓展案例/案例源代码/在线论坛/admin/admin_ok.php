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
		echo "<font color=\"#ff0000\">恭喜您登录成功！</font>"; 
	 	echo "<meta http-equiv=\"refresh\" content=\"2; url=index.php\">2秒中转入前页,...";
	 }else{
	 	echo "<font color=\"#ff2200\">你输入的用户名ID<b>$user</b>不存在或密码不正确!!";
	 	echo "<meta http-equiv=\"refresh\" content=\"3 url=$furl\"> 3秒中转入前页,请稍等...";
	 }
}else{
	echo "<font color=\"#6633cc\">登录失败!!";
}
?>   
