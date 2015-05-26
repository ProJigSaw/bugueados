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
<link href="index.css" rel="stylesheet">
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
<div id="wb_Shape2" style="position:absolute;left:810px;top:70px;width:180px;height:150px;z-index:470;">
<img src="images/img0003.png" id="Shape2" alt="" style="width:180px;height:150px;"></div>
<div id="wb_Shape1" style="position:absolute;left:250px;top:70px;width:180px;height:150px;z-index:471;">
<img src="images/img0004.png" id="Shape1" alt="" style="width:180px;height:150px;"></div>
<div id="wb_Shape6" style="position:absolute;left:530px;top:70px;width:180px;height:150px;z-index:472;">
<img src="images/img0005.png" id="Shape6" alt="" style="width:180px;height:150px;"></div>
<div id="wb_Text5" style="position:absolute;left:530px;top:100px;width:180px;height:36px;text-align:center;z-index:473;">
<span style="color:#808080;font-family:Arial;font-size:16px;">Empresas<br>Registradas</span></div>
<div id="wb_Text4" style="position:absolute;left:530px;top:150px;width:180px;height:33px;text-align:center;z-index:474;">
<span style="color:#FFFFFF;font-family:Arial;font-size:29px;">124,498</span></div>
<div id="wb_Text2" style="position:absolute;left:250px;top:100px;width:180px;height:36px;text-align:center;z-index:475;">
<span style="color:#808080;font-family:Arial;font-size:16px;">Compartido en<br>redes sociales</span></div>
<div id="wb_Text3" style="position:absolute;left:250px;top:150px;width:180px;height:33px;text-align:center;z-index:476;">
<span style="color:#FFFFFF;font-family:Arial;font-size:29px;">1,203.057</span></div>
<div id="wb_Text7" style="position:absolute;left:810px;top:110px;width:180px;height:36px;text-align:center;z-index:477;">
<span style="color:#808080;font-family:Arial;font-size:16px;">Usuarios<br>Online</span></div>
<div id="wb_Text6" style="position:absolute;left:810px;top:160px;width:180px;height:33px;text-align:center;z-index:478;">
<span style="color:#FFFFFF;font-family:Arial;font-size:29px;">2,452</span></div>
<form action="" name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:430px;top:240px;width:388px;height:46px;line-height:46px;z-index:479;" name="SiteSearch1" value="" placeholder="Ejemplo buscar: Zapatos en Jalisco - Abogado en Jalisco"></form>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb10.png" alt="WYSIWYG Web Builder" style="position:absolute;left:581px;top:1987px;border-width:0;z-index:250"></a>
</div>
<div id="Layer3" style="position:absolute;text-align:center;left:0px;top:1100px;width:100%;height:520px;z-index:481;">
<div id="Layer3_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="Layer19" style="position:absolute;text-align:left;left:17px;top:60px;width:1215px;height:438px;z-index:81;">
<div id="Layer21" style="position:absolute;text-align:left;left:12px;top:119px;width:190px;height:88px;z-index:60;">
<div id="wb_Text45" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text46" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:1;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text47" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:2;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer22" style="position:absolute;text-align:left;left:259px;top:119px;width:190px;height:88px;z-index:61;">
<div id="wb_Text48" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text49" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:4;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text50" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:5;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer23" style="position:absolute;text-align:left;left:259px;top:9px;width:190px;height:88px;z-index:62;">
<div id="wb_Text51" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text52" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:7;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text53" style="position:absolute;left:6px;top:69px;width:172px;height:18px;text-align:center;z-index:8;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer26" style="position:absolute;text-align:left;left:511px;top:9px;width:190px;height:88px;z-index:63;">
<div id="wb_Text57" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:9;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text58" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:10;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text59" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:11;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer27" style="position:absolute;text-align:left;left:511px;top:119px;width:190px;height:88px;z-index:64;">
<div id="wb_Text60" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:12;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text61" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:13;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text62" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:14;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer24" style="position:absolute;text-align:left;left:772px;top:9px;width:190px;height:88px;z-index:65;">
<div id="wb_Text54" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:15;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text55" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:16;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text56" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:17;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer28" style="position:absolute;text-align:left;left:772px;top:119px;width:190px;height:88px;z-index:66;">
<div id="wb_Text63" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:18;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text64" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:19;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text65" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:20;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer30" style="position:absolute;text-align:left;left:1012px;top:119px;width:190px;height:88px;z-index:67;">
<div id="wb_Text69" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:21;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text70" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:22;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text71" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:23;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer40" style="position:absolute;text-align:left;left:512px;top:229px;width:190px;height:88px;z-index:68;">
<div id="wb_Text104" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:24;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text105" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:25;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text106" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:26;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer42" style="position:absolute;text-align:left;left:259px;top:229px;width:190px;height:88px;z-index:69;">
<div id="wb_Text110" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:27;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text111" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:28;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text112" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:29;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer43" style="position:absolute;text-align:left;left:1012px;top:229px;width:190px;height:88px;z-index:70;">
<div id="wb_Text113" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:30;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text114" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:31;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text115" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:32;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer44" style="position:absolute;text-align:left;left:772px;top:229px;width:190px;height:88px;z-index:71;">
<div id="wb_Text116" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:33;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text117" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:34;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text118" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:35;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer46" style="position:absolute;text-align:left;left:12px;top:229px;width:190px;height:88px;z-index:72;">
<div id="wb_Text122" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:36;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text123" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:37;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text124" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:38;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer45" style="position:absolute;text-align:left;left:12px;top:339px;width:190px;height:88px;z-index:73;">
<div id="wb_Text119" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:39;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text120" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:40;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text121" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:41;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer20" style="position:absolute;text-align:left;left:12px;top:9px;width:190px;height:88px;z-index:74;">
<div id="wb_Text43" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:42;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text39" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:43;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text40" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:44;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer39" style="position:absolute;text-align:left;left:512px;top:339px;width:190px;height:88px;z-index:75;">
<div id="wb_Text102" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:45;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text103" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:46;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
<div id="wb_Text101" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:47;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
</div>
<div id="Layer1" style="position:absolute;text-align:left;left:772px;top:339px;width:190px;height:88px;z-index:76;">
<div id="wb_Text95" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:48;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text96" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:49;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text97" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:50;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer38" style="position:absolute;text-align:left;left:1012px;top:339px;width:190px;height:88px;z-index:77;">
<div id="wb_Text98" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:51;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text99" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:52;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text100" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:53;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer29" style="position:absolute;text-align:left;left:1012px;top:9px;width:190px;height:88px;z-index:78;">
<div id="wb_Text66" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:54;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text67" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:55;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text68" style="position:absolute;left:7px;top:69px;width:172px;height:18px;text-align:center;z-index:56;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer41" style="position:absolute;text-align:left;left:259px;top:339px;width:190px;height:88px;z-index:79;">
<div id="wb_Text107" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:57;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text108" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:58;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text109" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:59;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
</div>
<div id="Layer18" style="position:absolute;text-align:left;left:17px;top:20px;width:1215px;height:40px;z-index:82;">
<div id="wb_Text38" style="position:absolute;left:472px;top:9px;width:271px;height:18px;text-align:center;z-index:80;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Ultimas Empresas Registradas</span></div>
</div>
</div>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:0px;top:1620px;width:100%;height:400px;z-index:482;">
<div id="Layer5_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image7" style="position:absolute;left:577px;top:300px;width:96px;height:96px;z-index:83;">
<img src="images/eddy.png" id="Image7" alt=""></div>
<div id="wb_Text126" style="position:absolute;left:140px;top:119px;width:163px;height:16px;text-align:center;z-index:84;">
<span style="color:#00C6F0;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Image2" style="position:absolute;left:508px;top:60px;width:235px;height:235px;z-index:85;">
<img src="images/chat2.png" id="Image2" alt=""></div>
<div id="wb_Text125" style="position:absolute;left:500px;top:140px;width:250px;height:27px;text-align:center;z-index:86;">
<span style="color:#FFFFFF;font-family:'Bookman Old Style';font-size:24px;">CONTACTANOS</span></div>
<div id="wb_Text127" style="position:absolute;left:520px;top:180px;width:194px;height:16px;text-align:center;z-index:87;">
<span style="color:#00C6F0;font-family:Arial;font-size:13px;">director@bugueados.com</span></div>
</div>
</div>
<div id="Layer7" style="position:absolute;text-align:center;left:0px;top:310px;width:100%;height:650px;z-index:483;">
<div id="Layer7_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="Layer12" style="position:absolute;text-align:left;left:17px;top:52px;width:1215px;height:576px;z-index:169;">
<div id="Layer14" style="position:absolute;text-align:left;left:912px;top:17px;width:285px;height:120px;z-index:152;">
<div id="wb_Image6" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:88;">
<img src="images/qrplanet%20%281%29.png" id="Image6" alt=""></div>
<div id="wb_Text21" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:89;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text22" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:90;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text23" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:91;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer8" style="position:absolute;text-align:left;left:612px;top:17px;width:285px;height:120px;z-index:153;">
<div id="wb_Image1" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:92;">
<img src="images/qrplanet%20%281%29.png" id="Image1" alt=""></div>
<div id="wb_Text1" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:93;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text8" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:94;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text9" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:95;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer9" style="position:absolute;text-align:left;left:312px;top:17px;width:285px;height:120px;z-index:154;">
<div id="wb_Image4" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:96;">
<img src="images/qrplanet%20%281%29.png" id="Image4" alt=""></div>
<div id="wb_Text10" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:97;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text16" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:98;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text17" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:99;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:12px;top:17px;width:285px;height:120px;z-index:155;">
<div id="wb_Image5" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:100;">
<img src="images/qrplanet%20%281%29.png" id="Image5" alt=""></div>
<div id="wb_Text18" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:101;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text19" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:102;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text20" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:103;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer15" style="position:absolute;text-align:left;left:12px;top:157px;width:285px;height:120px;z-index:156;">
<div id="wb_Image8" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:104;">
<img src="images/qrplanet%20%281%29.png" id="Image8" alt=""></div>
<div id="wb_Text24" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:105;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text25" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:106;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text26" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:107;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer17" style="position:absolute;text-align:left;left:612px;top:157px;width:285px;height:120px;z-index:157;">
<div id="wb_Image10" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:108;">
<img src="images/qrplanet%20%281%29.png" id="Image10" alt=""></div>
<div id="wb_Text32" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:109;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text33" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:110;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text34" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:111;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer25" style="position:absolute;text-align:left;left:912px;top:157px;width:285px;height:120px;z-index:158;">
<div id="wb_Image11" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:112;">
<img src="images/qrplanet%20%281%29.png" id="Image11" alt=""></div>
<div id="wb_Text35" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:113;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text36" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:114;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text72" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:115;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer16" style="position:absolute;text-align:left;left:312px;top:157px;width:285px;height:120px;z-index:159;">
<div id="wb_Image9" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:116;">
<img src="images/qrplanet%20%281%29.png" id="Image9" alt=""></div>
<div id="wb_Text27" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:117;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text30" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:118;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text31" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:119;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer6" style="position:absolute;text-align:left;left:912px;top:297px;width:285px;height:120px;z-index:160;">
<div id="wb_Image3" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:120;">
<img src="images/qrplanet%20%281%29.png" id="Image3" alt=""></div>
<div id="wb_Text41" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:121;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text42" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:122;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text44" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:123;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer31" style="position:absolute;text-align:left;left:612px;top:297px;width:285px;height:120px;z-index:161;">
<div id="wb_Image13" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:124;">
<img src="images/qrplanet%20%281%29.png" id="Image13" alt=""></div>
<div id="wb_Text73" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:125;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text74" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:126;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text75" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:127;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer32" style="position:absolute;text-align:left;left:312px;top:297px;width:285px;height:120px;z-index:162;">
<div id="wb_Image14" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:128;">
<img src="images/qrplanet%20%281%29.png" id="Image14" alt=""></div>
<div id="wb_Text76" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:129;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text77" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:130;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text78" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:131;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer33" style="position:absolute;text-align:left;left:12px;top:297px;width:285px;height:120px;z-index:163;">
<div id="wb_Image15" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:132;">
<img src="images/qrplanet%20%281%29.png" id="Image15" alt=""></div>
<div id="wb_Text79" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:133;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text80" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:134;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text81" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:135;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer37" style="position:absolute;text-align:left;left:12px;top:437px;width:285px;height:120px;z-index:164;">
<div id="wb_Image19" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:136;">
<img src="images/qrplanet%20%281%29.png" id="Image19" alt=""></div>
<div id="wb_Text91" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:137;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text92" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:138;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text93" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:139;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer36" style="position:absolute;text-align:left;left:312px;top:437px;width:285px;height:120px;z-index:165;">
<div id="wb_Image18" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:140;">
<img src="images/qrplanet%20%281%29.png" id="Image18" alt=""></div>
<div id="wb_Text88" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:141;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text89" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:142;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text90" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:143;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer35" style="position:absolute;text-align:left;left:612px;top:437px;width:285px;height:120px;z-index:166;">
<div id="wb_Image17" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:144;">
<img src="images/qrplanet%20%281%29.png" id="Image17" alt=""></div>
<div id="wb_Text85" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:145;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text86" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:146;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text87" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:147;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
<div id="Layer34" style="position:absolute;text-align:left;left:912px;top:437px;width:285px;height:120px;z-index:167;">
<div id="wb_Image16" style="position:absolute;left:4px;top:11px;width:99px;height:99px;z-index:148;">
<img src="images/qrplanet%20%281%29.png" id="Image16" alt=""></div>
<div id="wb_Text82" style="position:absolute;left:109px;top:11px;width:176px;height:16px;text-align:center;z-index:149;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text83" style="position:absolute;left:109px;top:41px;width:170px;height:32px;text-align:center;z-index:150;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text84" style="position:absolute;left:109px;top:81px;width:172px;height:18px;text-align:center;z-index:151;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
</div>
</div>
<div id="Layer13" style="position:absolute;text-align:left;left:17px;top:10px;width:1215px;height:40px;z-index:170;">
<div id="wb_Text37" style="position:absolute;left:472px;top:9px;width:271px;height:18px;text-align:center;z-index:168;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Ultimos cupones creados</span></div>
</div>
</div>
</div>
<div id="Layer2" style="position:absolute;text-align:center;left:0px;top:0px;width:100%;height:75px;z-index:484;">
<div id="Layer2_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="Layer4" style="position:fixed;text-align:center;left:0;top:0;right:0;height:70px;z-index:176;">
<div id="Layer4_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image12" style="position:absolute;left:10px;top:10px;width:50px;height:32px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:171;">
<a href="./CMS.php"><img src="images/img0002.png" id="Image12" alt=""></a></div>
<div id="wb_Text94" style="position:absolute;left:70px;top:20px;width:130px;height:16px;z-index:172;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<div id="wb_LoginName1" style="position:absolute;left:960px;top:10px;width:270px;height:16px;text-align:center;z-index:173;">
<span id="LoginName1">Bienvenido <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['username'];
}
else
{
   echo 'Sin sesión Activa';
}
?>!</span></div>
<div id="wb_CssMenu2" style="position:absolute;left:970px;top:30px;width:140px;height:40px;z-index:174;">
<ul>
<li class="firstmain"><a href="./CrearCuenta.php" target="_self">Registrarse</a>
</li>
</ul>
<br>
</div>
<div id="wb_CssMenu1" style="position:absolute;left:1110px;top:30px;width:140px;height:40px;z-index:175;">
<ul>
<li class="firstmain"><a href="./CrearCuenta.php" target="_self">Iniciar&nbsp;Sesion</a>
</li>
</ul>
<br>
</div>
</div>
</div>
</div>
</div>
<div id="Layer10" style="position:absolute;text-align:center;left:0px;top:970px;width:100%;height:130px;z-index:485;">
<div id="Layer10_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text28" style="position:absolute;left:257px;top:50px;width:737px;height:18px;text-align:center;z-index:463;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Tan solo en México, las PYMES han logrado alcanzar hasta el 81% de las ofertas de empleo.</span></div>
<div id="wb_Text29" style="position:absolute;left:257px;top:70px;width:737px;height:16px;text-align:center;z-index:464;">
<span style="color:#0099B9;font-family:Arial;font-size:13px;">Una razón más para apoyar el antimonopolio.</span></div>
</div>
</div>
</body>
</html>