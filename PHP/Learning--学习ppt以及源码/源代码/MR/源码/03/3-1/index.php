<?php
/*ʹ��define������������ΪMESSAGE�ĳ�������Ϊ�丳ֵΪ���ܿ���һ�Ρ���Ȼ��ֱ��������MESSAGE��Message����Ϊû������Case_sensitive����Ϊtrue�����Ա�ʾ��Сд���У����ִ�г���ʱ������������Ϊû�ж���ó����������ʾ������Message��Ϊ��ͨ�ַ������ */
define("MESSAGE","�ܿ���һ��");		
echo MESSAGE;           			
echo Message;  
/*ʹ��define������������ΪCOUNT�ĳ�������Ϊ�丳ֵΪ���ܿ�����Ρ���������Case_sensitive����Ϊtrue����ʾ��Сд�����У��ֱ��������COUNT��Count����Ϊ�����˴�С�����У���˳������Ϊ����COUNT��ͬһ��������ͬ�������ֵ*/               
define("COUNT","�ܿ������",true);  	
echo "<br>";               			
echo COUNT;             			
echo "<br>";                    		
echo Count;              			
echo "<br>";                 		
echo constant("Count");			//ʹ��constant��������ȡ��ΪCount������ֵ�������
echo "<br>";                  		//������з�
echo (defined("MESSAGE"));  		//�ж�MESSAGE�����Ƿ��ѱ���ֵ������ѱ���ֵ�����1�������δ����ֵ�򷵻�false
?>
