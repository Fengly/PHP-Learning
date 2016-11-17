<?php
session_start();										//初始化SESSION变量
if($_POST['user']=="mr" && $_POST['pass']=="mrsoft"){	//判断提交的用户名和密码是否正确
$_SESSION['user']=$_POST['user'];						//如果正确，将其赋给SESSION变量
$_SESSION['pass']=$_POST['pass'];
	echo "<script>alert('欢迎您的到来!');window.location.href='main.php';</script>";

}else{
	echo "<script>alert('您输入的用户名和密码不正确!');window.location.href='index.php';</script>";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">