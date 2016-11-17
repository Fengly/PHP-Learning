<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include("conn/conn.php");//包含数据库连接文件
$nc=trim(isset($_GET['nc'])?$_GET['nc']:"");//获取通过GET方法传递的值
if($nc==""){//如果值为空
	echo 0;//输出0
}else{
	$sql=mysqli_query($conn,"select * from tb_user where name='".$nc."'");  //执行查询
	$info=mysqli_fetch_array($sql);//将查询结果返回为数组
	if($info==true){//如果查询结果为真
		echo 1;//输出1
	}else{
		echo 2;//输出2
	} 
}
?>
