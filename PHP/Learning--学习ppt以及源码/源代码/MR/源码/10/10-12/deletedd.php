<?php
	header("Content-type: text/html; charset=gb2312"); //设置文件编码格式
  	include("conn/conn.php");//连接数据库文件
  	while(list($value,$name)=each($_POST)){ //应用while循环语句，删除指定的订单信息
     	mysqli_query($conn,"delete from tb_dingdan where id='".$value."'");//执行删除操作
   	}
 	header("location:lookdd.php");//重新定位到查看订单页
?>