<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
class Book{							//类Book
	private $object_type = 'book';				//声明私有变量$object_type，并赋初值为book
	public function setType($type){				//声明成员方法setType，为变量$object_type赋值
		$this -> object_type = $type;
	}
	public function getType(){				//声明成员方法getType，返回变量$object_type的值
		return $this -> object_type;
	}
	public function __clone(){				//声明__clone()方法
		$this ->object_type = 'computer';	//将变量$object_type的值修改为computer
	}
}
$book1 = new Book();						//实例化对象$book1
$book2 = clone $book1;						//使用普通数据类型的方法给对象$book2赋值
echo '对象$book1的变量值为：'.$book1 -> getType();	//输出对象$book1的值
echo '<br>';
echo '对象$book2的变量值为：'.$book2 -> getType();
?>

