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
    <td width="487" background="images/dh_back.gif"><div align="center">您当前的位置：明日留言本&nbsp;>>&nbsp;<a href="searchword.php" class="a1">查询留言</a></div></td>
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
      <table width="550" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FCD424">
	
	 <script language="javascript">
	   function chkinput_search(form){
	     if(form.type.value==""){
		   alert('请选择查询条件！');
		   form.type.focus();
		   return(false);
		 }
		  if(form.keyword.value==""){
		   alert('请输入查询关键字！');
		   form.keyword.focus();
		   return(false);
		 }
		 return(true);
	   
	   } 
	 </script>
       <form name="form1" method="post" action="<?php echo $_SERVER["PHP_SELF"];?> " onsubmit="return chkinput_search(this)">
	    <tr>
          <td bgcolor="#FFFFFF" valign="top"><table width="550" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td background="images/dh_back_1.gif">&nbsp;&nbsp;查找留言</td>
            </tr>
          </table>
            <table width="550" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><div align="center">请选择查找方式：
                  <select name="type">
				    <option value="">请选择</option>
                    <option value="1">主题</option>
                    <option value="2">内容</option>
                    <option value="3">留言者</option>
                  </select>&nbsp;<input type="text" name="keyword" size="25" class="inputcss">&nbsp;<input type="submit" value="查询" class="buttoncss" name="submit">
                </div></td>
              </tr>
            </table>
		
		  </td>
        </tr>
		</form>
      </table>
	  
	  
	  <?php
	    
	   if(isset($_POST["submit"]) && $_POST["submit"]!=""){
	     $type=$_POST["type"];
	     $keyword=$_POST["keyword"];
		 if($type==1){
		  $sql=mysqli_query($conn,"select * from tb_leaveword where title like '%".$keyword."%'");
		 }elseif($type==2){
		  $sql=mysqli_query($conn,"select * from tb_leaveword where content like '%".$keyword."%'");
		 }elseif($type==3){
		  $sql0=mysqli_query($conn,"select id from tb_user where usernc='".$keyword."'");
		  $info0=mysqli_fetch_array($sql0);
		  $sql=mysqli_query($conn,"select * from tb_leaveword where userid='".$info0["id"]."'");
		 }
		 
		 $info=mysqli_fetch_array($sql);
		 if($info==false){
		  echo "<br><br><div align=center>对不起，没有查找到您要查找的内容！</div>";
		 }else{
		   do{
	  ?>
	  
	  
	  <table width="520" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td></td>
      </tr>
    </table>
      <table width="550" height="155" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FCD424">
        <tr>
          <td bgcolor="#FFFFFF" valign="top"><table width="550" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td background="images/dh_back_1.gif">&nbsp;主&nbsp;&nbsp;题：<?php echo unhtml($info["title"]);?></td>
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
				 
				 ?>" /><br><?php echo $info1["usernc"]; ?></div></td>
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
	     }while($info=mysqli_fetch_array($sql));
		 } 
	   }
	  
	  ?>
	  
	  
      </td>
    <td width="5" bgcolor="#FAF3CE"></td>
  </tr>
</table>
<?php
include_once("bottom.php");
?>
