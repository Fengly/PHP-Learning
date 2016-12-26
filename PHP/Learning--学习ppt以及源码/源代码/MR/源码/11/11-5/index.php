<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>将数组中的数据保存到Session中</title>
<style type="text/css">
<!--
.STYLE1 {color: #202A00}
.STYLE3 {
	color: #202A00;
	font-size: 13px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="995" height="626" border="0" cellpadding="0" cellspacing="0" background="images/bg.jpg">
  <tr>
    <td width="204" height="267">&nbsp;</td>
    <td width="550">&nbsp;</td>
    <td width="219">&nbsp;</td>
  </tr>
  <tr>
    <td height="220">&nbsp;</td>
    <td class="STYLE1">
	  <span class="STYLE3">
	  <?php 
	  	session_start();						//初始化Session变量
	$array=array('PHP从入门到精通','PHP网络编程自学手册','PHP函数参考大全','PHP开发典型模块大全','PHP网络编程标准教程','PHP程序开发范例宝典');
	$_SESSION['mr_book']=$array;
		foreach($_SESSION['mr_book'] as $key=>$value){			//读取Session数组中存储的数据
			if($value=="PHP开发典型模块大全"){					//判断当$value的值等于PHP开发典型模块大全时换行
				$br="<br><br>";
			}else{
				$br="&nbsp;&nbsp;";
			}
			echo $value.$br;									//输出Session数组中的内容
		}
	?>
    </span>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
