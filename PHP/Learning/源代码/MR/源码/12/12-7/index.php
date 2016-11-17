<?php
	class Car{									// 定义轿车类
		protected $wheel;						// 定义保护变量
		protected $steer;
		protected $speed;
		public function say_type(){				// 定义轿车类型方法
			$this->wheel="45.9cm";				// 定义车轮直径长度
			$this->steer="15.7cm";				// 定义方向盘直径长度
			$this->speed="120m/s";				// 定义车速
		}
	}
	class SmallCar extends Car{					// 定义小型轿车类继承轿车类
		public function say_type(){				// 定义与父类方法同名的方法
			$this->wheel="50.9cm";				// 定义车轮直径长度
			$this->steer="20cm";					// 定义方向盘直径长度
			$this->speed="160m/s";				// 定义车速
		}
		public function say_show(){				// 定义输出方法
			$this->say_type();				// 调用本类中方法
			echo "Q7轿车轮胎尺寸：".$this->wheel."<br>";// 输出本类中定义的车轮直径														// 长度
			echo "Q7轿车方向盘尺寸：".$this->steer."<br>";
													// 输出本类中定义方向盘直径长度
			echo "Q7轿车最高时速：".$this->speed;	// 输出本类中定义的最高时速
		}
	}
	$car=new SmallCar();	// 实例化小轿车类
	$car->say_show();	// 调用say_show()方法
?>

