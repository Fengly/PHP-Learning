<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");
while(list($name,$value)=each($_POST))
 {
     $id=$value;
     mysqli_query($conn,"delete from tb_pingjia where id=".$id."");
 
 }
header("location:editpinglun.php");
?>