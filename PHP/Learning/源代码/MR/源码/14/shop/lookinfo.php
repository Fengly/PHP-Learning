<?php
session_start();
 include("top.php");
 include("conn/conn.php");
?>
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>

<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" valign="top" bgcolor="#FFFFFF"><?php
 include("left.php");
?></td>
    <td width="581" align="center" valign="top" bgcolor="#FFFFFF"><table width="557" height="6" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td></td>
      </tr>
    </table>      
      <table width="530" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="25" bgcolor="#FFEDBF">&nbsp;&nbsp;��Ʒ��Ϣ</td>
        </tr>
      </table>
        <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#666666">
              <table width="530" border="0" align="center" cellpadding="0" cellspacing="1">
                <?php
		     $sql=mysqli_query($conn,"select * from tb_shangpin where id=".$_GET['id'].""); 
			 $info=mysqli_fetch_object($sql);
		   ?>
                <tr>
                  <td width="89" height="80" rowspan="4" align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
                      <?php
			    if($info->tupian==""){
				  echo "����ͼƬ";
				}
				else
				{
			  ?>
                      <a href="<?php echo $info->tupian;?>" target="_blank"><img src="<?php echo $info->tupian;?>" alt="�鿴��ͼ" width="80" height="80" border="0"></a>
                      <?php
			    }
			  ?>
                  </div></td>
                  <td width="92" height="20" align="left" bgcolor="#FFFFFF"><div align="center">��Ʒ���ƣ�</div></td>
                  <td width="134" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->mingcheng;?></div></td>
                  <td width="100" bgcolor="#FFFFFF"><div align="center">����ʱ�䣺</div></td>
                  <td width="129" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->addtime;?></div></td>
                </tr>
                <tr>
                  <td height="20" align="left" bgcolor="#FFFFFF"><div align="center">��Ա�ۣ�</div></td>
                  <td width="134" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->huiyuanjia;?></div></td>
                  <td width="100" bgcolor="#FFFFFF"><div align="center">�г��ۣ�</div></td>
                  <td width="129" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->shichangjia;?></div></td>
                </tr>
                <tr>
                  <td height="20" align="left" bgcolor="#FFFFFF"><div align="center">�ȼ���</div></td>
                  <td width="134" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->dengji;?></div></td>
                  <td width="100" bgcolor="#FFFFFF"><div align="center">Ʒ�ƣ�</div></td>
                  <td width="129" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->pinpai;?></div></td>
                </tr>
                <tr>
                  <td height="20" align="left" bgcolor="#FFFFFF"><div align="center">�ͺţ�</div></td>
                  <td width="134" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->xinghao;?></div></td>
                  <td width="100" bgcolor="#FFFFFF"><div align="center">������</div></td>
                  <td width="129" bgcolor="#FFFFFF"><div align="left">&nbsp;<?php echo $info->shuliang;?></div></td>
                </tr>
                <tr>
                  <td width="89" height="69" bgcolor="#FFFFFF"><div align="center">��Ʒ��飺</div></td>
                  <td height="69" colspan="4" bgcolor="#FFFFFF" valign="top"><div align="left"><br>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $info->jianjie;?></div></td>
                </tr>
            </table></td>
          </tr>
        </table>
        <table width="530" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="right"><a href="addgouwuche.php?id=<?php echo $info->id;?>">���빺�ﳵ</a>&nbsp;&nbsp;</div></td>
          </tr>
        </table>
        <?php
	   if(isset($_SESSION['username']) && $_SESSION['username']!="")
	   {
	  
	  ?>
  <form name="form1" method="post" action="savepj.php?id=<?php echo $info->id;?>" onSubmit="return chkinput(this)">
  <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" bgcolor="#FFEDBF"><div align="center" style="color: #FFFFFF">
                  <div align="left">&nbsp;&nbsp;<span style="color: #000000">��������</span></div>
              </div></td>
            </tr>
            <tr>
              <td height="150" bgcolor="#999999"><table width="530" border="0" align="center" cellpadding="0" cellspacing="1">
                  <script language="javascript">
		    function chkinput(form)
			{
			   if(form.title.value=="")
			   {
			     alert("��������������!");
				 form.title.select();
				 return(false);
			   }
			   if(form.content.value=="")
			   {
			     alert("��������������!");
				 form.content.select();
				 return(false);
			   }
			   return(true);
			}
		  </script>
                  <tr>
                    <td width="80" height="25" bgcolor="#FFFFFF"><div align="center">�������⣺</div></td>
                    <td width="467" bgcolor="#FFFFFF"><div align="left">
                        <input type="text" name="title" size="30" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                    </div></td>
                  </tr>
                  <tr>
                    <td height="125" bgcolor="#FFFFFF"><div align="center">�������ݣ�</div></td>
                    <td height="125" bgcolor="#FFFFFF"><div align="left">
                        <textarea name="content" cols="70" rows="10" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></textarea>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
        </table>
          <table width="530" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><div align="center">
                  <input name="submit2" type="submit" class="buttoncss" value="����">
&nbsp;&nbsp;&nbsp;<a href="showpl.php?id=<?php echo $_GET['id'];?>">�鿴����Ʒ����</a></div></td>
            </tr>
          </table>
      </form>
    <?php
	   }
	  
	  ?></td></tr>
</table>
<?php
 include("bottom.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
