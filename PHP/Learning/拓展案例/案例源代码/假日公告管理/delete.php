<?php
header("content-type:text/html;charset=utf-8");
$count=substr_count($_GET['catalog'],'.');
if($count>=1){
	if(unlink($_GET['catalog'])){
		echo "<script>alert('文件删除成功！'); window.location.href='manage.php?catalog=".urlencode($_GET['filename'])."';</script>";
	}else{
		echo "<script>alert('文件删除失败！'); history.back();</script>";
	}
}else{
	if(is_dir($_GET['catalog'])){
		if(@rmdir($_GET['catalog'])){
			echo "<script>alert('目录删除成功！'); window.location.href='manage.php?catalog=".urlencode($_GET['filename'])."';</script>";
		}else{
			echo "<script>alert('目录删除失败！'); history.back();</script>";
		}
	}
}
?>