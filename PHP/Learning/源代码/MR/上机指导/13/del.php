<?php
    include_once("conn/conn.php");//包含数据库连接文件
	$id=$_GET['id'];//把传过来的参数值赋给变量$i
	$sql=mysqli_query($conn,"delete from tb_demo02 where id=".$id);//根据参数值执行相应的删除操作
	if($sql){//如果操作的返回值为true
	  $reback=1;//把变量$reback的值设为1
	}else{
	  $reback=0;//否则变量$reback的值设为0
	}
	echo $reback;//输出变量$reback的值
?>
