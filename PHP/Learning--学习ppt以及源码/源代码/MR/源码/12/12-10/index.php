<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
	interface Person{						// 定义Person接口
		public function say();				// 定义接口方法
	}
	interface Popedom{						// 定义Popedom接口
		public function money();				// 定义接口方法
	}
	class Member implements Person,Popedom{	// 类Member继承接口Person和Popedom
		public function say(){				// 定义say方法
			echo "我只是一名普通员工，";			// 输出信息
		}
		public function money(){				// 定义方法money
			echo "我一个月的薪水是10000元";	// 输出信息
		}
	}
	$man=new Member ();	// 实例化对象
	$man->say();			// 调用say方法
	$man->money();		// 调用money方法
?>



