<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
 session_start();
 if(!isset($_SESSION['username'])){
    echo "<script>alert('���ȵ�¼������!');history.back();</script>";
	exit;
  }
?>
<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="229" height="438" valign="top" bgcolor="#F4F4F4"><?php include("left.php");?></td>
    <td width="561" align="center" valign="top" bgcolor="#FFFFFF"><table width="550" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
    </table>
      <table width="557" border="0" align="center" cellpadding="0" cellspacing="0">
        <form name="form1" method="post" action="gouwu1.php">
          <tr>
            <td height="46" background="images/cart.gif"></td>
          </tr>
          <tr>
            <td  bgcolor="#FFFFFF"><table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
                <?php
			  //session_register("total");
			  if(isset($_GET['qk']) && $_GET['qk']=="yes"){
			     $_SESSION['producelist']="";
				 $_SESSION['quatity']=""; 
			  }
			   $arraygwc=explode("@",isset($_SESSION['producelist'])?$_SESSION['producelist']:"");
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
				   echo "<tr>";
                   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>���Ĺ��ﳵΪ��!</td>";
                   echo"</tr>";
				}
			  else{ 
			?>
                <tr>
                  <td width="125" height="25" bgcolor="#FFFFFF"><div align="center">��Ʒ����</div></td>
                  <td width="52" bgcolor="#FFFFFF"><div align="center">����</div></td>
                  <td width="64" bgcolor="#FFFFFF"><div align="center">�г���</div></td>
                  <td width="64" bgcolor="#FFFFFF"><div align="center">��Ա��</div></td>
                  <td width="51" bgcolor="#FFFFFF"><div align="center">�ۿ�</div></td>
                  <td width="66" bgcolor="#FFFFFF"><div align="center">С��</div></td>
                  <td width="71" bgcolor="#FFFFFF"><div align="center">����</div></td>
                </tr>
                <?php
			    $total=0;
			    $array=explode("@",$_SESSION['producelist']);
				$arrayquatity=explode("@",$_SESSION['quatity']);
				 while(list($name,$value)=each($_POST)){
					  for($i=0;$i<count($array)-1;$i++){
					    if(($array[$i])==$name){
						  $arrayquatity[$i]=$value;  
						}
					}
				}
			    $_SESSION['quatity']=implode("@",$arrayquatity);
				
				for($i=0;$i<count($array)-1;$i++){ 
				   $id=$array[$i];
				   $num=$arrayquatity[$i];
				  
				  if($id!=""){
				   $sql=mysqli_query($conn,"select * from tb_shangpin where id='".$id."'");
				   $info=mysqli_fetch_array($sql);
				   $total1=$num*$info['huiyuanjia'];
				   $total+=$total1;
				   $_SESSION["total"]=$total;
			?>
                <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['mingcheng'];?></div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">
                  <input type="text" name="<?php echo $info['id'];?>" size="2" class="inputcss" value=<?php echo $num;?>>
                  </div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['shichangjia'];?>Ԫ</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['huiyuanjia'];?>Ԫ</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo @(ceil(($info['huiyuanjia']/$info['shichangjia'])*100))."%";?></div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['huiyuanjia']*$num."Ԫ";?></div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><a href="removegwc.php?id=<?php echo $info['id']?>">�Ƴ�</a></div></td>
                </tr>
                <?php
			      }
				 }
			 ?>
                <tr>
                  <td height="25" colspan="8" bgcolor="#FFFFFF"><div align="right">
                      <table width="500" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="125"><div align="center">
                              <input name="submit2" type="submit" class="buttoncss" value="������Ʒ����">
                          </div></td>
                          <td width="125"><div align="center"><a href="gouwu2.php">ȥ����̨</a></div></td>
                          <td width="125"><div align="center"><a href="gouwu1.php?qk=yes">��չ��ﳵ</a></div></td>
                          <td width="125"><div align="left">�ܼƣ�<?php echo $total;?></div></td>
                        </tr>
                      </table>
                  </div></td>
                </tr>
                <?php
			 }
			?>
            </table></td>
          </tr>
        </form>
    </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>