<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>elseif���</title>
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
	if ($score >=90){								//�ж�С������ĩ���Գɼ��Ƿ���90������
		echo "С����ĩ���Գɼ�����";				//����ǣ�˵��С����ĩ���Գɼ�����
	}elseif($score<90 && $score>=80){				//�����ж�С����ĩ���Գɼ��Ƿ���80-90֮��
		echo "С����ĩ���Գɼ�����";				//����ǣ�˵��С����ĩ���Գɼ�����
	}elseif($score<80 && $score>=60){				//�����ж�С����ĩ���Գɼ��Ƿ���60-80֮��
		echo "С����ĩ���Գɼ�����";				//����ǣ�˵��С����ĩ���Գɼ�����
	}else{											//��������ж϶���false�������Ĭ��ֵ
		echo "С����ĩ���Գɼ�������";				//˵��С����ĩ���Գɼ�������
	}
?>
</div>
</body>
</html>
