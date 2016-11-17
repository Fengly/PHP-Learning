<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	class Book{
		private $bookName="PHP从入门到实践";			//定义私有变量并赋值
		public function setName($bookName){			//定义setName()方法设置变量值
			$this->bookName=$bookName;
		}
		public function getName(){			//定义getName()方法返回变量值
			return $this->bookName;
		}
	}
	$book=new Book();							//对类实例化
	$book->setName("PHP自学视频教程");//执行setName()方法修改私有变量的值
	echo "正确操作私有变量：";
	echo $book->getName();					//执行getName()方法输出变量的值
	echo "<br>错误操作私有变量：";
	echo $book->bookName;						//直接访问私有变量出现错误
?>

