<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	class Car{										//定义轿车类
		protected $carName="奥迪系列";					//定义保护变量
	}
	class SmallCar extends Car{						//定义小轿车类继承轿车类
		public function say(){						//定义say方法
			echo "调用父类中的属性：".$this->carName;	//输出父类变量
		}
	}
	$car=new SmallCar();								//实例化对象
	$car->say();										//调用say方法
	echo $car->carName;								//直接访问保护变量出现错误
?>


