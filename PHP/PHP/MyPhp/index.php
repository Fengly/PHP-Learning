<html></html>
<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/4
 * Time: 17:36
 */
include "conn.php";

$user = $_POST['user'];
$pwd = $_POST['pwd'];
echo $user.'----'.$pwd;


$sql = "select * from myUsers";
$result = mysqli_query($conn, $sql);
?>



<div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()">Remove User</a>
</div>
<?php
    while ($myrow = mysqli_fetch_array($result)) {   // 循环输出查询结果
        ?>
     <table id="dg" title="My Users" class="easyui-datagrid" style="height:20px" border="1" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tr>
            <td width="200" align="center"><span class="STYLE2"><?php echo $myrow[1];?></span></td>
            <td width="200" align="center"><span class="STYLE2"><?php echo $myrow[2];?></span></td>
            <td width="200" align="center"><span class="STYLE2"><?php echo $myrow[3];?></span></td>
            <td width="200" align="center"><span class="STYLE2"><?php echo $myrow[4];?></span></td>
        </tr>
    </table>
        <?php
    }
?>




<?php

?>
