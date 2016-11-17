<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/4
 * Time: 17:28
 */
//
//$host = "localhost";
//$name = "root";
//$passdword = "root";
//$db = "MyDB";
//$conn = mysqli_connect($host, $name, $passdword);
//$result = mysqli_select_db($conn, $db);
//if ($result) {
//    echo "<script type='text/javascript'>alert('连接数据库成功!');</script>";
//} else {
//    echo "<script type='text/javascript'>alert('连接数据库失败!');</script>";
//}

$conn = mysqli_connect("localhost", "root", "root") or die("数据库连接失败!".mysqli_error());
mysqli_select_db($conn, "MyDB");

?>