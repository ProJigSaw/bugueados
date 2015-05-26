<?php
if (session_id() == "")
{
   session_start();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<meta name="generator" content="WYSIWYG Web Builder 10 - http://www.wysiwygwebbuilder.com">
<link href="Antimonopolio.css" rel="stylesheet">
<link href="CMS.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<iframe id="CmsAdmin1" name="cmsadmin" style="position:absolute;left:0px;top:100px;width:1250px;height:1458px;z-index:9;" src="./cmsadmin.php"></iframe>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:0px;top:1558px;width:100%;height:350px;z-index:10;">
<div id="Layer5_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image7" style="position:absolute;left:570px;top:250px;width:96px;height:96px;z-index:0;">
<img src="images/eddy.png" id="Image7" alt=""></div>
<div id="wb_Text126" style="position:absolute;left:140px;top:69px;width:163px;height:16px;text-align:center;z-index:1;">
<span style="color:#00C6F0;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Image2" style="position:absolute;left:508px;top:10px;width:235px;height:235px;z-index:2;">
<img src="images/chat2.png" id="Image2" alt=""></div>
<div id="wb_Text125" style="position:absolute;left:500px;top:90px;width:250px;height:27px;text-align:center;z-index:3;">
<span style="color:#FFFFFF;font-family:'Bookman Old Style';font-size:24px;">CONTACTANOS</span></div>
<div id="wb_Text127" style="position:absolute;left:520px;top:130px;width:194px;height:16px;text-align:center;z-index:4;">
<span style="color:#00C6F0;font-family:Arial;font-size:13px;">director@bugueados.com</span></div>
</div>
</div>
<div id="Layer2" style="position:absolute;text-align:center;left:0px;top:50px;width:100%;height:5px;z-index:11;">
<div id="Layer2_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer4" style="position:fixed;text-align:center;left:0;top:0;right:0;height:50px;z-index:12;">
<div id="Layer4_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_CssMenu2" style="position:absolute;left:483px;top:0px;width:285px;height:50px;z-index:5;">
<ul>
<li class="firstmain"><a href="./Mi_cuenta.php" target="_self">Mi&nbsp;cuenta</a>
</li>
</ul>
<br>
</div>
<div id="wb_Image12" style="position:absolute;left:10px;top:10px;width:50px;height:32px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:6;">
<img src="images/img0020.png" id="Image12" alt=""></div>
<div id="wb_Text94" style="position:absolute;left:70px;top:20px;width:130px;height:16px;z-index:7;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<div id="wb_LoginName1" style="position:absolute;left:1070px;top:20px;width:164px;height:16px;z-index:8;">
<span id="LoginName1">Bienvenido <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['username'];
}
else
{
   echo 'No has iniciado Sesión';
}
?>!</span></div>
</div>
</div>
</body>
</html>