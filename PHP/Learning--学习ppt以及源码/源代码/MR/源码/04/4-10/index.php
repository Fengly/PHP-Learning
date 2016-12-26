<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>计算1到100之间所有奇数的和</title>
</head>

<body>
<?php
$sum=0;
for($i=1;$i<=100;$i++){
	if($i%2==0){
		continue;
	}
	$sum=$sum + $i;
}
echo  $sum;
?>

</body>
</html>
