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
       		echo "<font class=\"#ff0000\">$username.恭喜您登录成功！</font>";
       		echo "<meta http-equiv=\"Refresh\" content=\"5;url=$furl\">5秒钟转入前页,请稍等....";
		}else{
			echo "您输入的用户名<b>$username</b>不正确或不存在...";
			echo "<meta http-equiv=\"Refresh\" content=\"5;url=$furl\">5秒后转入前页...";
		}
	}else{
		echo "<font class=\"#ff0000\" >登录失败!!!</font>" ;
	}
}else{
	echo "<font class=\"#ff0000\" >用户名和密码不能为空!!!</font>" ;
}
?>
