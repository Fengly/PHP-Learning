<title>������Ϣ</title>
<form action="show_message.php" method="post" name="addmess" id="addmess">
<table width="560" border="0" cellpadding="4" cellspacing="1" bordercolor="#ACD2DB" bgcolor="#ACD2DB" class="big_td">
	<tr>
		<td height="33" background="images/list.jpg" id="list">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����Ϣ</td>
	</tr>
</table>
<table width="560" height="180" border="0" cellpadding="4" cellspacing="1" bordercolor="#ACD2DB" bgcolor="#ACD2DB" class="big_td">
  <tr>
    <td width="100" height="25" align="right" valign="middle" bgcolor="#DEEBEF" scope="col">���⣺</td>
    <td height="25" align="left" valign="middle" bgcolor="#DEEBEF" scope="col">
	<input type="text" name="title" id="title" />
	&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#DEEBEF">���ݣ�</td>
    <td align="left" valign="middle" bgcolor="#DEEBEF">
	<textarea name="content" id="content" cols="56" rows="10"></textarea>
	</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle" bgcolor="#DEEBEF">���</td>
    <td height="30" align="left" valign="middle" bgcolor="#DEEBEF">
	<select name="type" id="type">
		<option value="��ҵ����" selected="selected">��ҵ����</option>
		<option value="�����">�����</option>
	</select>
	</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#DEEBEF">
	<input name="submit" type="submit" id="submit"  value="����" />
	&nbsp;
	<input name="submit2" type="reset" id="submit2" value="����" />
	</td>
  </tr>
</table>
</form>