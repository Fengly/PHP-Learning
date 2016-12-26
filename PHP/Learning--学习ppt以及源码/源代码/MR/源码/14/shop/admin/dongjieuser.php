<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");
$id=$_GET['id'];
$sql=mysqli_query($conn,"select * from tb_user where id=".$id."");
$info=mysqli_fetch_array($sql);
if($info['dongjie']==0)
   {
     mysqli_query($conn,"update tb_user set dongjie=1 where id='".$id."'");
   }
 else
  {
     mysqli_query($conn,"update tb_user set dongjie=0 where id='".$id."'"); 
  }
 header("location:lookuserinfo.php?id=".$id."");   
?>