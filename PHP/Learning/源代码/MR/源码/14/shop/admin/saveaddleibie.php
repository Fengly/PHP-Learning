<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
$leibie=$_POST['leibie'];
include("conn/conn.php");
$sql=mysqli_query($conn,"select * from tb_type where typename='".$leibie."'");
$info=mysqli_fetch_array($sql);
if($info!=false){
 echo"<script>alert('������Ѿ�����!');window.location.href='addleibie.php';</script>";
exit;
}
mysqli_query($conn,"insert into tb_type(typename) values ('$leibie')");
echo"<script>alert('�������ӳɹ�!');window.location.href='addleibie.php';</script>";
?>