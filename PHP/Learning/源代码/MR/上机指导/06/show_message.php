<title>查看公告</title>
<table width="560" border="0" cellpadding="4" cellspacing="1" bordercolor="#ACD2DB" bgcolor="#ACD2DB" class="big_td">
  <tr>
    <td height="33" background="images/list.jpg" id="list">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;查看消息</td>
  </tr>
</table>
<table width="560" height="192" border="0" cellpadding="4" cellspacing="1" bordercolor="#ACD2DB" bgcolor="#ACD2DB" class="big_td">
  <tr>
    <td width="100" height="25" align="right" valign="middle" bgcolor="#DEEBEF" scope="col">标题：</td>
    <td height="25" align="left" valign="middle" bgcolor="#DEEBEF" scope="col">&nbsp;&nbsp;<?php echo $_POST["title"];?></td>
  </tr>
  <tr>
    <td height="31" align="right" valign="middle" bgcolor="#DEEBEF">类别：</td>
    <td align="left" valign="middle" bgcolor="#DEEBEF">&nbsp;&nbsp;<?php echo $_POST["type"];?></td>
  </tr>
  <tr>
    <td height="104" align="right" valign="middle" bgcolor="#DEEBEF">内容：</td>
    <td height="104" align="left" valign="middle" bgcolor="#DEEBEF">&nbsp;&nbsp;<?php echo $_POST["content"];?></td>
  </tr>
</table>
