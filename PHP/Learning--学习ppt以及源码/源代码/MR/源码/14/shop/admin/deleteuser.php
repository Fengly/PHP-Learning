<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");
while(list($name,$value)=each($_POST))
  {
    mysqli_query($conn,"delete from tb_user where id=".$value.""); 
	mysqli_query($conn,"delete from tb_pingjia where userid=".$value."");
	mysqli_query($conn,"delete from tb_leaveword where userid=".$value."");
  }
header("location:edituser.php");
?>