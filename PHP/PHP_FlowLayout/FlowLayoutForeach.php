<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/1
 * Time: 16:46
 */
$names = array("1" => "品牌笔记本电脑", "2" => "高档男士衬衫", "3" => "品牌3G手机", "4" => "高档女士挎包");
$prices = array("1" => "4998元", "2" => "588元", "3" => "4666元", "4" => "698元");
$counts = array("1" => 1, "2" => 1, "3" => 2, "4" => 1);
echo '<table width="580" border="1" cellpadding="1" cellspacing="1" bgcolor="#FF0000">
 <tr>
    <td align="center" bgcolor="#FFFFFF" class="STYLE1">商品名称</td>
    <td align="center" bgcolor="#FFFFFF" class="STYLE1">价格</td>
    <td align="center" bgcolor="#FFFFFF" class="STYLE1">数量</td>
    <td align="center" bgcolor="#FFFFFF" class="STYLE1">金额</td>
 </tr>';
foreach ($names as $key => $value) {    // 以names数组做循环, 输出键和值
    echo '<tr>
        <td height="25" align="center" bgcolor="#FFFFFF" class="STYLE2">'.$value.'</td>
        <td height="25" align="center" bgcolor="#FFFFFF" class="STYLE2">'.$prices[$key].'</td>
        <td height="25" align="center" bgcolor="#FFFFFF" class="STYLE2">'.$counts[$key].'</td>
        <td height="25" align="center" bgcolor="#FFFFFF" class="STYLE2">'.$prices[$key] * $counts[$key].'</td>
    </tr>';
}
echo '</table>';


for ($i = 0; $i <= 9; $i++) {
    echo "<table border='1' cellspacing='0' cellpadding='0' bgcolor='#CCCCCC'>";
    echo "<tr>";
    for ($j = 0; $j <= $i; $j++) {
        echo "<td width='100' height='20' align='center'>$j * $i = ".$i * $j."</td>";
    }
    echo "</tr>";
    echo "</table>";
}

// 应用For循环控制语句声明变量$k,循环输出4个表情头像。只有当变量$k等于4时,才使用break跳转
for ($k = 0; $k <= 4; $k++) {
    if ($k == 4) {
        break;
    }
    ?>
    <img src="<?php echo ($k.".jpg");?>" width="170" height="90" id="head"/>
    <label><?php echo "$k"?></label>
    <input type="radio" name="head" value="<?php echo ("images/".$k.".jpg");?>"/>
<?php
}
?>