<?php
include_once("conn.php");
if(mysqli_query($conn,"delete from tb_leaveword where id='".$_GET["id"]."'")){
  	echo "<script>alert('ÁôÑÔÉ¾³ı³É¹¦£¡');history.back();</script>";
}else{
  	echo "<script>alert('ÁôÑÔÉ¾³ıÊ§°Ü£¡');history.back();</script>";
}
?>