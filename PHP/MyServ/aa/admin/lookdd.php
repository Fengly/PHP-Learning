<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�鿴����</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<body topmargin="0" leftmargin="0" bottommargin="0">
<?php
    include("conn/conn.php");
?>
 <?php
	   $sql=mysqli_query($conn,"select count(*) as total from tb_dingdan ");
	   $info=mysqli_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0){
	     echo "��վ���޶���!";
	   }
	   else{
	       $pagesize=10;
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
           $sql1=mysqli_query($conn,"select * from tb_dingdan order by time desc limit ".($page-1)*$pagesize.",$pagesize");
		   $info1=mysqli_fetch_array($sql1);
?>
<form name="form1" method="post" action="deletedd.php">   
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" bgcolor="#FFCF60"><div align="center" class="style1">�鿴���� </div></td>
  </tr>
  <tr>
    <td height="40" bgcolor="#666666"><table width="750" height="44" border="0" align="center" cellpadding="0" cellspacing="1">
     
	  <tr>
        <td width="121" height="20" bgcolor="#FFFFFF"><div align="center">������</div></td>
        <td width="59" bgcolor="#FFFFFF"><div align="center">�µ���</div></td>
        <td width="60" bgcolor="#FFFFFF"><div align="center">������</div></td>
        <td width="70" bgcolor="#FFFFFF"><div align="center">����ܼ�</div></td>
        <td width="88" bgcolor="#FFFFFF"><div align="center">���ʽ</div></td>
        <td width="87" bgcolor="#FFFFFF"><div align="center">�ջ���ʽ</div></td>
        <td width="141" bgcolor="#FFFFFF"><div align="center">����״̬</div></td>
        <td width="115" bgcolor="#FFFFFF"><div align="center">����</div></td>
      
	  </tr>
	  <?php
		    do{
			  $array=explode("@",$info1['spc']);
		      $sum=count($array)*20+260;
	  ?>
      <tr>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['dingdanhao'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['xiadanren'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['shouhuoren'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['total'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['zfff'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['shff'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['zt'];?></div></td>
        <td height="21" bgcolor="#FFFFFF"><div align="center">
		    <input name="button" type="button" class="buttoncss" id="button" onClick="javascript:window.open('showdd.php?id=<?php echo $info1['id'];?>',
                'newframe','width=600,height=<?php echo $sum;?>,, +,left=100,top=100,menubar=no,toolbar=no,location=no,scrollbars=no')" value="�鿴"
            >
		    &nbsp;
		    <input name="button2" type="button" class="buttoncss" id="button2" onClick="javascript:window.location='orderdd.php?id=<?php echo $info1['id'];?>';" value="ִ��">       
            <input type="checkbox"  name=<?php echo $info1['id'];?> value=<?php echo $info1['id'];?>></div></td>
      </tr>
	  <?php
	      }while($info1=mysqli_fetch_array($sql1))
	  ?>
	 
    </table></td>
  </tr>
</table>
<table width="750" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="652"><div align="right">
	��վ���ж���
	    <?php
		   echo $total;
		  ?>        
	    &nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="lookdd.php?page=1" title="��ҳ"><font face="webdings"> 9 </font></a>
              <a href="lookdd.php?id=<?php echo $info1['id'];?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font face="webdings"> 7 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="lookdd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="lookdd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="lookdd.php?page=<?php echo $page-1;?>" title="��һҳ"><font face="webdings"> 8 </font></a> 
		<a href="lookdd.php?id=<?php echo $info1['id'];?>&page=<?php echo $pagecount;?>" title="βҳ"><font face="webdings"> : </font></a>
        <?php }?>

	</div></td>
    <td width="98"><div align="center"><input type="hidden" name="page_id" value=<?php echo $page;?>><input type="submit" value="ɾ��ѡ����" class="buttoncss"></div></td>
  </tr>
</table>
<?php
 }
?>
</form>
</body>
</html>
