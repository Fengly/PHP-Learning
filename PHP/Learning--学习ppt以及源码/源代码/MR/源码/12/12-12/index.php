<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
	interface Type{										//定义Type接口
		public function go_Type();							//定义接口方法
	}
	class Type_car implements Type{						//Type_car类实现Type接口
		public function go_Type(){							//定义go_Type方法
			echo "我开着小轿车去拉萨";					//输出信息
		}
	}
	class Type_bus implements Type{						//Type_bus实现Type方法
		public function go_Type(){							//定义go_Type方法
			echo "我坐巴士去拉萨";						//输出信息
		}
	}
	function change($obj){								//自定义方法
		if($obj instanceof Type){
			$obj->go_Type();
		}else{
			echo "传入的参数不是一个对象";				//输出信息
		}
	}
	echo "实例化Type_car：";
	change(new Type_car);								//实例化对象
	echo "<br>";
	echo "实例化Type_bus：";
	change(new Type_bus);
?>
