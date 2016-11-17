<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>elseif语句</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
}
-->
</style></head>
<body>
<div align="center">
<?php
	$score=95;
	if ($score >=90){								//判断小明的期末考试成绩是否在90分以上
		echo "小明期末考试成绩优秀";				//如果是，说明小明期末考试成绩优秀
	}elseif($score<90 && $score>=80){				//否则判断小明期末考试成绩是否在80-90之间
		echo "小明期末考试成绩良好";				//如果是，说明小明期末考试成绩良好
	}elseif($score<80 && $score>=60){				//否则判断小明期末考试成绩是否在60-80之间
		echo "小明期末考试成绩及格";				//如果是，说明小明期末考试成绩及格
	}else{											//如果两个判断都是false，则输出默认值
		echo "小明期末考试成绩不及格";				//说明小明期末考试成绩不及格
	}
?>
</div>
</body>
</html>
