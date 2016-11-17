<?php
	class ConnDB{// 创建名称为ConnDB的类
		private $localhost;// 定义连接数据库的服务器主机名
		private $username;// 数据库用户名
		private $pwd;// 数据库密码
		private $dbname;// 数据库名称
		private $conn;// 连接标识符
		private $code;// 编码格式
		function __construct($localhost,$username,$pwd,$dbname,$code){//定义构造函数
			$this->localhost=$localhost;
			$this->username=$username;
			$this->pwd=$pwd;
			$this->dbname=$dbname;
			$this->code=$code;
		}
		function connect(){//定义连接数据库方法
			$this->conn=mysqli_connect($this->localhost,$this->username,$this->pwd,$this->dbname)or die("Connect MySQL False");//建立连接
			mysqli_query($this->conn,"set names $this->code");//设置数据库编码格式
			return $this->conn;                                 //返回数据库连接对象
		}
	}
class AdminDB{// 创建名称为AdminDB的类
function executeSQL ($sql, $conn){//定义执行SQL语句的方法
    $sqlType = strtolower(substr(trim($sql), 0, 6));	//提取SQL语句的类型
    $rs = mysqli_query($conn,$sql);                //执行SQL语句  
	if ($sqlType == 'select') {                      //如果是select查询
    	while($array=mysqli_fetch_array($rs)){//将查询结果集返回为数组
		    $arrayData[]=$array;//将数组$array存储在二维数组$arrayData中
		}              
        if (count($arrayData) == 0 || $rs == false) {  //如果没查询到或发生错误
        	return false;                         //返回false
        } else {                                  //否则
            return $arrayData;                    //返回记录集
        }
    } elseif ($sqlType == 'insert' || $sqlType == 'update' || $sqlType == 'delete') {  //如果执行插入、更新或删除语句
       return $rs;                        //返回语句执行状态，即成功返回true，失败返回false
    } else {
       return false;                      //如果不是上述查询，则返回false
    }
}
}
$conndb=new ConnDB("localhost","root","111","db_database12","gbk");	//实例化数据库连接类
$conn=$conndb->connect();		//返回连接标识
$admindb=new AdminDB();						//数据库操作类实例化
$res=$admindb->executeSQL ("select * from tb_book",$conn);	//调用数据库操作类中方法执行查询语句
for($i=0;$i<count($res);$i++){					//循环输出数据
	echo $res[$i]['bookname'];			//输出bookname字段的值
	echo "<br>";//输出换行符
}
?>
