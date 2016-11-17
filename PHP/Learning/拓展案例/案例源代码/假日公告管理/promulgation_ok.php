<?php
header("content-type:text/html;charset=utf-8");
include("conn/conn.php");
if(isset($_POST['name']) and $_POST['Submit']=="发布"){
	$insert=mysqli_query($conn,"insert into tb_01(name,perform) values('".$_POST['name']."','".$_POST['radio']."')");		//添加数据
	if(isset($_FILES['files']['name'])){							//判断文件及图片是否存在
		if(!is_dir("./upfile/images")){							//判断指定目录是否存在
			mkdir("./upfile/images");								//创建目录
		}
		$photo="upfile/".$_FILES['files']['name'];			//文件的存储路径和名称
		if(move_uploaded_file($_FILES['files']['tmp_name'],$photo)){	//执行上传
			for($a=0;$a<4;$a++){							//循环语句
				$name=$_FILES['photo_'.$a];					//将变量的名称保存在变量中
				$path='upfile/images/'.$name['name'];	//定义上传文件的路径
				move_uploaded_file($name['tmp_name'],$path);		
			}
			echo "<script>alert('上传成功！');window.location.href='promulgation.php';</script>";
		}else{
			echo "<script>alert('上传失败！');window.location.href='promulgation.php';</script>";
		}
	}
}else{
	echo "<script>alert('请选择上传文件！');window.location.href='promulgation.php';</script>";
}
?>