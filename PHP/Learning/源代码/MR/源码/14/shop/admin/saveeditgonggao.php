<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
  $title=$_POST['title'];
  $content=$_POST['content'];
  include("conn/conn.php");
  mysqli_query($conn,"update tb_gonggao set title='$title',content='$content' where id='".$_POST[id]."'");
  echo "<script>alert('公告修改成功!');history.back();</script>";
?>