<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
 include("conn/conn.php");
 $title=$_POST['title'];
 $content=$_POST['content'];
 $time=date("Y-m-j");
 mysqli_query($conn,"insert into tb_gonggao (title,content,time) values ('$title','$content','$time')");
 echo "<script>alert('������ӳɹ�!');history.back();</script>";
?>