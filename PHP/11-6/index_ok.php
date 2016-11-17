<meta charset="utf-8">
<?php
session_start();
$user = $_POST["user"];
$pwd = $_POST["pass"];
if ($user == "mr" && $pwd == "mrsoft") {
	$_SESSION["user"] = $user;
	$_SESSION["pass"] = $pwd;
	echo "<script>alert('欢迎您的到来!');window.location.href='main.php';</script>";
} else {
	echo "<script>alert('账号或密码错误!');window.location.href='index.php';</script>";
	session_destroy();
}
?>