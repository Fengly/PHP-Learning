<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>比较静态变量和普通变量的区别</title>
</head>

<body>
<?php
function zdy (){
   static $message = 0 ;               	//初始化静态变量
   $message+=1;							//静态变量加1
   echo $message." " ;					//输出静态变量
}
function zdy1(){
   $message = 0 ;						//声明函数内部变量（局部变量）
   $message += 1 ;						//局部变量加1
   echo $message." " ;  				//输出局部变量
}
for ( $i=0 ; $i<10 ; $i++ )     zdy() ;  //输出1～10
echo "<br>";
for ($i=0 ; $i<10 ; $i++ )     zdy1() ;  //输出10个1
?>
</body>
</html>
