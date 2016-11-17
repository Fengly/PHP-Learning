<?php
	header('Content-type: text/html;charset=GB2312'); 			//指定发送数据的编码格式
	include_once 'conn/conn.php';								//连接数据库
	$user =iconv('UTF-8','gb2312',$_POST['users']);				//获取Ajax传递的值,并实现字符编码转换
	$number = iconv('UTF-8','gb2312',$_POST['numbers']);		//获取Ajax传递的值,并实现字符编码转换
	$explains = iconv('UTF-8','gb2312',$_POST['explaines']);	//获取Ajax传递的值,并实现字符编码转换	
	$sql="insert into tb_administrator(user,number,explains)values('$user','$number','$explains')";
	$result=mysqli_query($conn,$sql);						//执行添加语句
	if($result){
		$sqles="select * from tb_administrator ";
		$results=mysqli_query($conn,$sqles);
		echo "<table width='500' border='1' cellpadding='1' cellspacing='1' bordercolor='#FFFFCC' bgcolor='#666666'>";
		echo "<tr><td height='30' align='center' bgcolor='#FFFFFF'>ID</td><td align='center' bgcolor='#FFFFFF'>名称</td><td align='center' bgcolor='#FFFFFF'>编号</td><td align='center' bgcolor='#FFFFFF'>描述</td></tr>";
		while($myrow=mysqli_fetch_array($results)){ 			//循环输出查询结果
 			echo "<tr><td height='22' bgcolor='#FFFFFF'>".$myrow['id']."</td>";
  			echo "<td bgcolor='#FFFFFF'>".$myrow['user']."</td>";
			echo "<td bgcolor='#FFFFFF'>".$myrow['number']."</td>";
			echo "<td bgcolor='#FFFFFF'>".$myrow['explains']."</td>";
			echo "</tr>";
		}
		echo "</table>";  
	}	
?>
