<?php
header("Content-type: text/html; charset=utf8");
include "conn/conn.php";
$admin_name = $_POST['name'];
$admin_pwd = $_POST['pwd'];
class Chinput {
    var $name;
    var $pwd;
    function __construct($x, $y) {
        $this->name = $x;
        $this->pwd = $y;
    }
    function checkinput() {
        global $conn;
        $sql = "select * from tb_admin where name='".$this->name."'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($result);
        if ($rows==false) {
            echo "<script language='JavaScript'>alert('该用户名不存在');history.back();</script>";
            exit;
        } else {
            if ($rows['pwd']==$this->pwd) {
                header("location:default.php");
            } else {
                echo "<script language='JavaScript'>alert('密码输入错误！');history.back();</script>";
                exit;
            }
        }
    }
}
$obj=new Chinput(trim($_POST['name']),md5(trim($_POST['pwd'])));
//echo md5(trim($_POST['pwd']));
$obj->checkinput();
?>