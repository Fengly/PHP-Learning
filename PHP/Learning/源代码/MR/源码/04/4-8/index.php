<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>应用foreach语句遍历数组</title>

</head>
<style type="text/css">
<!--
.STYLE1 {font-size: 13px;
       	color: #FF0000;
	font-weight: bold;
}
.STYLE2 {font-size: 13px;
      

}
-->
</style>
<body>
<table width="580" height="180" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/bg.jpg" width="580" height="150"></td>
  </tr>
  <tr>
    <td height="30" align="left" bgcolor="#EEEFE9" class="STYLE1">&nbsp;&nbsp;购物车商品信息展示</td>
  </tr>
</table>
<?php
$name = array("1"=>"品牌笔记本电脑","2"=>"高档男士衬衫","3"=>"品牌3G手机","4"=>"高档女士挎包");
$price = array("1"=>"4998元","2"=>"588元","3"=>"4666元","4"=>"698元");
$counts = array("1"=>1,"2"=>1,"3"=>2,"4"=>1);
echo '<table width="580" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FF0000">
          <tr>
            <td width="145" align="center" bgcolor="#FFFFFF"  class="STYLE1">商品名称</td>
            <td width="145" align="center" bgcolor="#FFFFFF"  class="STYLE1">价 格</td>
            <td width="145" align="center" bgcolor="#FFFFFF"  class="STYLE1">数量</td>
            <td width="145" align="center" bgcolor="#FFFFFF"  class="STYLE1">金额</td>
 </tr>';
foreach($name as $key=>$value){ 		 //以book数组做循环，输出键和值
     echo '<tr>
            <td height="25" align="center" bgcolor="#FFFFFF" class="STYLE2">'.$value.'</td>
            <td align="center" bgcolor="#FFFFFF" class="STYLE2">'.$price[$key].'</td>    
            <td align="center" bgcolor="#FFFFFF" class="STYLE2">'.$counts[$key].'</td>
            <td align="center" bgcolor="#FFFFFF" class="STYLE2">'.$counts[$key]*$price[$key].'</td>
</tr>';
}
echo '</table>';
?>
</body>
</html>
