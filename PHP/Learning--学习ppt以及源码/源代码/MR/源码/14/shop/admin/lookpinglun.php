<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�鿴����</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<?php
include("conn/conn.php");
include("function.php");
$sql=mysqli_query($conn,"select * from tb_pingjia where id='".$_GET['id']."'");
$info=mysqli_fetch_array($sql);


?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25"><div align="left">��������:<?php echo $info['title'];?></div></td>
  </tr>
  <tr>
    <td height="25"><div align="left">����:</div></td>
  </tr>
  <tr>
    <td height="140" valign="top"><div align="left"><?php echo unhtml($info['content']);?></div></td>
  </tr>
</table>
</body>
</html>
