function checkphone(lxdh){
	var str=lxdh;
	 //��JavaScript�У�������ʽֻ��ʹ��"/"��ͷ�ͽ���������ʹ��˫����
	var Expression=/(\d{3}-)(\d{8})$|(\d{4}-)(\d{7})$/;  //ƥ���ַ����е�ָ��λ����(\d{8})$������8�����ֽ�β
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}	
function yhdl_check(dlform)
{
    if (dlform.username.value == "")
	{
		alert("�û�������Ϊ�գ�");
		dlform.username.focus();
		return (false);
	}
	if (dlform.password.value == "")
	{
		alert("���벻��Ϊ�գ�");
		dlform.password.focus();
		return (false);
	}
}


function is_null(object_name,tishi,word,kongge)  // object_name Ϊ�������ƣ�tishi=1 Ϊ�Ƿ���ʾ�Ի���,word Ϊ��ʾ���,kongge=1 Ϊȥ���ո�,
{
	var string;
	string=new String(object_name);
	if (kongge==1)
	{string=javaTrim(string);} //ɾ���ո���ַ� 
	//alert("���ص��ַ���="+string+"����Ϊ="+string.length)
	if (string.length==0)
	{
		if (tishi==1)
		{
		alert(word);
		}
		return false;
	}
}
   
//ɾ���ַ���ͷ�ͽ�β�Ŀո�
function javaTrim(str){
	var i=0;
	var j;
	var len=str.length;

	trimstr="";
	if(j<0) return trimstr;
	flagbegin= true;
	flagend= true;
		
	while (flagbegin== true){
		if (str.charAt(i)==" "){
			i++;
			flagbegin=true;
		}
		else
		{
			
			flagbegin=false;
		}
	} 
	//ǰ����i���ո�
	j=len-1;
	var k=0;
	while (flagend==true)
	{
		if (str.charAt(j)==" ")
		{
			j--;
			flagend=true;
			k++;
		}
		else{
			flagend=false;
		}
	}
        
	//������k���ո�
	//alert('ǰ����'+i+'���ո�');
	//alert('������'+k+'���ո�');
	if (str.length==i)
	{
	 //alert("�������ȫΪ�ո�")
	 trimstr="";
	 return trimstr;
	}
	trimstr=str.substring(i,j+1);
	//alert("bf"+trimstr+"fb");
	return trimstr;
}

// �жϵ����ʼ��Ƿ��ʽ��ȷ
function is_email(object_name)
{
	var string;
	string=new String(object_name);
	var len=string.length;
	if (string.indexOf("@",1)==-1||string.indexOf(".",1)==-1||string.length<7)
		{
		alert("��������ĸ�ʽ���ԣ���������д��");
		return false;
		}
	if (string.charAt(len-1)=="."||string.charAt(len-1)=="@")
		{
		alert("��������ĸ�ʽ���ԣ���������д��");
		return false;
		}
}
   

//�ж�����������С����󳤶��Ƿ�Խ��
function over_length(object_name,max,min,max_word,min_word,kongge) //kongge=1 Ϊ������ַ����еĿո�
{
	var string;
	string=new String(object_name);
	if (kongge==1)
		{
		 string=javaTrim(string);
		}
	if (string.length>max)
		{
		 alert(max_word);
		 return false;
		}
	if (string.length<min)
		{
		 alert(min_word);
		 return false;
		}
	}
   function isWhitespace (s) //�Ƿ�����ո�
    {  
  		var whitespace = " \t\n\r";
 	    var i;
  		for (i = 0; i < s.length; i++)
  		 {   
            var c = s.charAt(i);
   		    if (whitespace.indexOf(c) >= 0) 
			   {
			  return true;
	 			 }
  			}

     return false;
    }
