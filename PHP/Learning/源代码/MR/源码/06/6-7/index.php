<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type='text/css' rel='stylesheet' href='css/in.css'>
<title>应用$_SERVER[ ]全局数组获取脚本所在地的IP地址及服务器和客户端的相关信息</title>
</head>
<body>
<table align="center"id="__01" width="350" height="261" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="3">
			<img src="images/bg_2_01.jpg" width="350" height="21" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/bg_2_02.jpg" width="16" height="240" alt=""></td>
		<td width="318" height="215" class="one">
		<?php
			echo "当前服务器IP地址是：<b>".$_SERVER['SERVER_ADDR']."</b><br>";
			echo "当前服务器的主机名称是：<b>".$_SERVER['SERVER_NAME']."</b><br>";
			echo "客户端IP地址是：<b>".$_SERVER['REMOTE_ADDR']."</b><br>";
			echo "客户端连接到主机所使用的端口：<b>".$_SERVER['REMOTE_PORT']."</b><br>";
			echo "当前运行的脚本所在文档的根目录：<b>".$_SERVER['DOCUMENT_ROOT']."</b><br>";
		?>

		</td>
		<td rowspan="2">
			<img src="images/bg_2_04.jpg" width="16" height="240" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/bg_2_05.jpg" width="318" height="25" alt=""></td>
	</tr>
</table>
</body>
</html>