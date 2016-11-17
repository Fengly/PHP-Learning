<?php
session_start();
header("content-type:text/html;charset=utf-8");
include "conn/conn.php";
$user = $_POST["user"];
$pwd = $_POST["pwd"];
$sql = "select * from tb_member where name = '".$user."' and password = '".$pwd."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['user'] = $user;
    $_SESSION['time'] = time();
    echo "<script>alert('登录成功!');location='show.php';</script>";
} else {
    echo "<script>alert('用户名或密码错误!');location='index.php';</script>";
}
?>