<?php
class Student{
    public $type="学生";//定义类的属性
    public $name="小明";     
	public $age="15";	
	public function getNameAndAge(){//定义类的成员方法
	    return $this->name."今年".$this->age."周岁";
	} 
}
$student = new Student();    //类的实例化
echo $student->type;//调用类的成员属性
echo $student->getNameAndAge();    //调用类的成员方法
?>
