<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");
mysqli_query($conn,"delete from tb_ip");
echo "<script>alert('访客记录清除成功!');history.back();</script>";
?>