<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ȡ�����ַ���</title>
</head>
<body>
<?php
function msubstr($str,$start,$len){  		//$str���ַ�����$start�ǽ�ȡ�ַ�������ʼλ�ã�$len�ǽ�ȡ�ĳ���
	$tmpstr="";//��������
	$strlen=$start+$len;				//��$strlenָ����ȡ�ַ����Ľ���λ��
	for($i=$start;$i<$strlen;$i++){		//ͨ��forѭ����䣬ѭ����ȡ�ַ���
		if(ord(substr($str,$i,1))>0xa0){	//����ַ������׸��ֽڵ�ASCII����ֵ����0xa0�����ʾΪ����
 			$tmpstr.=substr($str,$i,2);	//ÿ��ȡ����λ�ַ���������$tmpstr������һ������
 			$i++;					//�����Լ�1
		}else{					//������Ǻ��֣���ÿ��ȡ��һλ�ַ���������$tmpstr
  			$tmpstr.=substr($str,$i,1);
		}
	}
	return $tmpstr;					//����ַ���
}
$str="���տƼ���˾��һ���Լ�����������Ϊ���ĵĸ߿Ƽ���ҵ��������ʼ����������ҵ����������������ֻ����������������������ϵͳ�ۺ�Ӧ���Լ���ҵ����������վ�����������漰�������������ơ�������������Ӫ�����������ҵ";					//�����ַ���
if(strlen($str)>40){ 					//�ж��ı����ַ��������Ƿ����40
	echo msubstr($str,0,40)."����";		//����ı���ǰ40���ַ�����Ȼ�����ʡ�Ժ�
}else{							//����ı����ַ�������С��40
	echo $str; 						//ֱ������ı�
}
?>
</body>
</html>
