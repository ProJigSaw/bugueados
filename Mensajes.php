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
<link href="black-tie/jquery.ui.all.css" rel="stylesheet">
<link href="Antimonopolio.css" rel="stylesheet">
<link href="Mensajes.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
<script src="jquery.ui.core.min.js"></script>
<script src="jquery.ui.widget.min.js"></script>
<script src="jquery.ui.mouse.min.js"></script>
<script src="jquery.ui.sortable.min.js"></script>
<script src="jquery.ui.tabs.min.js"></script>
<script src="jquery.ui.button.min.js"></script>
<script src="jquery.ui.effect.min.js"></script>
<script src="jquery.ui.effect-blind.min.js"></script>
<script src="jquery.ui.effect-bounce.min.js"></script>
<script src="jquery.ui.effect-clip.min.js"></script>
<script src="jquery.ui.effect-drop.min.js"></script>
<script src="jquery.ui.effect-explode.min.js"></script>
<script src="jquery.ui.effect-fade.min.js"></script>
<script src="jquery.ui.effect-fold.min.js"></script>
<script src="jquery.ui.effect-highlight.min.js"></script>
<script src="jquery.ui.effect-pulsate.min.js"></script>
<script src="jquery.ui.effect-scale.min.js"></script>
<script src="jquery.ui.effect-shake.min.js"></script>
<script src="jquery.ui.effect-slide.min.js"></script>
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
<script src="wwb10.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryTabs1Opts =
   {
      show: false,
      event: 'click',
      collapsible: true
   };
   $("#jQueryTabs1").tabs(jQueryTabs1Opts).find(".ui-tabs-nav").sortable();
   $("#jQueryButton1").button();
   $("#jQueryButton2").button();
   $("#jQueryButton3").button();
   $("#jQueryButton4").button();
   $("#jQueryButton5").button();
   $("#jQueryButton6").button();
   $("#jQueryButton7").button();
   searchParseURL();
});
</script>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="Layer2" style="position:absolute;text-align:center;left:10px;top:160px;width:210px;height:190px;z-index:136;">
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
<div id="Layer4" style="position:absolute;text-align:left;left:230px;top:160px;width:1018px;height:618px;z-index:137;">
<div id="wb_Text2" style="position:absolute;left:829px;top:9px;width:184px;height:16px;text-align:right;z-index:48;">
<span style="color:#00A0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
<div id="wb_Text6" style="position:absolute;left:19px;top:19px;width:250px;height:18px;z-index:49;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Mi Cuenta - Mensajes</span></div>
<div id="wb_Text7" style="position:absolute;left:409px;top:19px;width:210px;height:18px;z-index:50;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Usuario - LopezMendez23</span></div>
<div id="jQueryTabs1" style="position:absolute;left:49px;top:89px;width:910px;z-index:51;">
<ul>
<li><a href="#jquerytabs1-page-0"><span>Prospectos</span></a></li>
<li><a href="#jquerytabs1-page-1"><span>Clientes</span></a></li>
<li><a href="#jquerytabs1-page-2"><span>Proveedores</span></a></li>
</ul>
<div style="height:420px;overflow:auto;padding:0;" id="jquerytabs1-page-0">
<div id="wb_jQueryButton1" style="position:absolute;left:10px;top:120px;width:18px;height:18px;z-index:19;">
<input type="checkbox" id="jQueryButton1" name="" value="" checked="checked"><label style="width:100%;height:100%;" for="jQueryButton1"></label></div>
<div id="wb_jQueryButton5" style="position:absolute;left:10px;top:320px;width:18px;height:18px;z-index:20;">
<input type="checkbox" id="jQueryButton5" name="" value="" checked="checked"><label style="width:100%;height:100%;" for="jQueryButton5"></label></div>
<div id="wb_jQueryButton4" style="position:absolute;left:10px;top:270px;width:18px;height:18px;z-index:21;">
<input type="checkbox" id="jQueryButton4" name="" value="" checked="checked"><label style="width:100%;height:100%;" for="jQueryButton4"></label></div>
<div id="wb_jQueryButton3" style="position:absolute;left:10px;top:220px;width:18px;height:18px;z-index:22;">
<input type="checkbox" id="jQueryButton3" name="" value="" checked="checked"><label style="width:100%;height:100%;" for="jQueryButton3"></label></div>
<div id="Layer21" style="position:absolute;text-align:left;left:80px;top:410px;width:830px;height:40px;z-index:23;">
<div id="wb_Text32" style="position:absolute;left:10px;top:10px;width:740px;height:16px;z-index:4;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cotización urgente -</span><span style="color:#808080;font-family:Arial;font-size:13px;"> Hola vi sus productos y me gustaria adquirir un par de ellos, me gustaria saber cuando sale con envio a </span></div>
<div id="wb_Text33" style="position:absolute;left:750px;top:10px;width:70px;height:16px;text-align:right;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;">04 MAY</span></div>
</div>
<div id="Layer19" style="position:absolute;text-align:left;left:80px;top:360px;width:830px;height:40px;z-index:24;">
<div id="wb_Text30" style="position:absolute;left:10px;top:10px;width:740px;height:16px;z-index:6;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cotización urgente -</span><span style="color:#808080;font-family:Arial;font-size:13px;"> Hola vi sus productos y me gustaria adquirir un par de ellos, me gustaria saber cuando sale con envio a </span></div>
<div id="wb_Text31" style="position:absolute;left:750px;top:10px;width:70px;height:16px;text-align:right;z-index:7;">
<span style="color:#000000;font-family:Arial;font-size:13px;">04 MAY</span></div>
</div>
<div id="Layer17" style="position:absolute;text-align:left;left:80px;top:310px;width:830px;height:40px;z-index:25;">
<div id="wb_Text27" style="position:absolute;left:10px;top:10px;width:740px;height:16px;z-index:8;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cotización urgente -</span><span style="color:#808080;font-family:Arial;font-size:13px;"> Hola vi sus productos y me gustaria adquirir un par de ellos, me gustaria saber cuando sale con envio a </span></div>
<div id="wb_Text29" style="position:absolute;left:750px;top:10px;width:70px;height:16px;text-align:right;z-index:9;">
<span style="color:#000000;font-family:Arial;font-size:13px;">04 MAY</span></div>
</div>
<div id="Layer15" style="position:absolute;text-align:left;left:80px;top:260px;width:830px;height:40px;z-index:26;">
<div id="wb_Text25" style="position:absolute;left:10px;top:10px;width:740px;height:16px;z-index:10;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cotización urgente -</span><span style="color:#808080;font-family:Arial;font-size:13px;"> Hola vi sus productos y me gustaria adquirir un par de ellos, me gustaria saber cuando sale con envio a </span></div>
<div id="wb_Text26" style="position:absolute;left:750px;top:10px;width:70px;height:16px;text-align:right;z-index:11;">
<span style="color:#000000;font-family:Arial;font-size:13px;">04 MAY</span></div>
</div>
<div id="Layer13" style="position:absolute;text-align:left;left:80px;top:210px;width:830px;height:40px;z-index:27;">
<div id="wb_Text16" style="position:absolute;left:10px;top:10px;width:740px;height:16px;z-index:12;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cotización urgente -</span><span style="color:#808080;font-family:Arial;font-size:13px;"> Hola vi sus productos y me gustaria adquirir un par de ellos, me gustaria saber cuando sale con envio a </span></div>
<div id="wb_Text22" style="position:absolute;left:750px;top:10px;width:70px;height:16px;text-align:right;z-index:13;">
<span style="color:#000000;font-family:Arial;font-size:13px;">04 MAY</span></div>
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:80px;top:160px;width:830px;height:40px;z-index:28;">
<div id="wb_Text12" style="position:absolute;left:10px;top:10px;width:740px;height:16px;z-index:14;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cotización urgente -</span><span style="color:#808080;font-family:Arial;font-size:13px;"> Hola vi sus productos y me gustaria adquirir un par de ellos, me gustaria saber cuando sale con envio a </span></div>
<div id="wb_Text13" style="position:absolute;left:750px;top:10px;width:70px;height:16px;text-align:right;z-index:15;">
<span style="color:#000000;font-family:Arial;font-size:13px;">04 MAY</span></div>
</div>
<div id="Layer9" style="position:absolute;text-align:left;left:80px;top:110px;width:830px;height:40px;z-index:29;">
<div id="wb_Text10" style="position:absolute;left:10px;top:10px;width:740px;height:16px;z-index:16;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cotización urgente -</span><span style="color:#808080;font-family:Arial;font-size:13px;"> Hola vi sus productos y me gustaria adquirir un par de ellos, me gustaria saber cuando sale con envio a </span></div>
<div id="wb_Text11" style="position:absolute;left:750px;top:10px;width:70px;height:16px;text-align:right;z-index:17;">
<span style="color:#000000;font-family:Arial;font-size:13px;">04 MAY</span></div>
</div>
<div id="wb_ClipArt4" style="position:absolute;left:40px;top:170px;width:30px;height:20px;z-index:30;">
<img src="images/img0045.png" id="ClipArt4" alt="" style="width:30px;height:20px;"></div>
<div id="wb_jQueryButton2" style="position:absolute;left:10px;top:170px;width:18px;height:18px;z-index:31;">
<input type="checkbox" id="jQueryButton2" name="" value="" checked="checked"><label style="width:100%;height:100%;" for="jQueryButton2"></label></div>
<div id="wb_ClipArt3" style="position:absolute;left:40px;top:120px;width:30px;height:20px;z-index:32;">
<img src="images/img0044.png" id="ClipArt3" alt="" style="width:30px;height:20px;"></div>
<div id="wb_ClipArt5" style="position:absolute;left:40px;top:220px;width:30px;height:20px;z-index:33;">
<img src="images/img0046.png" id="ClipArt5" alt="" style="width:30px;height:20px;"></div>
<div id="wb_ClipArt6" style="position:absolute;left:40px;top:270px;width:30px;height:20px;z-index:34;">
<img src="images/img0047.png" id="ClipArt6" alt="" style="width:30px;height:20px;"></div>
<div id="wb_ClipArt7" style="position:absolute;left:40px;top:320px;width:30px;height:20px;z-index:35;">
<img src="images/img0048.png" id="ClipArt7" alt="" style="width:30px;height:20px;"></div>
<div id="wb_ClipArt8" style="position:absolute;left:40px;top:370px;width:30px;height:20px;z-index:36;">
<img src="images/img0049.png" id="ClipArt8" alt="" style="width:30px;height:20px;"></div>
<div id="wb_ClipArt9" style="position:absolute;left:40px;top:420px;width:30px;height:20px;z-index:37;">
<img src="images/img0050.png" id="ClipArt9" alt="" style="width:30px;height:20px;"></div>
<div id="wb_jQueryButton6" style="position:absolute;left:10px;top:370px;width:18px;height:18px;z-index:38;">
<input type="checkbox" id="jQueryButton6" name="" value="" checked="checked"><label style="width:100%;height:100%;" for="jQueryButton6"></label></div>
<div id="wb_jQueryButton7" style="position:absolute;left:10px;top:420px;width:18px;height:18px;z-index:39;">
<input type="checkbox" id="jQueryButton7" name="" value="" checked="checked"><label style="width:100%;height:100%;" for="jQueryButton7"></label></div>
<div id="Layer20" style="position:absolute;text-align:center;left:390px;top:60px;width:120px;height:40px;z-index:40;" onclick="ShowObjectWithEffect('jQueryDialog1', 1, 'fade', 1000);return false;">
<div id="Layer20_Container" style="width:120px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text39" style="position:absolute;left:10px;top:10px;width:100px;height:19px;text-align:center;z-index:18;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><strong>REDACTAR</strong></span></div>
</div>
</div>
</div>
<div style="height:420px;overflow:auto;padding:0;" id="jquerytabs1-page-1">
</div>
<div style="height:420px;overflow:auto;padding:0;" id="jquerytabs1-page-2">
</div>
</div>
<div id="Layer16" style="position:absolute;text-align:left;left:669px;top:569px;width:38px;height:38px;z-index:52;">
<div id="wb_Text38" style="position:absolute;left:9px;top:9px;width:20px;height:18px;text-align:center;z-index:41;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;">7</span></div>
</div>
<div id="Layer7" style="position:absolute;text-align:left;left:609px;top:569px;width:38px;height:38px;z-index:53;">
<div id="wb_Text8" style="position:absolute;left:9px;top:9px;width:20px;height:18px;text-align:center;z-index:42;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;">6</span></div>
</div>
<div id="Layer8" style="position:absolute;text-align:left;left:549px;top:569px;width:38px;height:38px;z-index:54;">
<div id="wb_Text9" style="position:absolute;left:9px;top:9px;width:20px;height:18px;text-align:center;z-index:43;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;">5</span></div>
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:489px;top:569px;width:38px;height:38px;z-index:55;">
<div id="wb_Text34" style="position:absolute;left:9px;top:9px;width:20px;height:18px;text-align:center;z-index:44;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;">4</span></div>
</div>
<div id="Layer12" style="position:absolute;text-align:left;left:429px;top:569px;width:38px;height:38px;z-index:56;">
<div id="wb_Text35" style="position:absolute;left:9px;top:9px;width:20px;height:18px;text-align:center;z-index:45;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;">3</span></div>
</div>
<div id="Layer14" style="position:absolute;text-align:left;left:369px;top:569px;width:38px;height:38px;z-index:57;">
<div id="wb_Text36" style="position:absolute;left:9px;top:9px;width:20px;height:18px;text-align:center;z-index:46;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;">2</span></div>
</div>
<div id="Layer18" style="position:absolute;text-align:left;left:309px;top:569px;width:38px;height:38px;z-index:58;">
<div id="wb_Text37" style="position:absolute;left:9px;top:9px;width:20px;height:18px;text-align:center;z-index:47;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;">1</span></div>
</div>
</div>
<div id="wb_Text5" style="position:absolute;left:10px;top:128px;width:212px;height:16px;text-align:center;z-index:138;">
<span style="color:#000000;font-family:Arial;font-size:13px;">EMPRESA S.A. de C.V.</span></div>
<div id="Layer6" style="position:absolute;text-align:center;left:10px;top:370px;width:210px;height:410px;z-index:139;">
<div id="Layer6_Container" style="width:210px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text4" style="position:absolute;left:9px;top:9px;width:190px;height:16px;text-align:center;z-index:59;">
<span style="color:#000000;font-family:Arial;font-size:13px;">ULTIMAS PUNTUACIONES</span></div>
<div id="wb_Text17" style="position:absolute;left:9px;top:39px;width:190px;height:60px;z-index:60;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text18" style="position:absolute;left:9px;top:119px;width:190px;height:60px;z-index:61;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<hr id="Line1" style="position:absolute;left:9px;top:109px;width:189px;height:2px;z-index:62;">
<hr id="Line2" style="position:absolute;left:9px;top:189px;width:189px;height:2px;z-index:63;">
<hr id="Line3" style="position:absolute;left:9px;top:289px;width:189px;height:2px;z-index:64;">
<div id="wb_Text20" style="position:absolute;left:9px;top:309px;width:190px;height:60px;z-index:65;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
<div id="wb_Text21" style="position:absolute;left:119px;top:89px;width:83px;height:16px;text-align:right;z-index:66;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<div id="wb_Text23" style="position:absolute;left:119px;top:269px;width:83px;height:16px;text-align:right;z-index:67;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<div id="wb_Text24" style="position:absolute;left:119px;top:359px;width:83px;height:16px;text-align:right;z-index:68;">
<span style="color:#006A6A;font-family:Arial;font-size:13px;">Contactar</span></div>
<hr id="Line4" style="position:absolute;left:9px;top:379px;width:189px;height:2px;z-index:69;">
<div id="wb_Text28" style="position:absolute;left:9px;top:389px;width:190px;height:16px;text-align:center;z-index:70;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ver más.</span></div>
<div id="wb_Text19" style="position:absolute;left:9px;top:209px;width:190px;height:60px;z-index:71;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:12px;">Hernesto Guerrero: </span><span style="color:#808080;font-family:Arial;font-size:12px;">Excelente servicio, de hecho el mismo que en office depot o bestbuy pero más economico.</span></div>
</div>
</div>
<div id="wb_TabMenu1" style="position:absolute;left:230px;top:120px;width:1018px;height:36px;z-index:140;overflow:hidden;">
<ul id="TabMenu1">
<li><a href="./Mi_cuenta.php">Datos personales</a></li>
<li><a href="./Mi_puntuacion.php">Mi puntuación</a></li>
<li><a href="./Mis_Bugs.php">Mis Bugs</a></li>
<li><a href="./Mensajes.php" class="active">Mensajes</a></li>
</ul>
</div>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb10.png" alt="WYSIWYG Web Builder" style="position:absolute;left:581px;top:907px;border-width:0;z-index:250"></a>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:0px;top:800px;width:100%;height:140px;z-index:142;">
<div id="Layer5_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer1" style="position:fixed;text-align:center;left:0;top:0;right:0;height:50px;z-index:143;">
<div id="Layer1_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image12" style="position:absolute;left:10px;top:10px;width:50px;height:32px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:131;">
<img src="images/img0023.png" id="Image12" alt=""></div>
<div id="wb_Text94" style="position:absolute;left:70px;top:20px;width:130px;height:16px;z-index:132;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<form action="" name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:453px;top:4px;width:342px;height:37px;line-height:37px;z-index:133;" name="SiteSearch1" value="" placeholder="Ejemplo buscar: Zapatos en Jalisco - Abogado en Jalisco"></form>
<div id="wb_CssMenu1" style="position:absolute;left:1136px;top:0px;width:114px;height:50px;z-index:134;">
<ul>
<li class="firstmain"><a href="./CrearCuenta.php" target="_self">Registrarse</a>
</li>
</ul>
<br>
</div>
<div id="wb_LoginName1" style="position:absolute;left:820px;top:20px;width:190px;height:16px;z-index:135;">
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
<div id="Layer3" style="position:absolute;text-align:center;left:0px;top:50px;width:100%;height:5px;z-index:144;">
<div id="Layer3_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
</body>
</html>