<?php
include "config.php";
if(isset($_POST['zc_username']) && $_POST['zc_username']!=""){
	$query="select * from mr_user where username='".$_POST['zc_username']."'";
	$result=mysqli_query($conn,$query);
	$nn=mysqli_num_rows($result);
	if ($nn==1) {
		echo"<script>alert('�û����Ѿ����ڣ�����ע��');history.back();</script>";
	} else {
		echo"<script>alert('��ϲ���������ô��û�������ע��');history.back();</script>";
	}	 
}
?>
