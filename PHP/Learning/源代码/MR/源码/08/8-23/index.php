<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用htmlentities()函数将字符串转换成HTML格式</title>
</head>

<body>
<table width="832" height="705" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bg.JPG">
  <tr>
    <td height="240" colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="right" >转换的结果为:</td>
    <td width="413" height="120" align="left" style="padding-left:8px;">
    <?php
	$str='<table width="300" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#0198FF">
	  <tr>
		<td align="center" height="35"  bgcolor="#FFFFFF">明日科技--用今日的辛勤工作，换明日百倍回报！</td>
	  </tr>
	  <tr>
		<td align="center" bgcolor="#FFFFFF" ><img src="images/beg.JPG"></td>
	  </tr>
	</table>';
	echo htmlentities($str,ENT_QUOTES,"utf-8")."<br>";   //设置转换的字符集为"GBK"
	?>
    </span>	</td>
  </tr>
  <tr>
    <td height="120" align="right">不转换输出结果:</td>
    <td align="left" style="padding-left:8px;"><?php echo $str; ?></span></td>
  </tr>
  <tr>
    <td height="225" align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>