function IsPassword(strPassword)
{
	if(strPassword=="") return false;
	var lngLength = strPassword.length;
	var strCharSet="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"
	for(i=0; i<lngLength; i++)
	{
		if (strCharSet.search(strPassword.substr(i,1))<0) return false;
	}
	return true;
}
//������̳ע��У��
function checkit(){

//�û���   
	if (zhuce.zc_username.value == "" || zhuce.zc_username.value.length<6){
		alert("�û�������Ϊ���Ҳ�������6���ַ���");
		zhuce.zc_username.focus();
		return (false);	 
	}
	if (zhuce.zc_username.value.length>32){
		alert("��Ա�����ܶ���32λ��");
		zhuce.zc_username.focus();
		return (false);	 
	}
	for (i=1;i<zhuce.zc_username.value.length;i++){
    		ct=zhuce.zc_username.value.charAt(i);
		if (!((ct>='0'&&ct<='9')||(ct>='a'&&ct<='z')||(ct>='A'&&ct<='Z')||ct=='_')){
			alert("��Ա����ֻ����ʹ��Ӣ���ַ��������Լ��ַ�\'_\'");
			zhuce.zc_username.focus();
			return(false);
		}
	

         }
//����
         if (zhuce.zc_password.value == "" || zhuce.zc_password.value.length<6){		  		
		alert("���벻������6λ��");
		zhuce.zc_password.focus();
		return (false);	 
         }
         for (i=1;i<zhuce.zc_password.value.length;i++){
		ct=zhuce.zc_password.value.charAt(i);
		if (!((ct>='0'&&ct<='9')||(ct>='a'&&ct<='z')||(ct>='A'&&ct<='Z')||ct=='_')){
			alert("����ֻ����ʹ��Ӣ���ַ��������Լ��ַ�\'_\'");
			zhuce.zc_password.focus();
			return(false);
		}
         }
//ȷ������

         if (zhuce.mmqr.value =="" || zhuce.mmqr.value.length<6){
		alert("������ȷ������");
		zhuce.mmqr.focus();
		return(false);	 
         }
         if (zhuce.zc_password.value !=zhuce.mmqr.value){
		alert("ȷ����������벻��,����������");
		zhuce.mmqr.focus();
		return(false);	 
         }

//��ʵ����
        if (zhuce.zsxm.value == "")
        {
		alert("����д��Ч����ʵ������");
	        zhuce.zsxm.focus();
		return (false);
        }

//��ϵ��ַ
        if (zhuce.lxdz.value == "")
        {
		alert("����д��Ч����ϵ��ַ��");
	        zhuce.lxdz.focus();
		return (false);
        }
//��ϵ�绰

	if(zhuce.lxdh.value==""){
		alert("������绰����!");
		zhuce.lxdh.focus();
		return (false);
	}
	if(!checkphone(zhuce.lxdh.value)){
		alert("������绰���벻�Ϸ�!");zhuce.lxdh.focus();
		return (false);
	}


 
//�����ʼ�		
        if (zhuce.email.value=="")
        {
          alert ("����������ʼ�!");
          zhuce.email.focus();
          return false;
        }
        if (zhuce.email.value.indexOf('@',0)==-1 || zhuce.email.value == "" || zhuce.email.value.indexOf('.',0)==-1) 
        {
           alert("������������ȷ�ĵ����ʼ���ַ!");
           zhuce.email.focus();
           return false;
        }
        Str = zhuce.email.value
        thePos = Str.indexOf('@',0) + 1
        if (Str.indexOf('@', thePos) != -1 || Str.indexOf(';', thePos) != -1 || Str.indexOf(',', thePos) != -1 || Str.indexOf(' ', thePos) != -1 || Str.indexOf('��', thePos) != -1 || Str.indexOf('��', thePos) != -1) 
        {
          alert("������������ȷ�ĵ����ʼ���ַ!");
          zhuce.email.focus();
          return false;
        }
}

function user_check(form){
	if (zhuce.zc_username.value!="" && zhuce.zc_username.value.length>=6){
		 form.action="";
		 form.submit();
	 }else{
		  alert("�û�������Ϊ���Ҳ�������6���ַ�");
		}
}

