<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script>
    function checkform(form) {
        if (form.user.value == "") {
            return input_is_null(form.user, "请输入用户名!");
        } else if (form.pwd.value.length == 0) {
            return input_is_null(form.pwd, "请输入密码!");
        }
    }
    function input_is_null(form_v, show_string) {
        alert(show_string);
        form_v.focus();
        return false;
    }

</script>
<div align="center">
    <form id="form1" name="form1" method="post" action="index_ok.php" onsubmit="return checkform(form1)">
        <fieldset style="width: 500px">
            <legend style="font-size: 16px">用户登录</legend>
            <table style="width: 300px" align="center" border="0">
                <tr>
                    <td width="77" align="right">用户名:&nbsp;</td>
                    <td width="213"><input title="" name="user" type="text" id="user" size="24"/></td>
                </tr>
                <tr>
                    <td align="right">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;</td>
                    <td><input title="" name="pwd" type="password" id="pwd" size="24"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="登录" name="sub"/>&nbsp;&nbsp;
                        <input type="reset" value="重置" name="res">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
</body>
</html>