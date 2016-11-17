<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <table width="503" border="0" align="center" cellspacing="1" bgcolor="#BBBBBB">
        <tr>
            <td height="46" colspan="2" bgcolor="#DDDDDD">
                <font color="#333333" size="+2">您输入的个人资料信息</font>
            </td>
        </tr>
        <tr>
            <td width="82" height="20" align="right" bgcolor="#DDDDDD">姓名:&nbsp;</td>
            <td width="414" height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="2">
                    <?php echo $_REQUEST['username'];?>
                </font>
            </td>
        </tr>
        <tr>
            <td width="82" height="20" align="right" bgcolor="#DDDDDD">性别:&nbsp;</td>
            <td width="414" height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="2">
                    <?php echo $_POST['sex']?>
                </font>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">生日:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="2">
                    <?php echo $_POST['year']."年".$_POST['month']."月"?>
                </font>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">爱好:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="2">
                    <?php
                        for ($i = 0; $i < count($_POST['insterest']); $i++) {
                            echo $_POST['insterest'][$i]."\n";
                        }
                    ?>
                </font>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">地址:&nbsp;</td>

            <td height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="2">
                    <?php
                        echo $_POST['address'];
                    ?>
                </font>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">电话:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="2">
                    <?php
                        echo $_POST['telphone'];
                    ?>
                </font>
            </td>

        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">QQ:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="2">
                    <?php
                        echo $_POST['qq'];
                    ?>
                </font>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" valign="top" bgcolor="#DDDDDD">自我评价:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="2">
                    <?php
                        echo $_POST['comment'];
                    ?>
                </font>
            </td>
        </tr>
    </table>
    <form action="" method="post" enctype="multipart/form-data">
        <input name="upfile" type="file"/>
        <input name="submit" type="submit" value="上传"/>
    </form>
    <?php
        if (!empty($_FILES)) {
            foreach ($_FILES['upfile'] as $name => $value)
                echo $name.'='.$value.'<br>';
        }
    ?>
    <form action="upfile.php" method="post" enctype="multipart/form-data">
       <input type="submit" value="下一页">
    </form>
</body>
</html>