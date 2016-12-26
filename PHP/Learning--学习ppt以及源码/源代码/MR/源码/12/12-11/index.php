<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
	abstract class Type{						// 定义抽象类Type
		abstract function go_Type();			// 定义抽象方法go_Type()
	}
	class Type_car extends Type{				// 小轿车类继承Type抽象类
		public function go_Type(){			// 重写抽象方法
			echo "我开着小轿车去拉萨";			// 输出信息
		}
	}
	class Type_bus extends Type{				// 定义巴士车类继承Type类
		public function go_Type(){			// 重写抽象方法
			echo "我坐巴士去拉萨";
		}
	}
	function change($obj){					// 自定义方法根据传入对象不同调用不同类中方法
		if($obj instanceof Type){
			$obj->go_Type();	
		}else{
			echo "传入的参数不是一个对象";		// 输出信息
		}
	}
	echo "实例化Type_car：";
	change(new Type_car());					// 实例化Type_car类
	echo "<br>";
	echo "实例化Type_bus：";
	change(new Type_bus);					// 实例化Type_bus类
?>



