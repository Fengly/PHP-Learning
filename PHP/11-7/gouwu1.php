<?php
session_start();									//��ʼ��session����
if(!isset($_SESSION['username'])) {                      	//�ж��û��Ƿ��Ѿ���¼
  echo "<script>alert('���ȵ�¼����!');location.href='login.php';</script>";  //����û�δ��¼������ʾ�û��ȵ�¼����ת����¼ҳ��
  exit;                                                    //��exit���ֹͣ����ļ���ִ��
 } else {
     ?>
    <html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <div align="center">
        <label>?</label>
    </div>
    </body>
    </html>
<?php
}
?>
