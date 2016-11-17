<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>上传文件</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td width="150" height="30" align="right" valign="middle">请选择上传文件:</td>
            <td width="250">
                <input name="upfile" type="file"/>
            </td>
            <td width="100"><input type="submit" name="submit" value="上传"/></td>
        </tr>
    </table>
</form>
<form action="exercise.php" method="post" enctype="multipart/form-data">
    <input type="submit" value="下一页">
</form>

<?php
    // 判断文件是否上传
    if (!empty($_FILES['upfile']['name'])) {
        foreach ($_FILES['upfile'] as $name => $value)
            echo $name.'='.$value.'<br>';
        // 将文件信息赋给变量
        $file_info = $_FILES['upfile'];
        if ($file_info['size'] < 2097152 && $file_info['size'] > 0) { // 判断文件大小
            $path = "upfile/".$_FILES["upfile"]["name"];  // 定义上传呢文件的路径
            move_uploaded_file($file_info['tmp_name'], $path);  // 上传文件
            echo "上传文件成功";
        } else {
            echo "上传文件大小不符";
        }
    }
?>
</body>
</html>