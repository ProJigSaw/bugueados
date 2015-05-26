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
<link href="Antimonopolio.css" rel="stylesheet">
<link href="Mis_Bugs.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
<script src="./searchindex.js"></script>
<script>
var features = 'toolbar=no,menubar=no,location=no,scrollbars=yes,resizable=yes,status=no,left=,top=,width=,height=';
var searchDatabase = new SearchDatabase();
var searchResults_length = 0;
var searchResults = new Object();
function searchPage(features)
{
   var element = document.getElementById('SiteSearch1');
   if (element.value.length != 0 || element.value != " ")
   {
      var value = unescape(element.value);
      var keywords = value.split(" ");
      searchResults_length = 0;
      for (var i=0; i<database_length; i++)
      {
         var matches = 0;
         var words = searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords;
         for (var j = 0; j < keywords.length; j++)
         {
            var pattern = new RegExp(keywords[j], "i");
            var result = words.search(pattern);
            if (result >= 0)
            {
               matches++;
            }
            else
            {
               matches = 0;
            }
         }
         if (matches == keywords.length)
         {
            searchResults[searchResults_length++] = searchDatabase[i];
         }
      }
      var wndResults = window.open('about:blank', '', features);
      setTimeout(function()
      {
         var results = '';
         var html = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>Search results<\/title><\/head>';
         html = html + '<body style="background-color:#FFFFFF;margin:0;padding:2px 2px 2px 2px;">';
         html = html + '<span style="font-family:Arial;font-size:13px;color:#000000">';
         for (var n=0; n<searchResults_length; n++)
         {
            var page_keywords = searchResults[n].keywords;
            results = results + '<strong><a style="color:#0000FF" target="_parent" href="'+searchResults[n].url+'">'+searchResults[n].title +'<\/a><\/strong><br>Keywords: ' + page_keywords +'<br><br>\n';
         }
         if (searchResults_length == 0)
         {
            results = 'No results';
         }
         else
         {
            html = html + searchResults_length;
            html = html + ' result(s) found for search term: ';
            html = html + value;
            html = html + '<br><br>';
         }
         html = html + results;
         html = html + '<\/span>';
         html = html + '<\/body><\/html>';
         wndResults.document.write(html);
     },100);
   }
   return false;
}
function searchParseURL()
{
   var url = decodeURIComponent(window.location.href);
   if (url.indexOf('?') > 0)
   {
      var terms = '';
      var params = url.split('?');
      var values = params[1].split('&');
      for (var i=0;i<values.length;i++)
      {
         var param = values[i].split('=');
         if (param[0] == 'q')
         {
            terms = unescape(param[1]);
            break;
         }
      }
      if (terms != '')
      {
         var element = document.getElementById('SiteSearch1');
         element.value = terms;
         searchPage('');
      }
   }
}
</script>
<script>
$(document).ready(function()
{
   searchParseURL();
});
</script>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="Layer2" style="position:absolute;text-align:center;left:10px;top:160px;width:210px;height:190px;z-index:118;">
<div id="Layer2_Container" style="width:210px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text1" style="position:absolute;left:31px;top:129px;width:141px;height:16px;text-align:center;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:13px;">LOGOTIPO</span></div>
<div id="wb_Text14" style="position:absolute;left:19px;top:9px;width:184px;height:16px;text-align:right;z-index:1;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Agregar</span></div>
<div id="wb_Text15" style="position:absolute;left:19px;top:169px;width:180px;height:16px;text-align:right;z-index:2;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
<div id="wb_Image2" style="position:absolute;left:79px;top:69px;width:50px;height:50px;z-index:3;">
<img src="images/Bugueadospeq.png" id="Image2" alt=""></div>
</div>
</div>
<div id="Layer4" style="position:absolute;text-align:left;left:230px;top:160px;width:1018px;height:618px;z-index:119;">
<div id="wb_Text2" style="position:absolute;left:829px;top:9px;width:184px;height:16px;text-align:right;z-index:37;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
<div id="wb_Text6" style="position:absolute;left:19px;top:19px;width:250px;height:18px;z-index:38;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Mi Cuenta - Mi Puntuación</span></div>
<div id="wb_Text7" style="position:absolute;left:409px;top:19px;width:210px;height:18px;z-index:39;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Usuario - LopezMendez23</span></div>
<div id="Layer16" style="position:absolute;text-align:left;left:269px;top:49px;width:480px;height:70px;z-index:40;">
<div id="wb_Text40" style="position:absolute;left:19px;top:7px;width:450px;height:32px;text-align:center;z-index:4;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Aquí podras ver todas los cupones activos, asi como los pendientes de autorización, realizar la compra de cupones extra.</span></div>
</div>
<div id="Layer14" style="position:absolute;text-align:left;left:19px;top:89px;width:978px;height:508px;z-index:41;">
<div id="Layer17" style="position:absolute;text-align:left;left:29px;top:149px;width:285px;height:28px;z-index:24;">
<div id="wb_Text8" style="position:absolute;left:9px;top:9px;width:96px;height:16px;z-index:5;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Eliminar</span></div>
<div id="wb_Text11" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:6;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Eliminar</span></div>
</div>
<div id="wb_Text43" style="position:absolute;left:169px;top:249px;width:50px;height:18px;text-align:right;z-index:25;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Editar</span></div>
<div id="Layer9" style="position:absolute;text-align:left;left:29px;top:29px;width:285px;height:120px;z-index:26;">
<div id="wb_Image4" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:7;">
<img src="images/qrplanet%20%281%29.png" id="Image4" alt=""></div>
<div id="wb_Text10" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:8;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text16" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:9;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text3" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:10;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer8" style="position:absolute;text-align:left;left:349px;top:29px;width:285px;height:120px;z-index:27;">
<div id="wb_Text12" style="position:absolute;left:99px;top:19px;width:96px;height:18px;text-align:center;z-index:11;">
<span style="color:#006980;font-family:Arial;font-size:16px;">$100.00</span></div>
<div id="wb_Text13" style="position:absolute;left:59px;top:49px;width:170px;height:32px;text-align:center;z-index:12;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Se requiere 1 año de antiguedad</span></div>
<div id="wb_Text25" style="position:absolute;left:59px;top:89px;width:170px;height:16px;text-align:center;z-index:13;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">20 Calificaciones positivas</span></div>
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:669px;top:29px;width:285px;height:120px;z-index:28;">
<div id="wb_Text26" style="position:absolute;left:99px;top:19px;width:96px;height:18px;text-align:center;z-index:14;">
<span style="color:#006980;font-family:Arial;font-size:16px;">$200.00</span></div>
<div id="wb_Text42" style="position:absolute;left:59px;top:49px;width:170px;height:32px;text-align:center;z-index:15;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Se requiere 1 año de antiguedad</span></div>
</div>
<div id="Layer12" style="position:absolute;text-align:left;left:29px;top:189px;width:285px;height:120px;z-index:29;">
<div id="wb_Text29" style="position:absolute;left:99px;top:19px;width:96px;height:18px;text-align:center;z-index:16;">
<span style="color:#006980;font-family:Arial;font-size:16px;">$400.00</span></div>
</div>
<div id="Layer13" style="position:absolute;text-align:left;left:29px;top:309px;width:285px;height:28px;z-index:30;">
<div id="wb_Text30" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:17;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
<div id="Layer15" style="position:absolute;text-align:left;left:349px;top:189px;width:285px;height:120px;z-index:31;">
<div id="wb_Text31" style="position:absolute;left:99px;top:19px;width:96px;height:18px;text-align:center;z-index:18;">
<span style="color:#006980;font-family:Arial;font-size:16px;">$800.00</span></div>
</div>
<div id="Layer18" style="position:absolute;text-align:left;left:349px;top:309px;width:285px;height:28px;z-index:32;">
<div id="wb_Text32" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:19;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
<div id="Layer19" style="position:absolute;text-align:left;left:669px;top:189px;width:285px;height:120px;z-index:33;">
<div id="wb_Text33" style="position:absolute;left:99px;top:19px;width:96px;height:18px;text-align:center;z-index:20;">
<span style="color:#006980;font-family:Arial;font-size:16px;">$1,600.00</span></div>
</div>
<div id="Layer20" style="position:absolute;text-align:left;left:669px;top:309px;width:285px;height:28px;z-index:34;">
<div id="wb_Text34" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:21;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
<div id="Layer21" style="position:absolute;text-align:left;left:29px;top:349px;width:285px;height:120px;z-index:35;">
<div id="wb_Text35" style="position:absolute;left:99px;top:19px;width:96px;height:18px;text-align:center;z-index:22;">
<span style="color:#006980;font-family:Arial;font-size:16px;">$3,200.00</span></div>
</div>
<div id="Layer22" style="position:absolute;text-align:left;left:29px;top:469px;width:285px;height:28px;z-index:36;">
<div id="wb_Text36" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:23;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
</div>
</div>
<div id="wb_Text5" style="position:absolute;left:10px;top:128px;width:212px;height:16px;text-align:center;z-index:120;">
<span style="color:#000000;font-family:Arial;font-size:13px;">EMPRESA S.A. de C.V.</span></div>
<div id="wb_Text9" style="position:absolute;left:260px;top:240px;width:250px;height:18px;z-index:121;text-align:left;">
&nbsp;</div>
<div id="Layer6" style="position:absolute;text-align:center;left:10px;top:370px;width:210px;height:410px;z-index:122;">
<div id="Layer6_Container" style="width:210px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text4" style="position:absolute;left:9px;top:9px;width:190px;height:16px;text-align:center;z-index:42;">
<span style="color:#000000;font-family:Arial;font-size:13px;">ULTIMAS PUNTUACIONES</span></div>
<div id="wb_Text17" style="position:absolute;left:9px;top:39px;width:190px;height:60px;z-index:43;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text18" style="position:absolute;left:9px;top:119px;width:190px;height:60px;z-index:44;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<hr id="Line1" style="position:absolute;left:9px;top:109px;width:189px;height:2px;z-index:45;">
<hr id="Line2" style="position:absolute;left:9px;top:189px;width:189px;height:2px;z-index:46;">
<hr id="Line3" style="position:absolute;left:9px;top:289px;width:189px;height:2px;z-index:47;">
<div id="wb_Text20" style="position:absolute;left:9px;top:309px;width:190px;height:60px;z-index:48;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text21" style="position:absolute;left:119px;top:89px;width:83px;height:16px;text-align:right;z-index:49;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<div id="wb_Text23" style="position:absolute;left:119px;top:269px;width:83px;height:16px;text-align:right;z-index:50;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<div id="wb_Text24" style="position:absolute;left:119px;top:359px;width:83px;height:16px;text-align:right;z-index:51;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<hr id="Line4" style="position:absolute;left:9px;top:379px;width:189px;height:2px;z-index:52;">
<div id="wb_Text28" style="position:absolute;left:9px;top:389px;width:190px;height:16px;text-align:center;z-index:53;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ver más.</span></div>
<div id="wb_Text19" style="position:absolute;left:9px;top:209px;width:190px;height:60px;z-index:54;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
</div>
</div>
<div id="wb_TabMenu1" style="position:absolute;left:230px;top:120px;width:1018px;height:36px;z-index:123;overflow:hidden;">
<ul id="TabMenu1">
<li><a href="./Mi_cuenta.php">Datos personales</a></li>
<li><a href="./Mi_puntuacion.php">Mi puntuación</a></li>
<li><a href="./Mis_Bugs.php" class="active">Mis Bugs</a></li>
<li><a href="./Mensajes.php">Mensajes</a></li>
</ul>
</div>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb10.png" alt="WYSIWYG Web Builder" style="position:absolute;left:581px;top:907px;border-width:0;z-index:250"></a>
<div id="Layer7" style="position:absolute;text-align:left;left:600px;top:400px;width:285px;height:28px;z-index:125;">
<div id="wb_Text22" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:99;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:920px;top:400px;width:285px;height:28px;z-index:126;">
<div id="wb_Text27" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:100;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
<div id="Layer23" style="position:absolute;text-align:left;left:600px;top:720px;width:285px;height:28px;z-index:127;">
<div id="wb_Text37" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:109;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
<div id="Layer24" style="position:absolute;text-align:left;left:600px;top:600px;width:285px;height:120px;z-index:128;">
<div id="wb_Text38" style="position:absolute;left:99px;top:19px;width:96px;height:18px;text-align:center;z-index:110;">
<span style="color:#006980;font-family:Arial;font-size:16px;">$6,400.00</span></div>
</div>
<div id="Layer25" style="position:absolute;text-align:left;left:920px;top:720px;width:285px;height:28px;z-index:129;">
<div id="wb_Text39" style="position:absolute;left:179px;top:9px;width:96px;height:16px;text-align:right;z-index:111;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Agregar</span></div>
</div>
<div id="Layer26" style="position:absolute;text-align:left;left:920px;top:600px;width:285px;height:120px;z-index:130;">
<div id="wb_Text41" style="position:absolute;left:99px;top:19px;width:96px;height:18px;text-align:center;z-index:112;">
<span style="color:#006980;font-family:Arial;font-size:16px;">$12,800.00</span></div>
</div>
<div id="wb_Text44" style="position:absolute;left:980px;top:370px;width:170px;height:16px;text-align:center;z-index:131;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">30 Calificaciones positivas</span></div>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:0%;top:800px;width:100%;height:140px;z-index:132;">
<div id="Layer5_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer1" style="position:fixed;text-align:center;left:0;top:0;right:0;height:50px;z-index:133;">
<div id="Layer1_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image12" style="position:absolute;left:10px;top:10px;width:50px;height:32px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:113;">
<img src="images/img0022.png" id="Image12" alt=""></div>
<div id="wb_Text94" style="position:absolute;left:70px;top:20px;width:130px;height:16px;z-index:114;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<form action="" name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:453px;top:4px;width:342px;height:37px;line-height:37px;z-index:115;" name="SiteSearch1" value="" placeholder="Ejemplo buscar: Zapatos en Jalisco - Abogado en Jalisco"></form>
<div id="wb_CssMenu1" style="position:absolute;left:1136px;top:0px;width:114px;height:50px;z-index:116;">
<ul>
<li class="firstmain"><a href="./CrearCuenta.php" target="_self">Registrarse</a>
</li>
</ul>
<br>
</div>
<div id="wb_LoginName1" style="position:absolute;left:820px;top:20px;width:190px;height:16px;z-index:117;">
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
<div id="Layer3" style="position:absolute;text-align:center;left:0px;top:50px;width:100%;height:5px;z-index:134;">
<div id="Layer3_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
</body>
</html>