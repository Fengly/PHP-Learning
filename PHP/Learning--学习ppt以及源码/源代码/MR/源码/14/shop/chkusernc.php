<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");
$nc=trim(isset($_GET['nc'])?$_GET['nc']:"");
if($nc==""){
	echo 0;
}else{
	$sql=mysqli_query($conn,"select * from tb_user where name='".$nc."'");  
	$info=mysqli_fetch_array($sql);
	if($info==true){
		echo 1;
	}else{
		echo 2;
	} 
}
?>
