<?php
include("top.php");
include("function.php");
$spid=isset($_GET['spid'])?$_GET['spid']:"";
$id=$_GET['id'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="css/font.css">
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" height="438" valign="top" bgcolor="#FFFFFF"><div align="center">
      <?php
	   include("left.php");
	?>
      </div></td>
    <td width="581" valign="top" bgcolor="#FFFFFF"><table width="550" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="left"><a href="javascript:history.back();">����</a></div></td>
      </tr>
    </table>
      <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#FDE9C9">
          <td height="25" colspan="4"><div align="center" style="color: #990000">��Ʒ����</div></td>
        </tr>
        <?php
       $sql=mysqli_query($conn,"select count(*) as total from tb_pingjia where spid='".$_GET['id']."'");
	   $info=mysqli_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0)
	   {
	     echo "����Ʒ����������Ϣ!";
	   }
	   else
	   {
	       $pagesize=3;
		   if ($total<=$pagesize){
		      $pagecount=1;
			} 
			if(($total%$pagesize)!=0){
			   $pagecount=intval($total/$pagesize)+1;
			
			}else{
			   $pagecount=$total/$pagesize;
			
			}
			if(!isset($_GET['page'])){
			    $page=1;
			
			}else{
			    $page=intval($_GET['page']);
			
			}
             $sql1=mysqli_query($conn,"select * from tb_pingjia where spid='".$_GET['id']."' order by time desc limit ".($page-1)*$pagesize.",$pagesize ");
             while($info1=mysqli_fetch_array($sql1))
		     {
		  ?>
        <tr>
          <td width="70" height="20"><div align="center">��Ʒ���ƣ�</div></td>
          <td width="181"><div align="left">
              <?php 
		     $spid=$info1['spid'];
			 $sql2=mysqli_query($conn,"select mingcheng from tb_shangpin where id=".$spid."");
			 $info2=mysqli_fetch_array($sql2);
			 echo $info2['mingcheng'];
		  ?>
          </div></td>
          <td width="70"><div align="center">����ʱ�䣺</div></td>
          <td width="229"><div align="left"><?php echo $info1['time'];?></div></td>
        </tr>
        <tr>
          <td height="20"><div align="center">�����ߣ�</div></td>
          <td height="20" colspan="3"><div align="left">
              <?php 
		     $spid=$info1['userid'];
			 $sql3=mysqli_query($conn,"select name from tb_user where id=".$spid."");
			 $info3=mysqli_fetch_array($sql3);
			 echo $info3['name'];
			
		  ?>
          </div></td>
        </tr>
        <tr>
          <td height="20"><div align="center">�������⣺</div></td>
          <td height="20" colspan="3"><div align="left"><?php echo unhtml($info1['title']);?></div></td>
        </tr>
        <tr>
          <td height="40"><div align="center">�������ݣ�</div></td>
          <td height="40" colspan="3" valign="bottom"><div align="left"><?php echo unhtml($info1['content']);?></div></td>
        </tr>
        <tr>
          <td height="10" colspan="4" background="images/line1.gif"></td>
        </tr>
        <?php
		   }
		
		  ?>
      </table>
      <table width="550" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="right"> &nbsp;��վ���и���Ʒ����&nbsp;
                  <?php
		   echo $total;
		  ?>
&nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="showpl.php?page=1" title="��ҳ"><font face="webdings"> 9 </font></a> <a href="showpl.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>" title="ǰһҳ"><font face="webdings"> 7 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="showpl.php?page=<?php echo $i;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="showpl.php?page=<?php echo $i;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="showpl.php?page=<?php echo $page-1;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>" title="��һҳ"><font face="webdings"> 8 </font></a> <a href="editgoods.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>" title="βҳ"><font face="webdings"> : </font></a>
        <?php }?>
          </div></td>
        </tr><?php }?>
      </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>