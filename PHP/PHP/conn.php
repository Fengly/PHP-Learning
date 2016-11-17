<?php

//$user = 'root';
//$password = 'root';
//$db = 'inventory';
//$host = 'localhost';
//$port = 3306;
//
//$link = mysql_connect(
//    "$host:$port",
//    $user,
//    $password
//);
//$db_selected = mysql_select_db(
//    $db,
//    $link
//);
//echo "<script type='text/javascript'>alert('连接数据库成功!');</script>";



//$conn = @mysqli_real_connect('localhost', 'root', 'root', 'TestDB', '3306', '/Applications/MAMP/tmp/mysql/mysql.sock');
//if (!$conn) {
//    die('could not connect: '. mysqli_errno($conn));
//}
//mysqli_select_db($conn, 'TestDB');
//$user = 'root';
//$password = 'root';
//$db = 'TestDB';
//$host = 'localhost';
//$port = 3306;
//$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
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

//$user = 'root';
//$password = 'root';
//$db = 'TestDB';
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


$host = "localhost";
$user = "root";
$passWord = "root";
$conn = mysqli_connect($host, $user, $passWord);
if (mysqli_select_db($conn, "MyDB")) {

    echo "<script type='text/javascript'>alert('连接数据库成功!');</script>";
} else {
    echo "<script type='text/javascript'>alert('连接数据库失败!');</script>";
}


?>