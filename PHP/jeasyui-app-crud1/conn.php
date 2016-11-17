<?php

//$conn = @mysql_connect('127.0.0.1','root','');
//if (!$conn) {
//	die('Could not connect: ' . mysql_error());
//}
//mysql_select_db('mydb', $conn);
//
//$user = 'root';   Riches
//$password = 'root';
//$db = 'inventory';
//$host = 'localhost';
//$port = 3306;
//
//$conn = mysqli_init();

//$success = mysqli_real_connect(
//    $conn,
//    $host,
//    $user,
//    $password,
//    $db,
//    $port
//);
//if (!$success) {
//    echo "fail";
//}
//
//echo $success;
//printf($success);

//$user = 'root';
//$password = 'root';
//$db = 'inventory';
//$host = '127.0.0.1';
//$port = 3306;
//$socket = 'localhost:/Applications/MAMP/tmp/mysql/mysql.sock';
//
//$link = mysqli_init();
//$success = mysqli_real_connect(
//    $link,
//    $host,
//    $user,
//    $password,
//    $db,
//    $port,
//    $socket
//);
//echo $link;
echo "<script>alert('lianje ')</script>";
$conn = mysqli_connect("localhost", "root", "root", "MyDB") or die("连接数据库服务器失败！".mysqli_error($conn)); //连接MySQL服务器，选择数据库
mysqli_query($conn,"set names utf8");
if ($conn) {
    echo "<script>alert('chengg')</script>";
} else {
    echo "<script>alert('shib')</script>";
}
?>


