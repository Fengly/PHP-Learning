<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>系統登陆 - EasyWork项目管理系统</title><link type="text/css" rel="stylesheet" href="__ITEM__/__ADMIN.CSS__/login.css"><script type="text/javascript" src="__ITEM__/__UI__/jquery.js"></script><script> function newCode(obj,url){
    obj.src=url+'&time='+new Date().getTime();
 }
 </script></head><body><div class="headbg"></div><div class="login"><div class="logo"></div><div class="line"></div><div class="input"><div class="logo2"><img src="__ITEM__/__ADMIN.IMG__/l_titleemp.png" width="245" height="44" /></div><form action="" name="login" method="post"><div class="inpt"><div class="text"><span>帐 号：</span><input name="username" type="text" class="user" /></div><div class="text" style="margin-top:14px; margin-top:12px;\9; *margin-top:9px;;"><span>密 码：</span><input name="password" type="password"  class="pwd" /></div><?php
 if(C('CODE_ON')){ ?><div class="text" style="margin-top:14px; margin-top:12px;\9;"><span>验证码：</span><input name="code" type="text" class="code" maxlength="<?php echo (C("code_len")); ?>" AUTOCOMPLETE="off" /><img style="cursor:pointer" src='__APP__?g=<?php echo GROUP_NAME; ?>&m=<?php echo MODULE_NAME; ?>&a=verify' height="23" onclick="newCode(this,this.src)" title="点击刷新" /></div><?php
 } ?></div><div class="submit"><input name="login" type="submit" class="but" value=" " /></div></form></div></div><div class="footbg"><div class="copy">Powered by <a href="http://www.95era.com" target="_blank">九五时代</a></div></div></body></html>