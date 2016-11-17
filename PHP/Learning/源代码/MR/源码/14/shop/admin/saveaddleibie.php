<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
$leibie=$_POST['leibie'];
include("conn/conn.php");
$sql=mysqli_query($conn,"select * from tb_type where typename='".$leibie."'");
$info=mysqli_fetch_array($sql);
if($info!=false){
 echo"<script>alert('该类别已经存在!');window.location.href='addleibie.php';</script>";
exit;
}
mysqli_query($conn,"insert into tb_type(typename) values ('$leibie')");
echo"<script>alert('新类别添加成功!');window.location.href='addleibie.php';</script>";
?>