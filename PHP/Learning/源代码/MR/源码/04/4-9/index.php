<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>for循环语句制作乘法口诀表</title>
</head>

<body>
<?php  
/*
输出表格的对应标签，这里不要弄错HTML的表格标签的位置，否则显示效果会存在差异
*/
for ($i=1;$i<=9;$i++){				//外层for循环语句
  echo "<table border=1 cellspacing=0 cellpadding=0 bordercolor=#cccccc>";				
  echo "<tr>";
  for ($j=1;$j<=$i;$j++){			//输出台阶式表格的关键
     echo "<td width=60 align=center>";
     echo "$j*$i=".$i*$j ;  		//输出乘法算式以及计算结果
     echo "</td>";
  }
  echo "</tr>";
  echo "</table>"; 
}
?>
</body>
</html>
