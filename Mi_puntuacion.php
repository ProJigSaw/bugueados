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
<link href="Mi_puntuacion.css" rel="stylesheet">
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
<div id="Layer2" style="position:absolute;text-align:center;left:10px;top:160px;width:210px;height:190px;z-index:113;">
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
<div id="Layer4" style="position:absolute;text-align:left;left:230px;top:160px;width:1018px;height:618px;z-index:114;">
<div id="wb_Text2" style="position:absolute;left:829px;top:9px;width:184px;height:16px;text-align:right;z-index:43;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
<div id="wb_Text6" style="position:absolute;left:19px;top:19px;width:250px;height:18px;z-index:44;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Mi Cuenta - Mi Puntuación</span></div>
<div id="wb_Text7" style="position:absolute;left:409px;top:19px;width:210px;height:18px;z-index:45;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Usuario - LopezMendez23</span></div>
<div id="Layer16" style="position:absolute;text-align:left;left:269px;top:49px;width:480px;height:70px;z-index:46;">
<div id="wb_Text40" style="position:absolute;left:19px;top:7px;width:450px;height:32px;text-align:center;z-index:4;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Aquí podras ver todas tus estadisticas, desde quien te ha felicitado por tus excelentes servicios o tu nivel de impacto en contra de la competencia.</span></div>
</div>
<div id="Layer13" style="position:absolute;text-align:left;left:19px;top:89px;width:978px;height:158px;z-index:47;">
<div id="wb_Text34" style="position:absolute;left:39px;top:9px;width:242px;height:18px;text-align:center;z-index:11;">
<span style="color:#A9A9A9;font-family:Arial;font-size:16px;">Tu antiguedad comenzo</span></div>
<div id="Layer7" style="position:absolute;text-align:left;left:39px;top:29px;width:242px;height:36px;z-index:12;">
<div id="wb_Text11" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:5;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">El dia Jueves 23 del 2011</span></div>
</div>
<div id="Layer8" style="position:absolute;text-align:left;left:369px;top:29px;width:242px;height:36px;z-index:13;">
<div id="wb_Text10" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:6;">
<span style="color:#CD853F;font-family:Arial;font-size:16px;">Bronce</span></div>
</div>
<div id="wb_Text12" style="position:absolute;left:369px;top:9px;width:242px;height:18px;text-align:center;z-index:14;">
<span style="color:#A9A9A9;font-family:Arial;font-size:16px;">Tu nivel de impacto es de</span></div>
<div id="Layer9" style="position:absolute;text-align:left;left:699px;top:29px;width:242px;height:36px;z-index:15;">
<div id="wb_Text13" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:7;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">235 Personas</span></div>
</div>
<div id="wb_Text16" style="position:absolute;left:699px;top:9px;width:242px;height:18px;text-align:center;z-index:16;">
<span style="color:#A9A9A9;font-family:Arial;font-size:16px;">Te han calificado</span></div>
<div id="wb_Text26" style="position:absolute;left:39px;top:89px;width:242px;height:18px;text-align:center;z-index:17;">
<span style="color:#A9A9A9;font-family:Arial;font-size:16px;">Tienes un total de</span></div>
<div id="Layer10" style="position:absolute;text-align:left;left:39px;top:109px;width:242px;height:36px;z-index:18;">
<div id="wb_Text25" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:8;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">54 puntuaciones</span></div>
</div>
<div id="wb_Text29" style="position:absolute;left:369px;top:89px;width:242px;height:18px;text-align:center;z-index:19;">
<span style="color:#A9A9A9;font-family:Arial;font-size:16px;">Tu bandeja de entrada tiene</span></div>
<div id="Layer11" style="position:absolute;text-align:left;left:369px;top:109px;width:242px;height:36px;z-index:20;">
<div id="wb_Text27" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:9;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">40 preguntas</span></div>
</div>
<div id="wb_Text31" style="position:absolute;left:699px;top:89px;width:242px;height:18px;text-align:center;z-index:21;">
<span style="color:#A9A9A9;font-family:Arial;font-size:16px;">Tu calificación total es por</span></div>
<div id="Layer12" style="position:absolute;text-align:left;left:699px;top:109px;width:242px;height:36px;z-index:22;">
<div id="wb_Text30" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:10;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">24 Positivos - 10 Negativos</span></div>
</div>
</div>
<div id="Layer15" style="position:absolute;text-align:left;left:529px;top:289px;width:469px;height:314px;z-index:48;">
<div id="wb_Text35" style="position:absolute;left:19px;top:59px;width:430px;height:36px;z-index:23;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Tenis Express S.A. de C.V.: </span><span style="color:#808080;font-family:Arial;font-size:16px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<hr id="Line7" style="position:absolute;left:19px;top:109px;width:432px;height:2px;z-index:24;">
<div id="wb_Text37" style="position:absolute;left:19px;top:39px;width:422px;height:16px;z-index:25;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Escrito el dia Jueves 26 del 2014</em></span></div>
<hr id="Line6" style="position:absolute;left:19px;top:199px;width:432px;height:2px;z-index:26;">
<div id="wb_Text33" style="position:absolute;left:19px;top:149px;width:430px;height:36px;z-index:27;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Tenis Express S.A. de C.V.: </span><span style="color:#808080;font-family:Arial;font-size:16px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text38" style="position:absolute;left:19px;top:129px;width:422px;height:16px;z-index:28;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Escrito el dia Jueves 26 del 2014</em></span></div>
<hr id="Line8" style="position:absolute;left:19px;top:289px;width:432px;height:2px;z-index:29;">
<div id="wb_Text39" style="position:absolute;left:19px;top:239px;width:430px;height:36px;z-index:30;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Tenis Express S.A. de C.V.: </span><span style="color:#808080;font-family:Arial;font-size:16px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text41" style="position:absolute;left:19px;top:219px;width:422px;height:16px;z-index:31;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Escrito el dia Jueves 26 del 2014</em></span></div>
<div id="wb_Text36" style="position:absolute;left:79px;top:9px;width:310px;height:23px;text-align:center;z-index:32;">
<span style="color:#696969;font-family:Impact;font-size:19px;">ULTIMOS MENSAJES RECIBIDOS</span></div>
</div>
<div id="Layer14" style="position:absolute;text-align:left;left:19px;top:289px;width:469px;height:314px;z-index:49;">
<div id="wb_Text22" style="position:absolute;left:19px;top:59px;width:430px;height:36px;z-index:33;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Tenis Express S.A. de C.V.: </span><span style="color:#808080;font-family:Arial;font-size:16px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<hr id="Line5" style="position:absolute;left:19px;top:109px;width:432px;height:2px;z-index:34;">
<div id="wb_Text32" style="position:absolute;left:19px;top:39px;width:422px;height:16px;z-index:35;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Escrito el dia Jueves 26 del 2014</em></span></div>
<hr id="Line9" style="position:absolute;left:19px;top:199px;width:432px;height:2px;z-index:36;">
<div id="wb_Text42" style="position:absolute;left:19px;top:149px;width:430px;height:36px;z-index:37;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Tenis Express S.A. de C.V.: </span><span style="color:#808080;font-family:Arial;font-size:16px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text43" style="position:absolute;left:19px;top:129px;width:422px;height:16px;z-index:38;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Escrito el dia Jueves 26 del 2014</em></span></div>
<hr id="Line10" style="position:absolute;left:19px;top:289px;width:432px;height:2px;z-index:39;">
<div id="wb_Text44" style="position:absolute;left:19px;top:239px;width:430px;height:36px;z-index:40;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Tenis Express S.A. de C.V.: </span><span style="color:#808080;font-family:Arial;font-size:16px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text45" style="position:absolute;left:19px;top:219px;width:422px;height:16px;z-index:41;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Escrito el dia Jueves 26 del 2014</em></span></div>
<div id="wb_Text8" style="position:absolute;left:79px;top:9px;width:310px;height:23px;text-align:center;z-index:42;">
<span style="color:#696969;font-family:Impact;font-size:19px;">ULTIMOS COMENTARIOS PYMES</span></div>
</div>
</div>
<div id="wb_Text5" style="position:absolute;left:10px;top:128px;width:212px;height:16px;text-align:center;z-index:115;">
<span style="color:#000000;font-family:Arial;font-size:13px;">EMPRESA S.A. de C.V.</span></div>
<div id="wb_Text9" style="position:absolute;left:260px;top:240px;width:250px;height:18px;z-index:116;text-align:left;">
&nbsp;</div>
<div id="Layer6" style="position:absolute;text-align:center;left:10px;top:370px;width:210px;height:410px;z-index:117;">
<div id="Layer6_Container" style="width:210px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text4" style="position:absolute;left:9px;top:9px;width:190px;height:16px;text-align:center;z-index:56;">
<span style="color:#000000;font-family:Arial;font-size:13px;">ULTIMAS PUNTUACIONES</span></div>
<div id="wb_Text17" style="position:absolute;left:9px;top:39px;width:190px;height:60px;z-index:57;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text18" style="position:absolute;left:9px;top:119px;width:190px;height:60px;z-index:58;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<hr id="Line1" style="position:absolute;left:9px;top:109px;width:189px;height:2px;z-index:59;">
<hr id="Line2" style="position:absolute;left:9px;top:189px;width:189px;height:2px;z-index:60;">
<hr id="Line3" style="position:absolute;left:9px;top:289px;width:189px;height:2px;z-index:61;">
<div id="wb_Text20" style="position:absolute;left:9px;top:309px;width:190px;height:60px;z-index:62;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text21" style="position:absolute;left:119px;top:89px;width:83px;height:16px;text-align:right;z-index:63;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<div id="wb_Text23" style="position:absolute;left:119px;top:269px;width:83px;height:16px;text-align:right;z-index:64;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<div id="wb_Text24" style="position:absolute;left:119px;top:359px;width:83px;height:16px;text-align:right;z-index:65;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<hr id="Line4" style="position:absolute;left:9px;top:379px;width:189px;height:2px;z-index:66;">
<div id="wb_Text28" style="position:absolute;left:9px;top:389px;width:190px;height:16px;text-align:center;z-index:67;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ver más.</span></div>
<div id="wb_Text19" style="position:absolute;left:9px;top:209px;width:190px;height:60px;z-index:68;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
</div>
</div>
<div id="wb_TabMenu1" style="position:absolute;left:230px;top:120px;width:1018px;height:36px;z-index:118;overflow:hidden;">
<ul id="TabMenu1">
<li><a href="./Mi_cuenta.php">Datos personales</a></li>
<li><a href="./Mi_puntuacion.php" class="active">Mi puntuación</a></li>
<li><a href="./Mis_Bugs.php">Mis Bugs</a></li>
<li><a href="./Mensajes.php">Mensajes</a></li>
</ul>
</div>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb10.png" alt="WYSIWYG Web Builder" style="position:absolute;left:581px;top:907px;border-width:0;z-index:250"></a>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:0%;top:800px;width:100%;height:140px;z-index:120;">
<div id="Layer5_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer1" style="position:fixed;text-align:center;left:0;top:0;right:0;height:50px;z-index:121;">
<div id="Layer1_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image12" style="position:absolute;left:10px;top:10px;width:50px;height:32px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:108;">
<img src="images/img0021.png" id="Image12" alt=""></div>
<div id="wb_Text94" style="position:absolute;left:70px;top:20px;width:130px;height:16px;z-index:109;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<form action="" name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:453px;top:4px;width:342px;height:37px;line-height:37px;z-index:110;" name="SiteSearch1" value="" placeholder="Ejemplo buscar: Zapatos en Jalisco - Abogado en Jalisco"></form>
<div id="wb_CssMenu1" style="position:absolute;left:1136px;top:0px;width:114px;height:50px;z-index:111;">
<ul>
<li class="firstmain"><a href="./CrearCuenta.php" target="_self">Registrarse</a>
</li>
</ul>
<br>
</div>
<div id="wb_LoginName1" style="position:absolute;left:820px;top:20px;width:190px;height:16px;z-index:112;">
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
<div id="Layer3" style="position:absolute;text-align:center;left:0px;top:50px;width:100%;height:5px;z-index:122;">
<div id="Layer3_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
</body>
</html>