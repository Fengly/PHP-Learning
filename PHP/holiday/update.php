<?php
header("content-type:text/html;charset=utf-8");
include("conn/conn.php");
if(isset($_GET['abrogation'])){
	$update=mysqli_query($conn,"delete from tb_01 where id='".$_GET['abrogation']."'");
	if($update){
		echo "<script>alert('假日信息取消成功！');window.location.href='cancel.php';</script>";
	}else{
		echo "<script>alert('假日信息取消失败！');window.location.href='cancel.php';</script>";
	}
}
?>