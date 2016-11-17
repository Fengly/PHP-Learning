<?php
$conn = mysqli_connect("localhost","root","root","db_database12") or die("连接数据库失败!".mysqli_error($conn));
mysqli_query($conn, "set names utf-8");
?>