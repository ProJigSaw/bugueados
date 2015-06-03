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
<title>Página sin título</title>
<meta name="generator" content="WYSIWYG Web Builder 10 - http://www.wysiwygwebbuilder.com">
<link href="cupertino/jquery.ui.all.css" rel="stylesheet">
<link href="Antimonopolio.css" rel="stylesheet">
<link href="Mi_cuenta.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
<script src="jquery.ui.core.min.js"></script>
<script src="jquery.ui.widget.min.js"></script>
<script src="jquery.ui.progressbar.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryProgressbar1Opts =
   {
      value: 25
   };
   $("#jQueryProgressbar1").progressbar(jQueryProgressbar1Opts);
   $("#RollOver1 a").hover(function(e)
   {
      $(this).children("span").stop().fadeTo(500, 0);
   }, function()
   {
      $(this).children("span").stop().fadeTo(500, 1);
   });
   $("#RollOver2 a").hover(function(e)
   {
      $(this).children("span").stop().fadeTo(500, 0);
   }, function()
   {
      $(this).children("span").stop().fadeTo(500, 1);
   });
   $("#RollOver3 a").hover(function(e)
   {
      $(this).children("span").stop().fadeTo(500, 0);
   }, function()
   {
      $(this).children("span").stop().fadeTo(500, 1);
   });
});
</script>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="jQueryProgressbar1" style="position:absolute;left:960px;top:80px;width:290px;height:36px;z-index:101;">
</div>
<div id="Layer2" style="position:absolute;text-align:center;left:10px;top:130px;width:210px;height:190px;z-index:102;">
<div id="Layer2_Container" style="width:210px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text1" style="position:absolute;left:31px;top:129px;width:141px;height:16px;text-align:center;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:13px;">LOGOTIPO</span></div>
<div id="wb_Text15" style="position:absolute;left:19px;top:169px;width:180px;height:16px;text-align:right;z-index:1;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
<div id="wb_Image2" style="position:absolute;left:79px;top:69px;width:50px;height:50px;z-index:2;">
<img src="images/Bugueadospeq.png" id="Image2" alt=""></div>
<div id="wb_Text14" style="position:absolute;left:19px;top:9px;width:184px;height:16px;text-align:right;z-index:3;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
</div>
<div id="Layer4" style="position:absolute;text-align:left;left:230px;top:130px;width:1018px;height:618px;z-index:103;">
<div id="wb_Text6" style="position:absolute;left:19px;top:19px;width:250px;height:18px;z-index:22;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Mi Cuenta - Datos Personales</span></div>
<div id="Layer8" style="position:absolute;text-align:left;left:9px;top:69px;width:242px;height:36px;z-index:23;">
<div id="wb_Text7" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:4;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">Bugueados S.A. de C.V.</span></div>
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:269px;top:69px;width:242px;height:36px;z-index:24;">
<div id="wb_Text9" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:5;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">GDL 19 55 35 11</span></div>
</div>
<div id="Layer12" style="position:absolute;text-align:left;left:519px;top:69px;width:242px;height:36px;z-index:25;">
<div id="wb_Text12" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:6;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">33 12 20 67 18</span></div>
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:269px;top:139px;width:242px;height:36px;z-index:26;">
<div id="wb_Text8" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:7;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">El zapote - 45050</span></div>
</div>
<div id="Layer9" style="position:absolute;text-align:left;left:9px;top:139px;width:242px;height:36px;z-index:27;">
<div id="wb_Text25" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:8;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">El tajín #1658</span></div>
</div>
<div id="Layer13" style="position:absolute;text-align:left;left:519px;top:139px;width:242px;height:36px;z-index:28;">
<div id="wb_Text11" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:9;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">Zapopan, Jalisco.</span></div>
</div>
<div id="Layer14" style="position:absolute;text-align:left;left:769px;top:139px;width:242px;height:36px;z-index:29;">
<div id="wb_Text10" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:10;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">Facebook - Twitter - Web</span></div>
</div>
<div id="wb_Text27" style="position:absolute;left:9px;top:49px;width:242px;height:16px;text-align:center;z-index:30;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Nombre o razón social</span></div>
<div id="wb_Text29" style="position:absolute;left:269px;top:49px;width:242px;height:16px;text-align:center;z-index:31;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Télefono</span></div>
<div id="wb_Text31" style="position:absolute;left:769px;top:49px;width:242px;height:16px;text-align:center;z-index:32;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">WhatsApp</span></div>
<div id="wb_Text32" style="position:absolute;left:9px;top:119px;width:242px;height:16px;text-align:center;z-index:33;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Dirección (Calle)</span></div>
<div id="wb_Text33" style="position:absolute;left:269px;top:119px;width:242px;height:16px;text-align:center;z-index:34;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Dirección (Colonia - C.P.)</span></div>
<div id="wb_Text34" style="position:absolute;left:519px;top:119px;width:242px;height:16px;text-align:center;z-index:35;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Colonia</span></div>
<div id="wb_Text35" style="position:absolute;left:769px;top:119px;width:242px;height:16px;text-align:center;z-index:36;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Redes Sociales</span></div>
<div id="Layer7" style="position:absolute;text-align:left;left:9px;top:189px;width:684px;height:405px;z-index:37;">
<div id="wb_Text16" style="position:absolute;left:229px;top:166px;width:240px;height:93px;text-align:center;z-index:11;">
<span style="color:#808080;font-family:Impact;font-size:75px;">M A P A</span></div>
<div id="wb_Text26" style="position:absolute;left:499px;top:9px;width:184px;height:16px;text-align:right;z-index:12;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
</div>
<div id="Layer16" style="position:absolute;text-align:left;left:709px;top:189px;width:300px;height:405px;z-index:38;">
<div id="wb_Text36" style="position:absolute;left:9px;top:27px;width:280px;height:16px;text-align:center;z-index:13;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;"> - Descripción de la empresa - </span></div>
<div id="wb_Text37" style="position:absolute;left:9px;top:47px;width:280px;height:64px;text-align:justify;z-index:14;">
<span style="color:#808080;font-family:Arial;font-size:13px;">Con más de 4 años comprobables en el mercado, nuestro calzado deportivo ha demostrado ser lider en calidad, rendimiento y diseño juvenil. </span></div>
<div id="wb_Text38" style="position:absolute;left:9px;top:147px;width:280px;height:16px;text-align:center;z-index:15;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;"> - Misión - </span></div>
<div id="wb_Text39" style="position:absolute;left:9px;top:167px;width:280px;height:80px;text-align:justify;z-index:16;">
<span style="color:#808080;font-family:Arial;font-size:13px;">Dar la mejor atención al cliente usando tecnicas directas de venta, mediante el uso de redes sociales, telefono y atención directa. Para atender hasta la ultima solicitud de cada cliente.</span></div>
<div id="wb_Text41" style="position:absolute;left:9px;top:317px;width:280px;height:48px;text-align:justify;z-index:17;">
<span style="color:#808080;font-family:Arial;font-size:13px;">Lograr ser el lider nacional en la venta de calzado deportivo, creando una red de mercadeo para mayoristas y minoristas.</span></div>
<div id="wb_Text40" style="position:absolute;left:9px;top:297px;width:280px;height:16px;text-align:center;z-index:18;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;"> - Visión - </span></div>
<div id="wb_Text42" style="position:absolute;left:109px;top:99px;width:184px;height:16px;text-align:right;z-index:19;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
<div id="wb_Text43" style="position:absolute;left:109px;top:239px;width:184px;height:16px;text-align:right;z-index:20;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
<div id="wb_Text44" style="position:absolute;left:109px;top:369px;width:184px;height:16px;text-align:right;z-index:21;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
</div>
<div id="wb_Text47" style="position:absolute;left:409px;top:19px;width:210px;height:18px;z-index:39;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Usuario - LopezMendez23</span></div>
<div id="wb_Text2" style="position:absolute;left:829px;top:9px;width:184px;height:16px;text-align:right;z-index:40;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
</div>
<div id="wb_TabMenu1" style="position:absolute;left:230px;top:90px;width:1018px;height:36px;z-index:104;overflow:hidden;">
<ul id="TabMenu1">
<li><a href="./Mi_cuenta.php" class="active">Datos personales</a></li>
<li><a href="./Mi_puntuacion.php">Mi puntuación</a></li>
<li><a href="./Mis_Bugs.php">Mis Bugs</a></li>
<li><a href="./Mensajes.php">Mensajes</a></li>
</ul>
</div>
<div id="Layer6" style="position:absolute;text-align:center;left:10px;top:330px;width:210px;height:410px;z-index:105;">
<div id="Layer6_Container" style="width:210px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text4" style="position:absolute;left:9px;top:19px;width:190px;height:38px;text-align:center;z-index:41;">
<span style="color:#000000;font-family:Impact;font-size:15px;">U L T I M A S&nbsp;&nbsp; P Y M E S<br>R E G I S T R A D A S</span></div>
<hr id="Line4" style="position:absolute;left:9px;top:109px;width:189px;height:2px;z-index:42;">
<div id="wb_Text3" style="position:absolute;left:59px;top:79px;width:150px;height:28px;z-index:43;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Text17" style="position:absolute;left:59px;top:59px;width:140px;height:15px;z-index:44;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Image3" style="position:absolute;left:9px;top:59px;width:40px;height:40px;z-index:45;">
<img src="images/Bugueadospeq.png" id="Image3" alt=""></div>
<hr id="Line1" style="position:absolute;left:9px;top:179px;width:189px;height:2px;z-index:46;">
<div id="wb_Text18" style="position:absolute;left:59px;top:139px;width:150px;height:28px;z-index:47;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Text19" style="position:absolute;left:59px;top:119px;width:140px;height:15px;z-index:48;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Image4" style="position:absolute;left:9px;top:119px;width:40px;height:40px;z-index:49;">
<img src="images/Bugueadospeq.png" id="Image4" alt=""></div>
<div id="wb_Text24" style="position:absolute;left:59px;top:349px;width:150px;height:28px;z-index:50;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Image7" style="position:absolute;left:9px;top:329px;width:40px;height:40px;z-index:51;">
<img src="images/Bugueadospeq.png" id="Image7" alt=""></div>
<div id="wb_Text48" style="position:absolute;left:59px;top:329px;width:140px;height:15px;z-index:52;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Text23" style="position:absolute;left:59px;top:259px;width:140px;height:15px;z-index:53;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Text22" style="position:absolute;left:59px;top:279px;width:150px;height:28px;z-index:54;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Image6" style="position:absolute;left:9px;top:259px;width:40px;height:40px;z-index:55;">
<img src="images/Bugueadospeq.png" id="Image6" alt=""></div>
<hr id="Line3" style="position:absolute;left:9px;top:319px;width:189px;height:2px;z-index:56;">
<div id="wb_Image5" style="position:absolute;left:9px;top:189px;width:40px;height:40px;z-index:57;">
<img src="images/Bugueadospeq.png" id="Image5" alt=""></div>
<div id="wb_Text21" style="position:absolute;left:59px;top:189px;width:140px;height:15px;z-index:58;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Text20" style="position:absolute;left:59px;top:209px;width:150px;height:28px;z-index:59;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<hr id="Line2" style="position:absolute;left:9px;top:249px;width:189px;height:2px;z-index:60;">
<div id="wb_Text28" style="position:absolute;left:9px;top:389px;width:190px;height:16px;text-align:center;z-index:61;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ver más.</span></div>
</div>
</div>
<div id="wb_Text5" style="position:absolute;left:10px;top:110px;width:212px;height:16px;text-align:center;z-index:106;">
<span style="color:#000000;font-family:Arial;font-size:13px;">EMPRESA S.A. de C.V.</span></div>
<div id="Layer15" style="position:absolute;text-align:left;left:1000px;top:230px;width:242px;height:36px;z-index:107;">
<div id="wb_Text13" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:71;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">33 12 20 67 18</span></div>
</div>
<div id="wb_Text30" style="position:absolute;left:750px;top:210px;width:242px;height:16px;text-align:center;z-index:108;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Célular</span></div>
<div id="wb_Text45" style="position:absolute;left:980px;top:90px;width:250px;height:18px;text-align:center;z-index:109;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Pérfil completado:</span></div>
<div id="wb_Text46" style="position:absolute;left:1140px;top:90px;width:100px;height:20px;text-align:right;z-index:110;">
<span style="color:#000000;font-family:Impact;font-size:16px;">2 5 %</span></div>
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:0px;top:770px;width:100%;height:90px;z-index:111;">
<div id="Layer1_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="Layer3" style="position:absolute;text-align:left;left:1050px;top:10px;width:188px;height:68px;z-index:81;">
</div>
<div id="Layer5" style="position:absolute;text-align:left;left:650px;top:10px;width:278px;height:68px;z-index:82;">
</div>
<div id="Layer17" style="position:absolute;text-align:left;left:330px;top:10px;width:278px;height:68px;z-index:83;">
</div>
<div id="wb_Text49" style="position:absolute;left:710px;top:35px;width:220px;height:22px;text-align:center;z-index:84;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">GDL: (33) 1955 3511</span></div>
<div id="Layer18" style="position:absolute;text-align:left;left:10px;top:10px;width:278px;height:68px;z-index:85;">
</div>
<div id="wb_Text50" style="position:absolute;left:390px;top:35px;width:220px;height:22px;text-align:center;z-index:86;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">facebook.com/bugueados</span></div>
<div id="wb_ClipArt1" style="position:absolute;left:340px;top:20px;width:50px;height:50px;z-index:87;">
<a href="https://www.facebook.com/Bugueados?ref=hl" target="_blank"><img class="hover" src="images/img0093_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0093.png" id="ClipArt1" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_ClipArt2" style="position:absolute;left:20px;top:20px;width:50px;height:50px;z-index:88;">
<a href="https://twitter.com/Bugueados" target="_blank"><img class="hover" src="images/img0094_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0094.png" id="ClipArt2" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_Text51" style="position:absolute;left:70px;top:35px;width:220px;height:22px;text-align:center;z-index:89;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">twitter.com/bugueados</span></div>
<div id="wb_ClipArt4" style="position:absolute;left:660px;top:20px;width:50px;height:50px;z-index:90;">
<a href=""><img class="hover" src="images/img0095_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0095.png" id="ClipArt4" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_Image1" style="position:absolute;left:950px;top:0px;width:90px;height:90px;z-index:91;">
<img src="images/z0codJk2.png" id="Image1" alt=""></div>
<div id="wb_Text52" style="position:absolute;left:1050px;top:20px;width:190px;height:48px;text-align:center;z-index:92;">
<span style="color:#5A5A5A;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.<br>registros@buguedos.com<br>El tajín #1658 - Zapopan</span></div>
</div>
</div>
<div id="Layer19" style="position:fixed;text-align:center;left:0;top:0;right:0;height:70px;z-index:112;">
<div id="Layer19_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image12" style="position:absolute;left:30px;top:20px;width:70px;height:44px;z-index:93;">
<a href="./index.php"><img src="images/bugspeq.png" id="Image12" alt=""></a></div>
<div id="RollOver1" style="position:absolute;left:1110px;top:30px;overflow:hidden;width:30px;height:30px;z-index:94">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/favoritos2.png">
<span><img alt="" src="images/favoritos.png"></span>
</a>
</div>
<div id="RollOver2" style="position:absolute;left:1160px;top:30px;overflow:hidden;width:30px;height:30px;z-index:95">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/mensajes.png">
<span><img alt="" src="images/mensajes2.png"></span>
</a>
</div>
<div id="RollOver3" style="position:absolute;left:1210px;top:30px;overflow:hidden;width:30px;height:30px;z-index:96">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/micuenta2.png">
<span><img alt="" src="images/micuenta.png"></span>
</a>
</div>
<div id="wb_Text53" style="position:absolute;left:0px;top:0px;width:130px;height:16px;text-align:center;z-index:97;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<div id="wb_CssMenu2" style="position:absolute;left:990px;top:30px;width:100px;height:30px;z-index:98;">
<ul>
<li class="firstmain"><a href="./IniciarSesion.php" target="_self">Iniciar&nbsp;Sesi&#243;n</a>
</li>
</ul>
<br>
</div>
<div id="wb_LoginName1" style="position:absolute;left:990px;top:10px;width:250px;height:18px;text-align:center;z-index:99;">
<span id="LoginName1">Bienvenido <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['username'];
}
else
{
   echo 'no has iniciado sesion';
}
?>!</span></div>
<div id="wb_CssMenu1" style="position:absolute;left:355px;top:10px;width:540px;height:50px;z-index:100;">
<ul>
<li class="firstmain"><a href="./Buscar.php" target="_self">Buscar</a>
</li>
<li><a href="./CrearCuenta.php" target="_self">Registrarse</a>
</li>
<li><a href="./Contactar.php" target="_self">Contactar</a>
</li>
</ul>
<br>
</div>
</div>
</div>
</body>
</html>