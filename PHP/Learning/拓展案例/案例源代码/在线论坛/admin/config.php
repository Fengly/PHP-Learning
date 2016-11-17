<?php  
$conn=mysqli_connect("localhost","root","111");		//连接数据库服务器
mysqli_select_db($conn,"mr_mysql");				//选择数据库
mysqli_query($conn,"set names gb2312");						//设置编码格式
?>