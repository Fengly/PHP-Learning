<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>应用break跳转控制语句跳出循环</title>
</head>
<body>
<?php
	for($i=1;$i<=4;$i++){
	if($i==4){
		break;
	}	
?>
<input type="radio" name="head" value="<?php echo("images/".$i.".jpg");?>" />
<img src="<?php echo("images/".$i.".jpg");?>" width="90" height="90" id="head"/>
<?php
   }
?>
</body>
</html>
 