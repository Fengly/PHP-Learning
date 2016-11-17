<?php
session_start();
include_once("conn.php");
md5($_POST["userpwd"]);
$sql=mysqli_query($conn,"select usertype from tb_user where usernc='".$_POST["usernc"]."' and userpwd='".md5(trim($_POST["userpwd"]))."'");
$info=mysqli_fetch_array($sql);
if($info!=false){
	$_SESSION["unc"]=$_POST["usernc"];
	echo "<script>alert('µÇÂ¼³É¹¦£¡');window.location.href='index.php';</script>";
}else{
  	echo "<script>alert('µÇÂ¼Ê§°Ü£¡');history.back();</script>";
}
?>