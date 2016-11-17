<?php
$conn = mysqli_connect("localhost", "root", "root", "MyDB") or die("数据库连接失败!".mysqli_error($conn));
if ($conn) {
    mysqli_query($conn, "set names utf8");
}
?>