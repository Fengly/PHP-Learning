<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");
mysqli_query($conn,"delete from tb_ip");
echo "<script>alert('�ÿͼ�¼����ɹ�!');history.back();</script>";
?>