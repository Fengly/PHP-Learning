<?php
include_once("top.php");
?>
<table width="779" height="23" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="292" background="images/dh_back.gif"><div align="right">�����ǣ�&nbsp;<script language=JavaScript>
   today=new Date();
   function initArray(){
   this.length=initArray.arguments.length
   for(var i=0;i<this.length;i++)
   this[i+1]=initArray.arguments[i]  }
   var d=new initArray(
     "������",
     "����һ",
     "���ڶ�",
     "������",
     "������",
     "������",
     "������");
document.write(
     "<font color=#000000 style='font-size:9pt;font-family: ����'> ",
     today.getYear(),"��",
     today.getMonth()+1,"��",
     today.getDate(),"��",
	  "&nbsp;&nbsp;",
     d[today.getDay()+1],
	"</font>" ); 
</script></div></td>
    <td width="487" background="images/dh_back.gif"><div align="center">����ǰ��λ�ã��������Ա�&nbsp;>>&nbsp;<a href="leaveword.php" class="a1">��������</a></div></td>
  </tr>
</table>
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5" height="315" bgcolor="#FAF3CE"></td>
    <td width="200" valign="top"><?php include_once("left.php");?></td>
    <td width="6" bgcolor="#FAF3CE"></td>
    <td  valign="top"><table width="520" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td></td>
      </tr>
    </table>
      <table width="550" height="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FCD424">
        <tr>
          <td bgcolor="#FFFFFF" valign="top"><table width="550" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td background="images/dh_back_1.gif">&nbsp;&nbsp;<img src="images/biao.gif" />&nbsp;��������</td>
            </tr>
          </table>
		   <script language="javascript">
		     function chkinput(form){
			  if(form.title.value==""){
			    alert("�������������⣡");
			    form.title.focus();
				return(false);
			  }
			  
			  if(form.content.value==""){
			    alert("�������������ݣ�");
				form.content.focus();
				return(false);
			  }
			 
			  return(true);
			 }
		   
		   </script>
		  
            <table width="500" height="400" border="0" align="center" cellpadding="0" cellspacing="0">
             <form name="form1" method="post" action="saveleaveword.php" onsubmit="return chkinput(this)">
			  <tr>
                <td height="30" colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td width="120" height="40"><div align="center">�������⣺</div></td>
                <td width="380">&nbsp;<input type="text" name="title" size="40" class="inputcss"></td>
              </tr>
              <tr>
                <td height="250"><div align="center">�������ݣ�</div></td>
                <td height="250">&nbsp;<textarea name="content" rows="15" cols="55" class="inputcss"></textarea></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center"><input type="submit"  name="submit" value="����" class="buttoncss">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="��д" class="buttoncss"></div></td>
              </tr>
			  </form>
            </table></td>
        </tr>
      </table>
	  </td>
    <td width="5" bgcolor="#FAF3CE"></td>
  </tr>
</table>
<?php
include_once("bottom.php");
?>
