<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");
$title=$_POST['title'];
$content=$_POST['content'];
$spid=$_GET['id'];
$time=date("Y-m-j");
session_start();
$sql=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");
$info=mysqli_fetch_array($sql);
$userid=$info['id'];
mysqli_query($conn,"insert into tb_pingjia (userid,spid,title,content,time) values ('$userid','$spid','$title','$content','$time') ");
echo "<script>alert('���۷���ɹ�!');history.back();</script>";
?>