<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	class Car{
		const NAME="别克系列";//定义常量
		public function bigType(){//定义成员方法
			echo "父类：".Car::NAME;//调用常量
		}
	}
	class SmallCar extends Car{//子类继承父类
		const NAME="别克军威";//定义常量
		public function smallType(){//定义子类成员方法
			echo parent::bigType()."\t";//调用父类方法
			echo "子类：".self::NAME;//调用当前类常量
		}
	}
	$car=new SmallCar();								//实例化对象
	$car->smallType();									//调用smallType方法
?>
