<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<meta name="generator" content="WYSIWYG Web Builder 10 - http://www.wysiwygwebbuilder.com">
<link href="Antimonopolio.css" rel="stylesheet">
<link href="página1.css" rel="stylesheet">
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
<div id="wb_Image2" style="position:absolute;left:482px;top:98px;width:279px;height:179px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:212;">
<img src="images/img0006.png" id="Image2" alt=""></div>
<form action="" name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:440px;top:300px;width:368px;height:38px;line-height:38px;z-index:213;" name="SiteSearch1" value="" placeholder="Ejemplo buscar: Zapatos en Jalisco - Abogado en Jalisco"></form>
<div id="wb_Shape2" style="position:absolute;left:260px;top:1570px;width:180px;height:150px;z-index:214;">
<img src="images/img0013.png" id="Shape2" alt="" style="width:180px;height:150px;"></div>
<div id="wb_Shape6" style="position:absolute;left:535px;top:1570px;width:180px;height:150px;z-index:215;">
<img src="images/img0014.png" id="Shape6" alt="" style="width:180px;height:150px;"></div>
<div id="wb_Shape7" style="position:absolute;left:770px;top:1570px;width:180px;height:150px;z-index:216;">
<img src="images/img0015.png" id="Shape7" alt="" style="width:180px;height:150px;"></div>
<div id="wb_Text5" style="position:absolute;left:535px;top:1600px;width:180px;height:36px;text-align:center;z-index:217;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Empresas<br>Registradas</span></div>
<div id="wb_Text4" style="position:absolute;left:530px;top:1650px;width:180px;height:33px;text-align:center;z-index:218;">
<span style="color:#FF3C1A;font-family:Arial;font-size:29px;">124,498</span></div>
<div id="wb_Text2" style="position:absolute;left:260px;top:1600px;width:180px;height:36px;text-align:center;z-index:219;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Compartido en<br>redes sociales</span></div>
<div id="wb_Text3" style="position:absolute;left:260px;top:1650px;width:180px;height:33px;text-align:center;z-index:220;">
<span style="color:#FF3C1A;font-family:Arial;font-size:29px;">1,203.057</span></div>
<div id="wb_Text7" style="position:absolute;left:770px;top:1600px;width:180px;height:36px;text-align:center;z-index:221;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Usuarios<br>Online</span></div>
<div id="wb_Text6" style="position:absolute;left:760px;top:1650px;width:180px;height:33px;text-align:center;z-index:222;">
<span style="color:#FF3C1A;font-family:Arial;font-size:29px;">2,452</span></div>
</div>
<div id="Layer25" style="position:absolute;text-align:center;left:0px;top:380px;width:100%;height:246px;z-index:223;">
<div id="Layer25_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer7" style="position:absolute;text-align:center;left:0px;top:870px;width:100%;height:560px;z-index:224;">
<div id="Layer7_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="Layer12" style="position:absolute;text-align:left;left:17px;top:50px;width:1215px;height:218px;z-index:67;">
<div id="Layer6" style="position:absolute;text-align:left;left:12px;top:19px;width:190px;height:180px;z-index:20;">
<div id="wb_Image3" style="position:absolute;left:49px;top:59px;width:99px;height:99px;z-index:0;">
<img src="images/qrplanet%20%281%29.png" id="Image3" alt=""></div>
<div id="wb_Text42" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:1;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text44" style="position:absolute;left:9px;top:159px;width:172px;height:18px;text-align:center;z-index:2;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
<div id="wb_Text41" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
</div>
<div id="Layer14" style="position:absolute;text-align:left;left:252px;top:19px;width:190px;height:180px;z-index:21;">
<div id="wb_Image1" style="position:absolute;left:49px;top:59px;width:99px;height:99px;z-index:4;">
<img src="images/qrplanet%20%281%29.png" id="Image1" alt=""></div>
<div id="wb_Text9" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:5;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text10" style="position:absolute;left:9px;top:159px;width:172px;height:18px;text-align:center;z-index:6;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
<div id="wb_Text18" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:7;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
</div>
<div id="Layer15" style="position:absolute;text-align:left;left:511px;top:19px;width:190px;height:180px;z-index:22;">
<div id="wb_Image4" style="position:absolute;left:49px;top:59px;width:99px;height:99px;z-index:8;">
<img src="images/qrplanet%20%281%29.png" id="Image4" alt=""></div>
<div id="wb_Text19" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:9;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text27" style="position:absolute;left:9px;top:159px;width:172px;height:18px;text-align:center;z-index:10;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
<div id="wb_Text30" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:11;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
</div>
<div id="Layer16" style="position:absolute;text-align:left;left:772px;top:19px;width:190px;height:180px;z-index:23;">
<div id="wb_Image5" style="position:absolute;left:49px;top:59px;width:99px;height:99px;z-index:12;">
<img src="images/qrplanet%20%281%29.png" id="Image5" alt=""></div>
<div id="wb_Text31" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:13;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text32" style="position:absolute;left:9px;top:159px;width:172px;height:18px;text-align:center;z-index:14;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
<div id="wb_Text33" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:15;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
</div>
<div id="Layer17" style="position:absolute;text-align:left;left:1012px;top:19px;width:190px;height:180px;z-index:24;">
<div id="wb_Image6" style="position:absolute;left:49px;top:59px;width:99px;height:99px;z-index:16;">
<img src="images/qrplanet%20%281%29.png" id="Image6" alt=""></div>
<div id="wb_Text34" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:17;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">2 X 1 En todos nuestros helados - Fines de semana</span></div>
<div id="wb_Text35" style="position:absolute;left:9px;top:159px;width:172px;height:18px;text-align:center;z-index:18;">
<span style="color:#696969;font-family:Arial;font-size:16px;">www.bugueados.com</span></div>
<div id="wb_Text36" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:19;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
</div>
</div>
<div id="Layer13" style="position:absolute;text-align:left;left:17px;top:10px;width:1215px;height:40px;z-index:68;">
<div id="wb_Text37" style="position:absolute;left:472px;top:9px;width:271px;height:18px;text-align:center;z-index:25;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Ultimas cupones creados</span></div>
</div>
<div id="Layer18" style="position:absolute;text-align:left;left:17px;top:290px;width:1215px;height:40px;z-index:69;">
<div id="wb_Text38" style="position:absolute;left:472px;top:9px;width:271px;height:18px;text-align:center;z-index:26;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Ultimas Empresas Registradas</span></div>
</div>
<div id="Layer19" style="position:absolute;text-align:left;left:17px;top:330px;width:1215px;height:218px;z-index:70;">
<div id="Layer20" style="position:absolute;text-align:left;left:12px;top:9px;width:190px;height:88px;z-index:57;">
<div id="wb_Text43" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:27;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text39" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:28;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text40" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:29;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer21" style="position:absolute;text-align:left;left:12px;top:119px;width:190px;height:88px;z-index:58;">
<div id="wb_Text45" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:30;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text46" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:31;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text47" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:32;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer22" style="position:absolute;text-align:left;left:252px;top:119px;width:190px;height:88px;z-index:59;">
<div id="wb_Text48" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:33;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text49" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:34;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text50" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:35;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer23" style="position:absolute;text-align:left;left:252px;top:9px;width:190px;height:88px;z-index:60;">
<div id="wb_Text51" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:36;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text52" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:37;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text53" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:38;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer26" style="position:absolute;text-align:left;left:511px;top:9px;width:190px;height:88px;z-index:61;">
<div id="wb_Text57" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:39;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text58" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:40;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text59" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:41;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer27" style="position:absolute;text-align:left;left:511px;top:119px;width:190px;height:88px;z-index:62;">
<div id="wb_Text60" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:42;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text61" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:43;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text62" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:44;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer24" style="position:absolute;text-align:left;left:772px;top:9px;width:190px;height:88px;z-index:63;">
<div id="wb_Text54" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:45;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text55" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:46;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text56" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:47;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer28" style="position:absolute;text-align:left;left:772px;top:119px;width:190px;height:88px;z-index:64;">
<div id="wb_Text63" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:48;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text64" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:49;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text65" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:50;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer29" style="position:absolute;text-align:left;left:1012px;top:9px;width:190px;height:88px;z-index:65;">
<div id="wb_Text66" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:51;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text67" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:52;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text68" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:53;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
<div id="Layer30" style="position:absolute;text-align:left;left:1012px;top:119px;width:190px;height:88px;z-index:66;">
<div id="wb_Text69" style="position:absolute;left:9px;top:9px;width:172px;height:16px;text-align:center;z-index:54;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.</span></div>
<div id="wb_Text70" style="position:absolute;left:9px;top:29px;width:172px;height:32px;text-align:center;z-index:55;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Compra venta de herramientas y laminas.</span></div>
<div id="wb_Text71" style="position:absolute;left:9px;top:69px;width:172px;height:18px;text-align:center;z-index:56;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Más información</span></div>
</div>
</div>
</div>
</div>
<div id="Layer8" style="position:absolute;text-align:center;left:0px;top:626px;width:100%;height:244px;z-index:225;">
<div id="Layer8_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer9" style="position:absolute;text-align:center;left:0px;top:390px;width:100%;height:460px;z-index:226;">
<div id="Layer9_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Shape3" style="position:absolute;left:425px;top:30px;width:400px;height:400px;z-index:71;">
<img src="images/img0007.png" id="Shape3" alt="" style="width:400px;height:400px;"></div>
<div id="wb_Text22" style="position:absolute;left:480px;top:190px;width:290px;height:80px;text-align:center;z-index:72;">
<span style="color:#FFFFFF;font-family:Impact;font-size:64px;">$1,000.00</span></div>
<div id="wb_Text20" style="position:absolute;left:490px;top:250px;width:270px;height:45px;text-align:center;z-index:73;">
<span style="color:#FFFFFF;font-family:'Bookman Old Style';font-size:37px;">un solo pago</span></div>
<div id="wb_Shape8" style="position:absolute;left:823px;top:110px;width:250px;height:250px;z-index:74;">
<img src="images/img0008.png" id="Shape8" alt="" style="width:250px;height:250px;"></div>
<div id="wb_Text24" style="position:absolute;left:200px;top:190px;width:210px;height:90px;text-align:center;z-index:75;">
<span style="color:#FFFFFF;font-family:'Bookman Old Style';font-size:37px;">TU EMPRESA</span></div>
<div id="wb_Shape1" style="position:absolute;left:176px;top:110px;width:250px;height:250px;z-index:76;">
<img src="images/img0009.png" id="Shape1" alt="" style="width:250px;height:250px;"></div>
<div id="wb_Text21" style="position:absolute;left:220px;top:210px;width:165px;height:34px;text-align:center;z-index:77;">
<span style="color:#0F0F0F;font-family:Impact;font-size:27px;">ANUNCIATE</span></div>
<div id="wb_Text23" style="position:absolute;left:230px;top:240px;width:150px;height:16px;text-align:center;z-index:78;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Tu empresa de por vida</span></div>
<div id="wb_Text25" style="position:absolute;left:870px;top:210px;width:165px;height:34px;text-align:center;z-index:79;">
<span style="color:#0F0F0F;font-family:Impact;font-size:27px;">ENCUENTRA</span></div>
<div id="wb_Text26" style="position:absolute;left:880px;top:240px;width:150px;height:16px;text-align:center;z-index:80;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">mejores proveedores</span></div>
<div id="wb_Shape9" style="position:absolute;left:52px;top:169px;width:125px;height:125px;z-index:81;">
<img src="images/img0010.png" id="Shape9" alt="" style="width:125px;height:125px;"></div>
<div id="wb_Shape10" style="position:absolute;left:1070px;top:169px;width:125px;height:125px;z-index:82;">
<img src="images/img0011.png" id="Shape10" alt="" style="width:125px;height:125px;"></div>
<div id="wb_Text1" style="position:absolute;left:70px;top:220px;width:90px;height:20px;text-align:center;z-index:83;">
<span style="color:#FFFFFF;font-family:Impact;font-size:16px;">servicios</span></div>
<div id="wb_Text8" style="position:absolute;left:1090px;top:220px;width:90px;height:20px;text-align:center;z-index:84;">
<span style="color:#FFFFFF;font-family:Impact;font-size:16px;">productos</span></div>
</div>
</div>
<div id="Layer3" style="position:absolute;text-align:center;left:0px;top:1730px;width:100%;height:710px;z-index:227;">
<div id="Layer3_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text11" style="position:absolute;left:15px;top:290px;width:1220px;height:90px;text-align:center;z-index:85;">
<span style="color:#FFFFFF;font-family:'Arial Black';font-size:64px;">ENCUENTRA LOS MEJORES </span></div>
<div id="wb_Text12" style="position:absolute;left:190px;top:390px;width:560px;height:80px;text-align:center;z-index:86;">
<span style="color:#1E1E1E;font-family:Impact;font-size:64px;">servicios</span></div>
<div id="wb_Text13" style="position:absolute;left:510px;top:390px;width:560px;height:80px;text-align:center;z-index:87;">
<span style="color:#1E1E1E;font-family:Impact;font-size:64px;">productos</span></div>
<div id="wb_Text14" style="position:absolute;left:460px;top:350px;width:324px;height:156px;text-align:center;z-index:88;">
<span style="color:#002B33;font-family:Impact;font-size:128px;">Y</span></div>
<div id="wb_Text15" style="position:absolute;left:345px;top:480px;width:560px;height:43px;text-align:center;z-index:89;">
<span style="color:#002B33;font-family:Impact;font-size:35px;">de empresas locales e internacionales</span></div>
</div>
</div>
<div id="Layer4" style="position:fixed;text-align:center;left:0;top:0;right:0;height:50px;z-index:228;">
<div id="Layer4_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_CssMenu2" style="position:absolute;left:960px;top:0px;width:285px;height:50px;z-index:90;">
<ul>
<li class="firstmain"><a href="./Mi_cuenta.php" target="_self">Mi&nbsp;cuenta</a>
</li>
<li><a href="#" target="_self">Registrarse</a>
</li>
</ul>
<br>
</div>
<div id="wb_Image12" style="position:absolute;left:17px;top:10px;width:35px;height:22px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:91;">
<img src="images/img0012.png" id="Image12" alt=""></div>
</div>
</div>
<div id="Layer2" style="position:absolute;text-align:center;left:0px;top:50px;width:100%;height:5px;z-index:229;">
<div id="Layer2_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer10" style="position:absolute;text-align:center;left:0px;top:1430px;width:100%;height:130px;z-index:230;">
<div id="Layer10_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text28" style="position:absolute;left:257px;top:50px;width:737px;height:18px;text-align:center;z-index:209;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Tan solo en México, las PYMES han logrado alcanzar hasta el 81% de las ofertas de empleo.</span></div>
<div id="wb_Text29" style="position:absolute;left:257px;top:70px;width:737px;height:16px;text-align:center;z-index:210;">
<span style="color:#0099B9;font-family:Arial;font-size:13px;">Una razón más para apoyar el antimonopolio.</span></div>
</div>
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:0px;top:1560px;width:100%;height:20px;z-index:231;">
<div id="Layer1_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:0px;top:2440px;width:100%;height:244px;z-index:232;">
<div id="Layer5_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image7" style="position:absolute;left:577px;top:148px;width:96px;height:96px;z-index:211;">
<img src="images/eddy.png" id="Image7" alt=""></div>
</div>
</div>
</body>
</html>