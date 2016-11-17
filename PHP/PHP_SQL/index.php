<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SQL</title>
</head>
<body bgcolor="#00ffff">
<?php
include_once ("select.php");
$result = select("myUsers");
?>
<div align="center">
    <img src="MAMP-PRO-Logo.png">
    <h3>从数据库查询结果中取一行作为数组</h3>
</div>
<table align="center" bgcolor="#f0ffff" width="700" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td height="50" bgcolor="#00ffff"></td>
        <td bgcolor="#00ffff"></td>
        <td bgcolor="#00ffff"></td>
        <td bgcolor="#00ffff"></td>
    </tr>
    <tr>
        <td width="100" height="30" align="center"><span class="STYLE2"><font style="size: 12px; border: 2px"><?php echo "用户名"?></font></span></td>
        <td width="100" align="center"><span class="STYLE2"><font style="size: 12px"><?php echo "别名"?></font></span></td>
        <td width="200" align="center"><span class="STYLE2"><font style="size: 12px"><?php echo "电话"?></font></span></td>
        <td width="300" align="center"><span class="STYLE2"><font style="size: 12px"><?php echo "邮箱"?></font></span></td>
    </tr>
    <?php
    while ($myrow = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td height="20" width="100" align="center"><span class="STYLE2"><?php echo $myrow[1]?></span></td>
            <td width="100" align="center"><span class="STYLE2"><?php echo $myrow[2]?></span></td>
            <td width="200" align="center"><span class="STYLE2"><?php echo $myrow[3]?></span></td>
            <td width="300" align="center"><span class="STYLE2"><?php echo $myrow[4]?></span></td>
        </tr>

        <?php
    }
    ?>

</table>


<!--<form method="post" action="index_insert.php">-->
<!--    <input type="submit" value="Insert">-->
<!--</form>-->
<!--<form method="post" action="object.php">-->
<!--    <input type="submit" value="Delete">-->
<!--</form>-->
<!--<form method="post" action="object.php">-->
<!--    <input type="submit" value="Update">-->
<!--</form>-->
<!--<form method="post" action="object.php">-->
<!--    <input type="submit" value="Select">-->
<!--</form>-->
<div align="center">
    <?php
    echo "<a href='index_insert.php'>添加</a>"."  ";
    echo " "."<a href='index_update.php'>删除</a>"." ";
    echo " "."<a href='index_update.php'>修改</a>"." ";
    echo " "."<a href='object.php'>查询</a>";
    ?>
</div>

</body>
</html>