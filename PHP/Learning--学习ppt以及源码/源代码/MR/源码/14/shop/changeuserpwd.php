<?php
session_start();
 include("top.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="229" height="438" align="center" valign="top" bgcolor="#F0F0F0"><div align="center">
      <?php include("left.php");?>
	
      </div></td>
    <td width="561" align="center" valign="top" bgcolor="#FFFFFF"><table width="500" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td></td>
      </tr>
    </table>
      <table width="550" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="left">&nbsp;&nbsp;��ǰ�û�&nbsp;<span style="color: #0000FF">��&nbsp;</span><?php echo $_SESSION['username'];?>&nbsp;<span style="color: #0000FF">��</span><a href="usercenter.php">�޸ĸ�����Ϣ</a>&nbsp;<span style="color: #0000FF">��</span><a href="userleaveword.php">�û�����</a>&nbsp;<span style="color: #0000FF">��</span><a href="changeuserpwd.php">�޸�����</a>&nbsp;<span style="color: #0000FF">��</span><a href="logout.php">ע���뿪&nbsp;</a></div></td>
        </tr>
      </table>
      <table width="500" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table>
      <table width="250" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" bgcolor="#FFEDBF"><div align="center" style="color: #760602">�޸��û�����</div></td>
        </tr>
        <tr>
          <td height="80" bgcolor="#FFEDBF"><table width="250" height="80" border="0" align="center" cellpadding="0" cellspacing="1">
              <script language="javascript">
		  function chkinput1(form)
			  {
			    if(form.p1.value=="")
				{
				  alert("������ԭ����!");
				  form.p1.select();
				  return(false);
				}
				if(form.p2.value=="")
				{
				  alert("����������!");
				  form.p2.select();
				  return(false);
				}      
			   if(form.p3.value=="")
				{
				  alert("����ȷ������!");
				  form.p3.select();
				  return(false);
				} 
				if(form.p2.value!=form.p3.value)
				{
				  alert("������ȷ�����벻ͬ!");
				  form.p2.select();
				  return(false);
				}
				if(form.p2.value.length<6)
				{
				  alert("�����볤��Ӧ����6!");
				  form.p2.select();
				  return(false);
				}
				return(true);
			  }
		  </script>
              <form name="form1" method="post" action="savechangeuserpwd.php" onSubmit="return chkinput1(this)">
                <tr>
                  <td width="77" height="20" bgcolor="#FFFFFF"><div align="center">ԭ���룺</div></td>
                  <td width="170" bgcolor="#FFFFFF"><div align="left">
                      <input type="password" name="p1" size="20" class="inputcss">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">�����룺</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="password" name="p2" size="20" class="inputcss">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">ȷ�������룺</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="password" name="p3" size="20" class="inputcss">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" colspan="2" bgcolor="#FFFFFF"><div align="center">
                      <input name="submit2" type="submit" class="buttoncss" value="����">
                  </div></td>
                </tr>
              </form>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>