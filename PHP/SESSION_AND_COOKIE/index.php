<?php
//// 启动Session
//session_start();
//$_SESSION['name'] = null;
//// 定义字符串
//$string = "PHP从基础到项目实战";
//$array = array('PHP从入门到精通','PHP网络编程自学手册','PHP函数参考大全','PHP开发典型模块大全','PHP网络教程标准教程','PHP程序开发范例宝典');
//$_SESSION['my_book'] = $array;
//// 判断Session会话变量是否存在
//if (!isset($_SESSION['name'])) {
//    $_SESSION['name'] = $string;
//    echo $_SESSION['name'];
//} else {
//    echo $_SESSION['name'];
//}
?>
<!---->
<?php
//foreach ($_SESSION['my_book'] as $key=>$value) {
//    if ($value == 'PHP开发典型模块大全') {
//        $br = "<br><br>";
//    } else {
//        $br = "&nbsp;&nbsp;";
//    }
//    echo $value.$br;
//}
?>
<?php
//// 删除单个会话
//unset($_SESSION['name']);
//// 删除多个会话
//session_unset(); // 第一种
//$_SESSION = array(); // 第二种 赋值空数组
//// 销毁会话
//session_destroy();
include "11-6/index.php";
//
?>


<?php
// Cookie 的操作

?>
<body bgcolor="aqua">

</body>



