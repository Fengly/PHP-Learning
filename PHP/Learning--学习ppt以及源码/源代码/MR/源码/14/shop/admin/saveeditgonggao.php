<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
  $title=$_POST['title'];
  $content=$_POST['content'];
  include("conn/conn.php");
  mysqli_query($conn,"update tb_gonggao set title='$title',content='$content' where id='".$_POST[id]."'");
  echo "<script>alert('�����޸ĳɹ�!');history.back();</script>";
?>