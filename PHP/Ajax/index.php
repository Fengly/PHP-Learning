<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>通过XMLHttpRequest对象请求HTML文件</title>
</head>
<body bgcolor="#00ffff">
<div align="center">
    <img src="wukong.jpg" width="352" height="220"><p>
    <script language="JavaScript">
        var xmlHttp;
        function createXmlHttpRequestObject() {
            if (window.ActiveXObject) {
                try {
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    xmlHttp = false;
                }
            } else {
                try {
                    xmlHttp = new XMLHttpRequest();
                } catch (e) {
                    xmlHttp = false;
                }
            }
            if (!xmlHttp) {
                alert("返回创建的对象或显示错误信息!");
            } else {
                return xmlHttp;
            }
        }

        function reqHtml() {
            createXmlHttpRequestObject();
            xmlHttp.onreadystatechange = statHandler; // 判断URL调用的状态值并处理
            xmlHttp.open("GET", "text.html", true);  // 调用text.html
            xmlHttp.send(null);
        }

        function statHandler() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById("webpage").innerHTML = xmlHttp.responseText;
            }
        }
    </script>

    <!-- 创建超链接 -->
    <a href="#" onclick="reqHtml()">通过XMLHttpRequest对象请求HTML文件</a>
    <!-- 通过div标签输出请求内容 -->
    <div id="webpage"></div>

</div>

</body>
</html>

<?php
//<!--    // 常用方法介绍-->
//<!--    // TODO: open()方法 ---> 设置进行异步请求目标的URL、请求方法以及其他参数信息-->
//<!--    // TODO: send()方法 ---> 向服务器发送请求。如果是同步, 该方法立即返回; 否则将等到接收到响应为止-->
//<!--    // TODO: setRequestHeader() ---> 请求的 HTTP 头设置值 (必须在调用open()方法之后才能调用)-->
//<!--    // TODO: abort() ---> 用于停止当前异步请求-->
//<!--    // TODO: getAllResponseHeader() ---> 用于以字符串形式返回完整的 HTTP 头信息,当参数存在时,表示以字符串形式返回由该参数指定的 HTTP 头信息-->
//<!---->
//<!--    // 常用属性名-->
//<!--    // TODO: onreadystatechange ---> 每次状态改变都会触发这个事件处理器，通常会调用一个JavaScript函数-->
//<!--    // TODO: readyState ---> 请求的状态。-->
//<!--    // TODO: responseText ---> 服务器的响应，表示为字符串-->
//<!--    // TODO: responseXML ---> 服务器的响应，表示为XML。这个对象可以解析为一个DOM对象-->
//<!--    // TODO: status ---> 返回服务器的HTTP状态码-->
//<!--    // TODO: statusText ---> 返回HTTP状态码对应的文本-->
?>


