<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");
$title=$_POST['title'];
$content=$_POST['content'];
$time1=$_POST['time1'];

mysqli_query($conn,"update tb_leaveword set title='$title',content='$content',time='$time1' where id=".$_GET['id']."");
echo "<script>alert('�û������޸ĳɹ�!');history.back();</script>";
?>