<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>查看订单</title>
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <style type="text/css">
        .style1{
            color: #ffffff;
        }
    </style>
</head>
<body margintop="0" marginleft="0" marginbottom="0">
<?php
include ("conn/conn.php");
include "sql/selectorder.php";
if ($total == 0) {
    return false;
}
?>
<form name="form1" method="post" action="sql/deleteorder.php">
    <table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
        <tr>
            <td height="20" align="top" bgcolor="#FFCF60">
                <div align="center" class="style1">查看订单</div>
            </td>
        </tr>
        <tr>
            <td height="40" bgcolor="#666666">
                <table width="750" border="0" align="center" cellpadding="0" cellspacing="1">
                    <tr>
                        <td width="121" height="20" bgcolor="#FFFFFF"><div align="center">订单号</div></td>
                        <td width="59" bgcolor="#FFFFFF"><div align="center">下单人</div></td>
                        <td width="60" bgcolor="#FFFFFF"><div align="center">订货人</div></td>
                        <td width="70" bgcolor="#FFFFFF"><div align="center">金额总计</div></td>
                        <td width="88" bgcolor="#FFFFFF"><div align="center">付款方式</div></td>
                        <td width="87" bgcolor="#FFFFFF"><div align="center">收货方式</div></td>
                        <td width="141" bgcolor="#FFFFFF"><div align="center">订单状态</div></td>
                        <td width="115" bgcolor="#FFFFFF"><div align="center">操作</div></td>
                    </tr>
                    <?php
                        do {
                            $array = explode("@", $info2['spc']);
                            $sum = count($array) * 20 + 260;
                            ?>
                            <tr>
                                <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info2['dingdanhao'] ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?php echo $info2['xiadanren'] ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?php echo $info2['shouhuoren'] ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?php echo $info2['total'] ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?php echo $info2['zfff'] ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?php echo $info2['shff'] ?></div></td>
                                <td bgcolor="#FFFFFF"><div align="center"><?php echo $info2['zt'] ?></div></td>
                                <td bgcolor="#FFFFFF">
                                    <div align="center">
                                        <input name="button" type="button" class="buttoncss" id="button" onClick="window.open('showorderinfo.php?id=<?php echo $info2['id'];?>',
                                            'newframe','width=600,height=<?php echo $sum;?>,, +,left=100,top=100,menubar=no,toolbar=no,location=no,scrollbars=no')" value="查看"
                                        >
                                        <input name="button2" type="button" class="buttoncss" id="button2" onclick="window.location='orderdd.php?id=<?php echo $info2['id'];?>';" value="执行">
                                        <input type="checkbox" title="" name=<?php echo $info2['id'];?> value=<?php echo $info2['id'];?>>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        } while ($info2 = mysqli_fetch_array($result2))
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <table width="750" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="652"><div align="right">
                    本站共有订单
                    <?php
                    echo $total;
                    ?>
                    &nbsp;条&nbsp;每页显示&nbsp;<?php echo $page_size;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $page_count; ?>&nbsp;页
                    <?php
                    if($page>=2)
                    {
                        ?>
                        <a href="lookdd.php?page=1" title="首页"><font face="webdings"> 9 </font></a>
                        <a href="lookdd.php?id=<?php echo $info2['id'];?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
                        <?php
                    }
                    if($page_count<=4){
                        for($i=1;$i<=$page_count;$i++){
                            ?>
                            <a href="lookdd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                            <?php
                        }
                    } else {
                        for($i=1;$i<=4;$i++){
                            ?>
                            <a href="lookdd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                        <?php }?>
                        <a href="lookdd.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a>
                        <a href="lookdd.php?id=<?php echo $info2['id'];?>&page=<?php echo $page_count;?>" title="尾页"><font face="webdings"> : </font></a>
                    <?php }?>

                </div></td>
            <td width="98"><div align="center"><input type="hidden" name="page_id" value=<?php echo $page;?>><input type="submit" value="删除选择项" class="buttoncss"></div></td>
        </tr>
    </table>
</form>
</body>
</html>