<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>系統登陆 - EasyWork项目管理系统</title>
    <link type="text/css" rel="stylesheet" href="<?php echo STYLE_CSS_PATH;?>/login.css">
    <script type="text/javascript" src="<?php echo STYLE_JS_PATH;?>/jquery/1.8.0/jquery.min.js"></script>
    <script>
        function newCode(obj,url){
            obj.src=url+'&time='+new Date().getTime();
        }
    </script>
</head>

<body>
<div class="headbg"></div>
<div class="login">
    <div class="logo"></div>
    <div class="line"></div>
    <div class="input">
        <div class="logo2"><img src="<?php echo STYLE_IMG_PATH;?>/l_titleemp.png" width="245" height="44" /></div>
        <form action="<?php echo ADMIN_URL?>/login/doLogin" name="login" method="post">
            <div class="inpt">
                <div class="text"><span>帐 号：</span><input name="phone" type="text" class="user" /></div>
                <div class="text" style="margin-top:14px; margin-top:12px;\9; *margin-top:9px;;"><span>密 码：</span><input name="passwd" type="password"  class="pwd" /></div>
                <?php
  if(1){
 ?>
                <div class="text" style="margin-top:14px; margin-top:12px;\9;"><span>验证码：</span><input name="code" type="text" class="code" maxlength="4" AUTOCOMPLETE="off" /> <img style="cursor:pointer" src='<?php echo ADMIN_URL.'/Login/vcode?'?>' height="23" onclick="newCode(this,this.src)" title="点击刷新" /></div>
                <?php
  }
 ?>
            </div>
            <div class="submit"><input name="login" type="submit" class="but" value=" " /></div>
        </form>
    </div>
</div>
<div class="footbg">
    <div class="copy">Powered by <a href="" target="_blank">鸿众科技</a></div>
</div>
</body>
</html>
