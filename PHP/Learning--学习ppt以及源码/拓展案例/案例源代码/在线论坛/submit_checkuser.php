<?php
include "config.php";
if(isset($_POST['zc_username']) && $_POST['zc_username']!=""){
	$query="select * from mr_user where username='".$_POST['zc_username']."'";
	$result=mysqli_query($conn,$query);
	$nn=mysqli_num_rows($result);
	if ($nn==1) {
		echo"<script>alert('用户名已经存在，不能注册');history.back();</script>";
	} else {
		echo"<script>alert('恭喜您，可以用此用户名进行注册');history.back();</script>";
	}	 
}
?>
