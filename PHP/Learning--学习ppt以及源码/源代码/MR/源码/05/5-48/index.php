<?php
$array1 = array("asp" => "ʵ��Ӧ��", "php" => "�����ֲ�", "java" => "����Ӧ��");//��������
$array2 = array("asp" => "ʵ��Ӧ��", "������ȫ", "����Ӧ��");		//��������
$result = array_intersect_assoc($array1, $array2);		//������������Ľ���
print_r($result);									//��������Ľ���
?>
