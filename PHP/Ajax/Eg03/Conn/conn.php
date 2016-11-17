<?php
$conn = mysqli_connect("localhost", "root", "root", "db_database13") or die("数据库连接失败".mysqli_error($conn));
mysqli_query($conn, "set names utf8");
?>