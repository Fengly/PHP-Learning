<?php
class Student{
    public $type="ѧ��";//�����������
    public $name="С��";     
	public $age="15";	
	public function getNameAndAge(){//������ĳ�Ա����
	    return $this->name."����".$this->age."����";
	} 
}
$student = new Student();    //���ʵ����
echo $student->type;//������ĳ�Ա����
echo $student->getNameAndAge();    //������ĳ�Ա����
?>
