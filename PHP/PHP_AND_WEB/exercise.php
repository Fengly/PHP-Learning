<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>练习</title>
</head>
<body bgcolor="cyan">
    <div>
        <img src="MAMP-PRO-Logo.png"/>
    </div>
    <h1>添加信息</h1>
    <form action="show_message.php" method="post" name="exad" id="exad">
        <table width="560" bgcolor="#ACD2DB" class="big_id">
            <tr>
                <td width="100" height="25" align="right" bgcolor="#DEEBEF" scope="col">标题:&nbsp;&nbsp;&nbsp;</td>
                <td height="25" align="left" valign="middle" bgcolor="#DEEBEF" scope="sol">
                    <input title="" type="text" name="title" id="title"/>
                </td>
            </tr>
            <tr>
                <td width="100" height="25" align="right" valign="middle" bgcolor="#DEEBEF">内容:&nbsp;&nbsp;&nbsp;</td>
                <td align="left" valign="middle" bgcolor="#DEEBEF">
                    <textarea title="" name="content" id="content" cols="56" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td width="100" height="25" align="right" bgcolor="#DEEBEF">类别:&nbsp;&nbsp;&nbsp;</td>
                <td height="30" align="left" valign="middle" bgcolor="#DEEBEF">
                    <select title="" name="type" id="type">
                        <option value="企业公告" selected = "selected">企业公告</option>
                        <option value="活动安排">活动安排</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="25" align="center" valign="middle" bgcolor="#DEEBEF" colspan="2">
                    <input name="submit" type="submit" value="发布" id="submit">&nbsp;&nbsp;
                    <input name="reset" type="reset" value="重置" id="reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>