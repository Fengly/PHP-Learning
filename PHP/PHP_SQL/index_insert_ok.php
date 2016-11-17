<?php
header("content-type: text/html; charset=utf-8");
include "conn.php";

$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$phone = $_REQUEST['tel'];
$email = $_REQUEST['email'];
//print_r($_POST);
if (($firstname && $lastname && $phone && $email)) {
    $sql = "insert into myUsers(firstname,lastname,phone,email) values('$firstname','$lastname','$phone','$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "成功,单击<a href = 'index.php'>这里</a>查看";
    } else {
        echo "失败,单击 <a href = 'javascript:onclick = history.go(-1)'>这里</a>返回";
    }
} else {
    echo "输入不允许为空。单击 <a href = 'javascript:onclick = history.go(-1)'>这里</a>返回";
}
?>