
<meta charset="utf-8">
<?php
if (strlen($_POST["pwd"]) < 6) {
    echo "<script>alert('用户密码长度不得少于6位! 请重新输入'); history.back()</script>";
} else {
    echo "用户信息输入合法";
}
?>