<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="post.php">
    <table width="503" border="0" align="center" cellspacing="1" bgcolor="#BBBBBB">
        <tr>
            <td height="46" colspan="2" bgcolor="#DDDDDD">
                <font color="#333333" size="+2">请输入您的个人信息</font>
            </td>
        </tr>
        <tr>
            <td width="82" height="20" align="right" bgcolor="#DDDDDD">姓名:&nbsp;</td>
            <td width="414" height="20" bgcolor="#DDDDDD">
                <input title="username" type="text" name="username"/>
            </td>
        </tr>
        <tr>
            <td width="82" height="20" align="right" bgcolor="#DDDDDD">性别:&nbsp;</td>
            <td width="414" height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="-10">
                    <input type="radio" name="sex" checked value="男"/> 男
                    &nbsp;&nbsp;<input type="radio" name="sex" value="女"/> 女
                </font>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">生日:&nbsp;</td>
                <td height="20" bgcolor="#DDDDDD">
                    <select title="" name="year">
                        <?php
                            for ($i = 1900; $i <= 2016; $i++) {
                                 echo "<option value='".$i."'".($i == 1988?"selected":"").">".$i."年</option>";
                            }
                        ?>
                    </select>
                    <select title="" name="month">
                        <?php
                            for ($i = 1; $i <= 12; $i++) {
                              echo "<option value='".$i."'".($i == 1?"selected":"").">".$i."月</option>";
                            }
                        ?>
                    </select>
                </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">爱好:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <font color="#333333" size="-10">
                    <input type="checkbox" name="insterest[]" value="看电影"/>看电影
                    <input type="checkbox" name="insterest[]" value="听音乐"/>听音乐
                    <input type="checkbox" name="insterest[]" value="演奏乐器"/>演奏乐器
                    <input type="checkbox" name="insterest[]" value="打篮球"/>打篮球
                    <input type="checkbox" name="insterest[]" value="看书"/>看书
                    <input type="checkbox" name="insterest[]" value="上网"/>上网
                </font>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">地址:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <input type="text" name="address"/>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">电话:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <input type="text" name="telphone"/>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" bgcolor="#DDDDDD">QQ:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <input type="text" name="qq"/>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" valign="top" bgcolor="#DDDDDD">自我评价:&nbsp;</td>
            <td height="20" bgcolor="#DDDDDD">
                <textarea name="comment" cols="30" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td bgcolor="#DDDDDD">&nbsp;</td>
            <td bgcolor="#DDDDDD">
                <input type="submit" name="Submit" value="提交"/>
                <input type="reset" name="Reset" value="重置"/>
            </td>
        </tr>
    </table>
</form>

</body>
</html>