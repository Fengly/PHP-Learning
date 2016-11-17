<?php
session_start();									//初始化session变量
if(!isset($_SESSION['username'])) {                      	//判断用户是否已经登录
  echo "<script>alert('请先登录后购物!');location.href='login.php';</script>";  //如果用户未登录，则提示用户先登录并跳转到登录页面
  exit;                                                    //用exit语句停止程序的继续执行
 } else {
     ?>
    <html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <div align="center">
        <label>?</label>
    </div>
    </body>
    </html>
<?php
}
?>
