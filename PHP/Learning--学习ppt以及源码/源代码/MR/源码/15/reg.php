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
    <td width="487" background="images/dh_back.gif"><div align="center">您当前的位置：明日留言本&nbsp;>>&nbsp;<a href="reg.php" class="a1">用户注册</a></div></td>
  </tr>
</table>
<table width="779" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5" height="315" bgcolor="#FAF3CE"></td>
    <td width="200" valign="top"><?php include_once("left.php");?></td>
    <td width="6" bgcolor="#FAF3CE"></td>
    <td  valign="top"><table width="520" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td></td>
      </tr>
    </table>
      <table width="550" height="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FCD424">
        <tr>
          <td bgcolor="#FFFFFF" valign="top"><table width="550" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td background="images/dh_back_1.gif">&nbsp;&nbsp;<img src="images/biao.gif">&nbsp;用户注册</td>
              </tr>
            </table>
			
			 <br>
              <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="1" bgcolor="#FFF09F"></td>
                </tr>
              </table>
            <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="1"></td>
                </tr>
            </table>
            <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="1" bgcolor="#FFF09F"></td>
                </tr>
            </table>
           
              <table width="480" height="70" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                      <font color="#0000FF">注册声明:</font>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    <br>
                    
                    （1）煽动抗拒、破坏宪法和法律、行政法规实施的；<br>
                    （2）煽动颠覆国家政权，推翻社会主义制度的；<br>
                    （3）捏造或者歪曲事实，散布谣言，扰乱社会秩序的；<br><br>
                   </td>
                </tr>
            </table>
            <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="1" bgcolor="#FFF09F"></td>
                </tr>
            </table>
            <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="1"></td>
                </tr>
            </table>
            <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="1" bgcolor="#FFF09F"></td>
                </tr>
            </table>
            <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
              
			
			 <script language="javascript">
			 
			   function chkinput(form){
			    
				 if(form.usernc.value==""){
				   alert("请输入用户昵称！");   
				   form.usernc.focus();
				   return(false);
				 }
				 
				 if(form.userpwd.value==""){
				 
				   alert("请输入注册密码！");   
				   form.userpwd.focus();
				   return(false);
				 
				 }
				 
				  if(form.userpwd1.value==""){
				 
				   alert("请输入重复密码！");   
				   form.userpwd1.focus();
				   return(false);
				 
				 }
				 if(form.userpwd.value!=form.userpwd1.value){
				 
				   alert("密码与确认密码不同！");   
				   form.userpwd.focus();
				   return(false); 
				 
				 }
				 
				 if(form.userpwd.value.length<6){
				 
				   alert("密码长度应大于6位！");   
				   form.userpwd.focus();
				   return(false); 
				 
				 }
				 
				 if(form.truename.value==""){
				   alert("请输入真实姓名！");
				   form.truename.focus();
				   return(false);
				 }
				 if(form.sex.value==""){
				   alert("请选择性别！");
				   form.sex.focus();
				   return(false);
				 }
				 
				 if(form.email.value==""){
	               alert("请输入E-mail地址!");
	               form.email.focus();
	               return(false);
	             }
				
	             var i=form.email.value.indexOf("@");
	             var j=form.email.value.indexOf(".");
	             if((i<0)||(i-j>0)||(j<0)){
                   alert("请输入正确的E-mail地址!");
	               form.email.select();
	               return(false);
	             }
				 
				 if(form.tel.value==""){
				   alert("请输入联系电话！");
				   form.tel.focus();
				   return(false);
				 } 
				 
				 if(isNaN(form.tel.value)){
				   alert("联系电话只能为数字！");
				   form.tel.focus();
				   return(false);
				 }
				 
				 if(form.qq.value==""){
				   alert("请输入联系QQ！");
				   form.qq.focus();
				   return(false);
				 } 
				 
				 if(isNaN(form.qq.value)){
				   alert("QQ只能为数字！");
				   form.qq.focus();
				   return(false);
				 }
				 
				 

			     if(form.address.value==""){
				   alert("请输入联系地址！");
				   form.address.focus();
				   return(false);
				 } 
			  
			    return(true);
			     
			   }
			  
			  </script>
			
			
			
			
			  
			  <form name="form1" method="post" action="savereg.php" onSubmit="return chkinput(this)">
			    <tr>
                  <td width="110" height="30"><div align="center">用户昵称：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <input type="text" name="usernc" size="25" class="inputcss"></td>
                </tr>
				 <tr>
                  <td width="110" height="30"><div align="center">密&nbsp;&nbsp;码：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <input type="password" name="userpwd" size="25" class="inputcss"></td>
                </tr>
				 <tr>
                  <td width="110" height="30"><div align="center">重复密码：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <input type="password" name="userpwd1" size="25" class="inputcss"></td>
                </tr>
                <tr>
                  <td height="30"><div align="center">真实姓名：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <input type="text" name="truename" size="25" class="inputcss"></td>
                </tr>
                <tr>
                  <td height="30"><div align="center">性&nbsp;&nbsp;别：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <select name="sex">
                        <option value="">请选择</option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                      </select>                  </td>
                </tr>
                <tr>
                  <td height="30"><div align="center">E-mail地址：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <input type="text" name="email" size="25" class="inputcss"></td>
                </tr>
                <tr>
                  <td height="30"><div align="center">联系电话：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <input type="text" name="tel" size="25" class="inputcss"></td>
                </tr>
                <tr>
                  <td height="30"><div align="center">QQ号码：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <input type="text" name="qq" size="25" class="inputcss"></td>
                </tr>
                <tr>
                  <td height="30"><div align="center">头像选择：</div></td>
                  <td width="90" height="30">&nbsp;
				  <select name="face" onchange="form1.user_face.src=this.value">
                      <?php
					  for($i=0;$i<=11;$i++){
					  ?>
					   <option value="<?php echo "images/face/".$i.".gif"?>"><?php echo $i.".gif"?></option>
					  <?php
					  }
					  ?>
                  </select></td>
                  <td width="280">
                  <div align="left"><img id=user_face src="images/face/0.gif" width="60" height="60"></div></td>
                </tr>
                <tr>
                  <td height="30"><div align="center">联系地址：</div></td>
                  <td height="30" colspan="2">&nbsp;
                      <input type="text" name="address" size="35" class="inputcss"></td>
                </tr>
                <tr>
                  <td height="45" colspan="3"><div align="center">
                    <input name="submit" type="submit" class="buttoncss" value="注册">
                    &nbsp;&nbsp;&nbsp;
                    <input name="reset" type="reset" class="buttoncss" value="重写">
                  </div></td>
                </tr>
		      </form>
				
            </table></td>
        </tr>
      </table></td>
    <td width="5" bgcolor="#FAF3CE"></td>
  </tr>
</table>
s
<?php
include_once("bottom.php");
?>
