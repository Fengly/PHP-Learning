<?php
include_once("conn.php");
if(mysqli_query($conn,"delete from tb_leaveword where id='".$_GET["id"]."'")){
  	echo "<script>alert('����ɾ���ɹ���');history.back();</script>";
}else{
  	echo "<script>alert('����ɾ��ʧ�ܣ�');history.back();</script>";
}
?>