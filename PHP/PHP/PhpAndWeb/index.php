
<html>
<head>
    <title>PHP AND WEB</title>
</head>
<body>

<form name="form1" method="get" target="_self" action=" ">
    用户名:&nbsp;
    <input name="user" type="text" size="30" /><p></p>
    密&nbsp;&nbsp;&nbsp;码:&nbsp;
    <input name="pwd" type="password" size="30" id="pwd" /> <p></p>
    <input name="submit" type="submit" value="登录"> <p></p>
    <input name="sex" type="radio" value="男" checked/> <label>男</label>
    <input name="sex" type="radio" value="女"/> 女 <p></p>
    <input name="file_name1" type="checkbox" checked value="体育"/>体育
    <input name="file_name2" type="checkbox" checked value="体育"/>音乐
    <input name="file_name3" type="checkbox" checked value="体育"/>影视<p></p>
    <input name="button" type="button" value="button"/>
    <input name="reset" type="reset" value="重置"/>
    <input type="image" name="field_name" src="http://upload-images.jianshu.io/upload_images/3280522-04dedfddb6ec01cf.png?imageMogr2/auto-orient/strip%7CimageView2/2"/>
    <input type="hidden" name="hidden" value="value"/><p></p>
    <input type="file" name="file" size="16" maxlength="200"/> <p></p>  <!--文件域-->
    <textarea name="textname" rows="4" cols="20" placeholder="请输入"></textarea> <!--文本域-->
    <select>   <!-- 选择域 -->
        <option value="value" selected>选项1</option>
        <option value="value">选项2</option>
        <option value="value">选项3</option>
        <option value="value">选项4</option>
        <option value="value">选项5</option>
        <option value="value" name="value6">选项6</option>
    </select>
</form>

<?php
if (isset($_GET["submit"]) || $_GET["submit"] == "登录") {   // 判断是否点击的是登录按钮
    echo "您输入的用户名为: ".$_GET['user']."&nbsp;&nbsp;密码为: ".$_GET['pwd']."&nbsp;&nbsp;性别:".$_GET['sex']."&nbsp;&nbsp;&nbsp;".$_GET['textname'];   // 输出提交的用户名和密码
}
?>

</body>
</html>
