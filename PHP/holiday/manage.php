<?php
session_start();
if(isset($_SESSION['name'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
.STYLE1 {	font-size: 36px;
	color: #990000;
	font-weight: bold;
}
.STYLE2 {color: #990000}
body,td,th {
	font-size: 12px;
}
-->
</style>
</head>

<body>
<div align="center">
  <table id="__01" width="800" height="600" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><a href="indexs.php"><img src="images/manage_01.gif" alt="" width="800" height="201" border="0" /></a></td>
    </tr>
    <tr>
      <td><img src="images/manage_02.gif" width="140" height="251" alt="" /></td>
      <td width="523" height="251" align="center" valign="top" background="images/manage_03.gif"><table width="464" height="28" border="0" align="center" cellpadding="0"
			cellspacing="0">
        <tr align="center" valign="middle">
          <th width="89" height="25" align="center" valign="middle"><span
					class="STYLE4">项目名</span></th>
          <th width="54" align="center" valign="middle"><span class="STYLE4">大小</span></th>
          <th width="134" align="center" valign="middle"><span class="STYLE4">创建日期</span></th>
          <th width="160" align="center" valign="middle"><span class="STYLE4">最后修改时间</span></th>
          <th width="118" align="center" valign="middle"><span class="STYLE4">操作</span></th>
        </tr>
<?php
if (! isset ( $_GET ['catalog'] ) || empty ( $_GET ['catalog'] ))
	$current_directory = getcwd (); //获得脚本目录
else
	$current_directory = $_GET ['catalog'];
chdir ( iconv ( "utf-8", "gb2312", $current_directory ) ); //改变当前目录
echo "<span class='STYLE4'>当前目录:</span><span class='STYLE2'>" . iconv ( "gb2312", "utf-8", getcwd () ) . "</span><br>";
$ml = opendir ( iconv ( "utf-8", "gb2312", $current_directory ) ); //打开目录
while ( $gain_directory = readdir ( $ml ) ) { //循环读取目录中的目录及文件
	echo "<tr><td align='center' valign='middle'>";
	if (is_dir ( $gain_directory )) { //判断是目录
		if ($gain_directory == ".") {
			$catalog = getcwd (); //显示当前目录
			$catalog = iconv ( "gb2312", "utf-8", $catalog );
			echo "<a href=manage.php?catalog=".urlencode($catalog)."><span class='style1'>锁定</span></a>";
		} elseif ($gain_directory == "..") {
			$catalog = getcwd () . "\\.."; //上级目录
			$catalog = iconv ( "gb2312", "utf-8", $catalog );
			if($catalog==""){		
				echo "<a href=manage.php?catalog=".urlencode($catalog)."><span class='style1'>上级目录</span></a>";
			}else{
				echo "<a href=manage.php?catalog=".urlencode($catalog)."><span class='style1'>上级目录</span></a>";
			}
		} else {
			$catalog = getcwd () . "\\$gain_directory"; //子目录
			$catalog = iconv ( "gb2312", "utf-8", $catalog );
			echo "<a href=manage.php?catalog=".urlencode($catalog).">" . iconv ( "gb2312", "utf-8", $gain_directory ) . "</a>";
		}
	} else {
		$ext = substr ( $gain_directory, strrpos ( $gain_directory, "." ) );
		if (strtoupper ( $ext ) == ".html" || strtoupper ( $ext ) == ".gif" || strtoupper ( $ext ) == ".jpg" ) {
			$catalog = getcwd ();
			$catalog = iconv ( "gb2312", "utf-8", $catalog );
			echo  iconv ( "gb2312", "utf-8", $gain_directory ) ;
		} else {
			echo iconv ( "gb2312", "utf-8", $gain_directory );
		}
	}
	if (is_dir ( $gain_directory ))
		$file_size = "目录";
	else
	$file_size = filesize ( $gain_directory );
	echo "<td align='center' valign='middle'>$file_size</td>";
	$create_time = date ( "Y-m-d H:i:s", filectime ( $gain_directory ) );
	echo "<td align='center' valign='middle'>" . iconv ( "gb2312", "utf-8", $create_time ) . "</td>";
	$update_time = date ( "Y-m-d H:i:s", filemtime ( $gain_directory ) );
	echo "<td align='center' valign='middle'>$update_time</td>";
	echo "<td align='center' valign='middle'>";
	if ($gain_directory == ".") {
		$catalog = getcwd (); //显示当前目录
		echo "删除";
	} elseif ($gain_directory == "..") {
		$catalog = getcwd () . "\\.."; //上级目录
		echo "删除";
	} else {
		$catalog = getcwd () . "\\$gain_directory"; //子目录
		echo "<a href='delete.php?catalog=".urlencode($catalog)."&filename=" . urlencode(getcwd ()) . "' title='删除目录或者文件' >删除</a>";
	}
	echo "</td>";
	echo "</tr>";
}
closedir ( $ml );
?>
      </table></td>
      <td><img src="images/manage_04.gif" width="137" height="251" alt="" /></td>
    </tr>
    <tr>
      <td colspan="3"><img src="images/manage_05.gif" width="800" height="148" alt="" /></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
}else{
	echo "<script>alert('请先登录！');window.location.href='user.php';</script>";
}
?>