<?php
	$conn=mysqli_connect("localhost","root","111","db_database10") or die("���ݿ���������Ӵ���".mysql_error());
	//mysql_select_db("db_shop",$conn) or die("���ݿ���ʴ���".mysql_error());
	mysqli_query($conn,"set character set gb2312");
	mysqli_query($conn,"set names gb2312");
?>
