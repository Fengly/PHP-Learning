<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
 include("conn/conn.php");
  while(list($name,$value)=each($_POST))
  {
    mysqli_query($conn,"delete from tb_gonggao where id='".$value."'");
  
  }
 header("location:admingonggao.php");  
?>