<?php
$array1 = array("asp" => "ʵ��Ӧ��", "php" => "�����ֲ�", "java" => "����Ӧ��");//��������
$array2 = array("asp" => "ʵ����ȫ", "������ȫ", "����Ӧ��");		//��������
$result = array_diff_key($array1, $array2);		//������������Ĳ
print_r($result);									//��������Ĳ
?>
