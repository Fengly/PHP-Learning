<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Ӧ��foreach����������</title>

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
    <td height="30" align="left" bgcolor="#EEEFE9" class="STYLE1">&nbsp;&nbsp;���ﳵ��Ʒ��Ϣչʾ</td>
  </tr>
</table>
<?php
$name = array("1"=>"Ʒ�ƱʼǱ�����","2"=>"�ߵ���ʿ����","3"=>"Ʒ��3G�ֻ�","4"=>"�ߵ�Ůʿ���");
$price = array("1"=>"4998Ԫ","2"=>"588Ԫ","3"=>"4666Ԫ","4"=>"698Ԫ");
$counts = array("1"=>1,"2"=>1,"3"=>2,"4"=>1);
echo '<table width="580" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FF0000">
          <tr>
            <td width="145" align="center" bgcolor="#FFFFFF"  class="STYLE1">��Ʒ����</td>
            <td width="145" align="center" bgcolor="#FFFFFF"  class="STYLE1">�� ��</td>
            <td width="145" align="center" bgcolor="#FFFFFF"  class="STYLE1">����</td>
            <td width="145" align="center" bgcolor="#FFFFFF"  class="STYLE1">���</td>
 </tr>';
foreach($name as $key=>$value){ 		 //��book������ѭ�����������ֵ
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
