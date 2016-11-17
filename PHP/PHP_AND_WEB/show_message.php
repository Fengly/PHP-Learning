<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Show Message</title>
</head>
<body bgcolor="cyan">
<img src="MAMP-PRO-Logo.png"/>
<h1>查看消息</h1>
<form action="show_message.php" method="post" name="exad" id="exad">
    <table width="560" bgcolor="#ACD2DB" class="big_id">
        <tr>
            <td width="100" height="25" align="right" bgcolor="#DEEBEF" scope="col">标题:&nbsp;&nbsp;&nbsp;</td>
            <td height="25" align="left" valign="middle" bgcolor="#DEEBEF" scope="sol">
                <?php
                    echo $_POST["title"];
                ?>
            </td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" bgcolor="#DEEBEF">内容:&nbsp;&nbsp;&nbsp;</td>
            <td height="104" align="left" valign="middle" bgcolor="#DEEBEF">
                <?php
                     echo $_REQUEST["content"];
                ?>
            </td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" bgcolor="#DEEBEF">类别:&nbsp;&nbsp;&nbsp;</td>
            <td height="30" align="left" valign="middle" bgcolor="#DEEBEF">
                <?php
                     echo $_POST["type"];
                ?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>