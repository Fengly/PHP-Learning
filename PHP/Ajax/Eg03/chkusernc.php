<?php
header("Content-type: text/html; charset=utf8");
include "Conn/conn.php";
$nc = trim(isset($_GET['nc'])?$_GET['nc']:"");
if ($nc == "") {
    echo 0;
} else {
    $sql=mysqli_query($conn,"select * from tb_user where name='".$_GET['nc']."'");
    $info=mysqli_fetch_array($sql);
    if($info==true) {
        echo 1;
    } else {
        echo 2;
    }
}
?>