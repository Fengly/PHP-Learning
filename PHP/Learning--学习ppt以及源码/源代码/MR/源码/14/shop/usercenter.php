<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
 session_start();
 if(!isset($_SESSION['username']))
 {
   echo "<script>alert('����û�е�¼,���ȵ�¼!');history.back();</script>";
   exit;
  }
?>
<?php
 include("top.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" height="438" valign="top" bgcolor="#F0F0F0"><?php include("left.php");?></td>
    <td width="537" align="center" valign="top" bgcolor="#FFFFFF"><table width="500" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
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
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" bgcolor="#FFEDBF"><div align="center" style="color: #660206"><?php echo $_SESSION['username'];?>��������Ϣ</div></td>
        </tr>
        <tr>
          <td height="160" bgcolor="#FFEDBF"><table width="500" height="160" border="0" align="center" cellpadding="0" cellspacing="1">
              <script language="javascript">
		     function chkinput1(form)
			  {
			    if(form.email.value=="")
				{
				  alert("�������䲻��Ϊ��!");
				  form.email.select();
				  return(false);
				}
				if(form.email.value.indexOf('@')<0)
				{
				  alert("���������������!");
				  form.email.select();
				  return(false);
				}
				if(form.truename.value=="")
				{
				  alert("��ʵ��������Ϊ��!");
				  form.truename.select();
				  return(false);
				}
				if(form.sfzh.value=="")
				{
				  alert("���֤�Ų���Ϊ��!");
				  form.sfzh.select();
				  return(false);
				}
				if(form.tel.value=="")
				{
				  alert("��ϵ�绰����Ϊ��!");
				  form.tel.select();
				  return(false);
				} 
				if(form.dizhi.value=="")
				{
				  alert("��ϵ��ַ����Ϊ��!");
				  form.dizhi.select();
				  return(false);
				}         
			   
				return(true);
			  }
		   </script>
              <form name="form1" method="post" action="changeuser.php" onsubmit="return chkinput1(this)">
                <?php
		   $sql=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");
		   $info=mysqli_fetch_array($sql);
		  
		  ?>
                <tr>
                  <td width="100" height="20" bgcolor="#FFFFFF"><div align="center">�ǳƣ�</div></td>
                  <td width="397" bgcolor="#FFFFFF"><div align="left"><?php echo $_SESSION['username'];?></div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">��ʵ������</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="truename" size="25" class="inputcssnull" value="<?php echo $info['truename'];?>">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">E-mail��</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="email" size="25" class="inputcssnull" value="<?php echo $info['email'];?>">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">QQ���룺</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="qq" size="25" class="inputcssnull" value="<?php echo $info['qq'];?>">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">��ϵ�绰��</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="tel" size="25" class="inputcssnull" value="<?php echo $info['tel'];?>">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">��ͥסַ��</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="dizhi" size="25" class="inputcssnull" value="<?php echo $info['dizhi'];?>">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">�������룺</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="youbian" size="25" class="inputcssnull" value="<?php echo $info['youbian'];?>">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" bgcolor="#FFFFFF"><div align="center">���֤�ţ�</div></td>
                  <td height="20" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="sfzh" size="25" class="inputcssnull" value="<?php echo $info['sfzh'];?>">
                  </div></td>
                </tr>
                <tr>
                  <td height="20" colspan="2" bgcolor="#FFFFFF"><div align="center">
                      <input name="submit2" type="submit" class="buttoncss" value="����">
&nbsp;&nbsp;
                <input name="reset" type="reset" class="buttoncss" value="ȡ������">
                  </div></td>
                </tr>
              </form>
          </table></td>
        </tr>
      </table>
      <table width="500" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="center" style="color: #0000FF">��ɫ����Ϊ���޸���</div></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>
