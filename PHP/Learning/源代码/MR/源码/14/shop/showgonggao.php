<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209"  height="438" valign="top" bgcolor="#F0F0F0"><?php include("left.php");?></td>
    <td width="557" align="center" valign="top" bgcolor="#FFFFFF">      <table width="557" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="557" height="46" background="images/gg.gif"><div align="left"></div></td>
        </tr>
      </table>
      <?php
	   $sql=mysqli_query($conn,"select count(*) as total from tb_gonggao");
	   $info=mysqli_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0)
	   {
	     echo "��վ���޹���!";
	   }
	   else
	   {
	   ?>
      <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#EEEEEE">
          <td width="296" height="20"><div align="center">��������</div></td>
          <td width="136"><div align="center">����ʱ��</div></td>
          <td width="68"><div align="center">�鿴����</div></td>
        </tr>
        <?php
 
    
	       $pagesize=20;
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
			 
             $sql1=mysqli_query($conn,"select * from tb_gonggao order by time desc limit ".($page-1)*$pagesize.",$pagesize ");
             while($info1=mysqli_fetch_array($sql1))
		     {
		  ?>
        <tr>
          <td height="20"><div align="left">-<?php echo $info1['title'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['time'];?></div></td>
          <td height="20"><div align="center"><a href="showgg.php?id=<?php echo $info1['id'];?>">�鿴</a></div></td>
        </tr>
        <?php
	    }
		
		?>
        <tr>
          <td height="20" colspan="3"> &nbsp;
              <div align="right">��վ���й���&nbsp;
                  <?php
		   echo $total;
		  ?>
&nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="showgonggao.php?page=1" title="��ҳ"><font face="webdings"> 9 </font></a> <a href="showgonggao.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font face="webdings"> 7 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="showgonggao.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="showgonggao.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="showgonggao.php?page=<?php echo $page-1;?>" title="��һҳ"><font face="webdings"> 8 </font></a> <a href="showgonggao.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="βҳ"><font face="webdings"> : </font></a>
        <?php }?>
            </div></td>
        </tr>
      </table>
    <?php
	    }
		
		?></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>