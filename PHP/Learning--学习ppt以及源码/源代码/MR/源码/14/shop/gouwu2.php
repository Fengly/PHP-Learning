<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" height="438" valign="top" bgcolor="#F4F4F4"><div align="center">
      <?php include("left.php");?>
      </div></td>
    <td width="557" align="center" valign="top" bgcolor="#FFFFFF">       <script language="javascript">
		   function chkinput(form){
			   if(form.name.value==""){
				  alert("�������ջ�������!");
				  form.name.select();
				  return(false);
				}
				if(form.dz.value==""){
				  alert("�������ջ��˵�ַ!");
				  form.dz.select();
				  return(false);
				}
				if(form.yb.value==""){
				  alert("�������ջ����ʱ�!");
				  form.yb.select();
				  return(false);
				}
				if(form.tel.value==""){
				  alert("�������ջ�����ϵ�绰!");
				  form.tel.select();
				  return(false);
				}
				if(form.email.value==""){
				  alert("�������ջ���E-mail��ַ!");
				  form.email.select();
				  return(false);
				
				}
				if(form.email.value.indexOf("@")<0){
				    alert("�ջ���E-mail��ַ��ʽ�������!");
				    form.email.select();
				    return(false);
				 }
				return(true);
			 }
		 </script>
      <table width="557" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="6"></td>
        </tr>
      </table>
      <table width="530" border="0" align="center" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FCC223">
      <tr>
        <td height="25" bgcolor="#FEDD9A"><div align="center" style="color: #720206">�ջ�����Ϣ</div></td>
      </tr>
      <tr>
        <td height="295"><table width="530" height="293" border="0" align="center" cellpadding="0" cellspacing="1">

            <form name="form1" method="post" action="savedd.php" onSubmit="return chkinput(this)">
              <tr>
                <td width="100" height="25" bgcolor="#FFFFFF"><div align="center">�ջ���������</div></td>
                <td width="183" bgcolor="#FFFFFF"><div align="left">
                    <input type="text" name="name2" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                </div></td>
                <td width="86" bgcolor="#FFFFFF"><div align="center">�Ա�</div></td>
                <td width="176" bgcolor="#FFFFFF"><div align="left">
                    <select name="sex">
                      <option selected value="��">��</option>
                      <option value="Ů">Ů</option>
                    </select>
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">�������룺</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <input type="text" name="yb" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">��ϵ�绰��</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <input type="text" name="tel" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">�������䣺</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <input type="text" name="email" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">��ϸ��ַ��</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <input name="dz" type="text" class="inputcss" id="dz" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'" size="50">
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">�ͻ���ʽ��</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <select name="shff" id="shff">
                      <option selected value="��ͨƽ��">��ͨƽ��</option>
                      <option value="�ؿ�ר��">�ؿ�ר��</option>
                      <option value="�ͻ�����">�ͻ�����</option>
                      <option value="�����ͻ�">�����ͻ�</option>
                      <option value="E-mail">E-mail</option>
                    </select>
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">֧����ʽ��</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <select name="zfff" id="zfff">
                      <option selected value="�������л��">�������л��</option>
                      <option value="��ͨ���л��">��ͨ���л��</option>
                      <option value="�ʾֻ��">�ʾֻ��</option>
                      <option value="����֧��">����֧��</option>
                    </select>
                </div></td>
              </tr>
              <tr>
                <td height="86" bgcolor="#FFFFFF"><div align="center">�����ԣ�</div></td>
                <td height="86" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <textarea name="ly" cols="70" rows="5" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></textarea>
                </div></td>
              </tr>
              <tr>
                <td height="22" colspan="4" bgcolor="#FFFFFF"><div align="center">
                    <input name="submit2" type="submit" class="buttoncss" value="�ύ����">
                </div></td>
              </tr>
            </form>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
 if(isset($_GET['dingdanhao']) && $_GET['dingdanhao']!=""){//��������Ų�Ϊ��
    $dd=$_GET['dingdanhao'];//��ȡ������
     session_start();//��ʼ��session����
     $array=explode("@",$_SESSION['producelist']);//���Ӵ�@��Ϊ�ָ�����ַ����ָ�����ָ���һ�������Ӵ����������ʽ����
	 $sum=count($array)*20+260;//���㴰�����ʾ�߶�
    echo" <script language='javascript'>";//JavaScript�ű���ʶ��俪ʼ
	echo" window.open('showdd.php?dd='+'".$dd."','newframe','top=150,left=200,width=600,height=".$sum.",menubar=no,toolbar=no,location=no,scrollbars=no,status=no ')";//���´���showdd.phpҳ�����������Ϣ
	echo "</script>";//JavaScript�ű���ʶ������
  }
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
