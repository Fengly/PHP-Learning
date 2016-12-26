<?php
include_once("top.php");
?>
<table width="779" height="23" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="292" background="images/dh_back.gif"><div align="right">今天是：&nbsp;<script language=JavaScript>
   today=new Date();
   function initArray(){
   this.length=initArray.arguments.length
   for(var i=0;i<this.length;i++)
   this[i+1]=initArray.arguments[i]  }
   var d=new initArray(
     "星期日",
     "星期一",
     "星期二",
     "星期三",
     "星期四",
     "星期五",
     "星期六");
document.write(
     "<font color=#000000 style='font-size:9pt;font-family: 宋体'> ",
     today.getYear(),"年",
     today.getMonth()+1,"月",
     today.getDate(),"日",
	  "&nbsp;&nbsp;",
     d[today.getDay()+1],
	"</font>" ); 
</script></div></td>
    <td width="487" background="images/dh_back.gif"><div align="center">您当前的位置：明日留言本&nbsp;>>&nbsp;<a href="index.php" class="a1">首&nbsp;&nbsp;页</a></div></td>
  </tr>
</table>
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5" height="315" bgcolor="#95DAFF"></td>
    <td width="200" valign="top"><?php include_once("left.php");?></td>
    <td width="6" bgcolor="#95DAFF"></td>
    <td  valign="top">
	
	      <?php
			 $sql=mysqli_query($conn,"select count(*) as total from tb_leaveword ");
			 $info=mysqli_fetch_array($sql);
			 $total=$info['total'];
			 if($total==0){
			  echo "<div align=center>对不起，暂无留言！</div>";
			 }else{
			   if(!isset($_GET["page"]) || !is_numeric($_GET["page"])){
			      $page=1; 
			   }else{
			      $page=intval($_GET["page"]);
			   }
			   
			   $pagesize=3;
			   if($total%$pagesize==0){
			      $pagecount=intval($total/$pagesize);
			   }else{
			      $pagecount=ceil($total/$pagesize);
			   }
			   $sql=mysqli_query($conn,"select * from tb_leaveword order by createtime desc limit ".($page-1)*$pagesize.",$pagesize  ");
			   while($info=mysqli_fetch_array($sql)){
			  
	     ?>
	<table width="520" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td></td>
      </tr>
    </table>
      <table width="550" height="155" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#95DAFF">
        <tr>
          <td bgcolor="#FFFFFF" valign="top"><table width="550" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="450" background="images/dh_back_1.gif">&nbsp;主&nbsp;&nbsp;题：<?php echo unhtml($info["title"]);?></td>
              <td width="100" background="images/dh_back_1.gif"><div align="center">
			  <script language="javascript">
			    function openeditwindow(x){
				
				   window.open("editleaveword.php?id="+x,"newframe","top=100,left=200,width=450,height=280,menubar=no,location=no,scrollbars=no,status=no");
				  
				}
			  
			  </script>
			 <?php 
			   $sqlu=mysqli_query($conn,"select usernc from tb_user where id='".$info["userid"]."'");
			   $infou=mysqli_fetch_array($sqlu);
			   if(isset($_SESSION["unc"]) && $infou["usernc"]==$_SESSION["unc"]){
			 ?> 
			    <a href="javascript:openeditwindow(<?php echo $info['id'];?>)" class="a1">编辑</a>
			 <?php
			  }
			 ?> 
			 &nbsp;
			 <?php
			  if(isset($_SESSION["unc"])){
			   $sqld=mysqli_query($conn,"select usertype from tb_user where usernc='".$_SESSION["unc"]."'");
               $infod=mysqli_fetch_array($sqld);
			   if($infod["usertype"]==1){  
 			 ?>
			  <a href="javascript:if(window.confirm('确定删除该留言信息么？')==true){window.location.href='deleteleaveword.php?id=<?php echo $info['id'];?>';}" class="a1">删除</a>
			 <?php
			   }
			  }
			 ?>
			  </div></td>
            </tr>
          </table>
            <table width="550" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td></td>
              </tr>
            </table>
			
			<table width="550" height="120" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="150" height="90"><div align="center"><img src="<?php
				 $sql1=mysqli_query($conn,"select usernc,face,ip,email,qq from tb_user where id='".$info["userid"]."'");
				 $info1=mysqli_fetch_array($sql1); 
				 echo $info1["face"];
				 
				 ?>" /><br><?php echo $info1["usernc"];?></div></td>
                <td width="10" background="images/line_down.gif"></td>
                <td width="390" rowspan="2"><?php echo unhtml($info["content"]);?></td>
              </tr>
              <tr>
                <td height="30"><div align="center"><img src="images/email.gif" width="45" height="16" alt="<?php echo $info1['email'];?>"/><img src="images/ip.gif" width="55" height="16"  alt="<?php echo $info1['ip'];?>"/><img src="images/qq.gif" width="45" height="16"  alt="<?php echo $info1['qq'];?>"/></div></td>
                <td width="10" background="images/line_down.gif"></td>
              </tr>
            </table>
			
		  </td>
        </tr>
      </table>
	   <?php
			 }
		  }
		?>
			
			
	  
	   <table width="550" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr>
           <td width="351"><div align="left">共有留言&nbsp;<?php echo $total;?>&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount;?>&nbsp;页</div></td>
           
           <td width="199"><div align="right"><a href="<?php echo $_SERVER['PHP_SELF']?>?page=1" class="a1">首页</a>&nbsp;<a href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php 
		 if($page>1) 
		  
		   echo $page-1;
		  else
		   echo 1;  
		   ?>" class="a1">上一页</a>&nbsp;<a href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php 
		 if($page<$pagecount) 
		  
		   echo $page+1;
		  else
		   echo $pagecount;  
		   ?>" class="a1">下一页</a>&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $pagecount;?>" class="a1">尾页</a></div></td>
         </tr>
       </table></td>
    <td width="5" bgcolor="#95DAFF"></td>
  </tr>
</table>
<?php
include_once("bottom.php");
?>
