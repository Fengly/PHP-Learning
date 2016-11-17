<?php
// 创建cookie数组
setcookie("user[1]", "张三");
setcookie("user[2]", "李四");
setcookie("user[super]", "王小二");
header("location:cookie.php");
?>



<?php
date_default_timezone_set("Asia/Hong_Kong");
if (!isset($_COOKIE["visit_time"])) {
    setcookie("visit_time", date("Y-m-d H:i:s"), time()+60);
    echo "欢迎您第一次访问该网站!"."<br>";
} else {
    setcookie("visit_time", date("Y-m-d H:i:s"), time()+60);
    echo "您上次访问时间为: ".$_COOKIE["visit_time"]."<br>";
}
echo "您本次访问时间为: ".date("Y-m-d H:i:s")."<br>";
?>


