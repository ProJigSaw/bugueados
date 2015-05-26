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
   var jQueryProgressbar1Opts =
   {
      value: 25
   };
   $("#jQueryProgressbar1").progressbar(jQueryProgressbar1Opts);
   searchParseURL();
});
</script>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="jQueryProgressbar1" style="position:absolute;left:960px;top:110px;width:290px;height:36px;z-index:82;">
</div>
<div id="Layer2" style="position:absolute;text-align:center;left:10px;top:160px;width:210px;height:190px;z-index:83;">
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
<div id="Layer4" style="position:absolute;text-align:left;left:230px;top:160px;width:1018px;height:618px;z-index:84;">
<div id="wb_Text2" style="position:absolute;left:829px;top:9px;width:184px;height:16px;text-align:right;z-index:22;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
<div id="wb_Text6" style="position:absolute;left:19px;top:19px;width:250px;height:18px;z-index:23;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Mi Cuenta - Datos Personales</span></div>
<div id="Layer8" style="position:absolute;text-align:left;left:9px;top:69px;width:242px;height:36px;z-index:24;">
<div id="wb_Text7" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:4;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">Bugueados S.A. de C.V.</span></div>
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:269px;top:69px;width:242px;height:36px;z-index:25;">
<div id="wb_Text9" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:5;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">GDL 19 55 35 11</span></div>
</div>
<div id="Layer12" style="position:absolute;text-align:left;left:519px;top:69px;width:242px;height:36px;z-index:26;">
<div id="wb_Text12" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:6;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">33 12 20 67 18</span></div>
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:269px;top:139px;width:242px;height:36px;z-index:27;">
<div id="wb_Text8" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:7;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">El zapote - 45050</span></div>
</div>
<div id="Layer9" style="position:absolute;text-align:left;left:9px;top:139px;width:242px;height:36px;z-index:28;">
<div id="wb_Text25" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:8;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">El tajín #1658</span></div>
</div>
<div id="Layer13" style="position:absolute;text-align:left;left:519px;top:139px;width:242px;height:36px;z-index:29;">
<div id="wb_Text11" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:9;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">Zapopan, Jalisco.</span></div>
</div>
<div id="Layer14" style="position:absolute;text-align:left;left:769px;top:139px;width:242px;height:36px;z-index:30;">
<div id="wb_Text10" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:10;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">Facebook - Twitter - Web</span></div>
</div>
<div id="wb_Text27" style="position:absolute;left:9px;top:49px;width:242px;height:16px;text-align:center;z-index:31;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Nombre o razón social</span></div>
<div id="wb_Text29" style="position:absolute;left:269px;top:49px;width:242px;height:16px;text-align:center;z-index:32;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Télefono</span></div>
<div id="wb_Text31" style="position:absolute;left:769px;top:49px;width:242px;height:16px;text-align:center;z-index:33;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">WhatsApp</span></div>
<div id="wb_Text32" style="position:absolute;left:9px;top:119px;width:242px;height:16px;text-align:center;z-index:34;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Dirección (Calle)</span></div>
<div id="wb_Text33" style="position:absolute;left:269px;top:119px;width:242px;height:16px;text-align:center;z-index:35;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Dirección (Colonia - C.P.)</span></div>
<div id="wb_Text34" style="position:absolute;left:519px;top:119px;width:242px;height:16px;text-align:center;z-index:36;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Colonia</span></div>
<div id="wb_Text35" style="position:absolute;left:769px;top:119px;width:242px;height:16px;text-align:center;z-index:37;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Redes Sociales</span></div>
<div id="Layer7" style="position:absolute;text-align:left;left:9px;top:189px;width:684px;height:405px;z-index:38;">
<div id="wb_Text16" style="position:absolute;left:229px;top:166px;width:240px;height:93px;text-align:center;z-index:11;">
<span style="color:#808080;font-family:Impact;font-size:75px;">M A P A</span></div>
<div id="wb_Text26" style="position:absolute;left:499px;top:9px;width:184px;height:16px;text-align:right;z-index:12;">
<span style="color:#00C0C0;font-family:Arial;font-size:13px;">Modificar</span></div>
</div>
<div id="Layer16" style="position:absolute;text-align:left;left:709px;top:189px;width:300px;height:405px;z-index:39;">
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
<div id="wb_Text47" style="position:absolute;left:409px;top:19px;width:210px;height:18px;z-index:40;text-align:left;">
<span style="color:#00C0C0;font-family:Arial;font-size:16px;">Usuario - LopezMendez23</span></div>
</div>
<div id="wb_TabMenu1" style="position:absolute;left:230px;top:120px;width:1018px;height:36px;z-index:85;overflow:hidden;">
<ul id="TabMenu1">
<li><a href="./Mi_cuenta.php" class="active">Datos personales</a></li>
<li><a href="./Mi_puntuacion.php">Mi puntuación</a></li>
<li><a href="./Mis_Bugs.php">Mis Bugs</a></li>
<li><a href="./Mensajes.php">Mensajes</a></li>
</ul>
</div>
<div id="Layer6" style="position:absolute;text-align:center;left:10px;top:370px;width:210px;height:410px;z-index:86;">
<div id="Layer6_Container" style="width:210px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text4" style="position:absolute;left:9px;top:19px;width:190px;height:38px;text-align:center;z-index:41;">
<span style="color:#000000;font-family:Impact;font-size:15px;">U L T I M A S&nbsp;&nbsp; P Y M E S<br>R E G I S T R A D A S</span></div>
<hr id="Line4" style="position:absolute;left:9px;top:109px;width:189px;height:2px;z-index:42;">
<div id="wb_Text28" style="position:absolute;left:9px;top:389px;width:190px;height:16px;text-align:center;z-index:43;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ver más.</span></div>
<div id="wb_Text3" style="position:absolute;left:59px;top:79px;width:150px;height:28px;z-index:44;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Text17" style="position:absolute;left:59px;top:59px;width:140px;height:15px;z-index:45;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Image3" style="position:absolute;left:9px;top:59px;width:40px;height:40px;z-index:46;">
<img src="images/Bugueadospeq.png" id="Image3" alt=""></div>
<hr id="Line1" style="position:absolute;left:9px;top:179px;width:189px;height:2px;z-index:47;">
<div id="wb_Text18" style="position:absolute;left:59px;top:139px;width:150px;height:28px;z-index:48;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Text19" style="position:absolute;left:59px;top:119px;width:140px;height:15px;z-index:49;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Image4" style="position:absolute;left:9px;top:119px;width:40px;height:40px;z-index:50;">
<img src="images/Bugueadospeq.png" id="Image4" alt=""></div>
<div id="wb_Text24" style="position:absolute;left:59px;top:349px;width:150px;height:28px;z-index:51;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Image7" style="position:absolute;left:9px;top:329px;width:40px;height:40px;z-index:52;">
<img src="images/Bugueadospeq.png" id="Image7" alt=""></div>
<div id="wb_Text48" style="position:absolute;left:59px;top:329px;width:140px;height:15px;z-index:53;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Text23" style="position:absolute;left:59px;top:259px;width:140px;height:15px;z-index:54;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
<div id="wb_Text22" style="position:absolute;left:59px;top:279px;width:150px;height:28px;z-index:55;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Image6" style="position:absolute;left:9px;top:259px;width:40px;height:40px;z-index:56;">
<img src="images/Bugueadospeq.png" id="Image6" alt=""></div>
<hr id="Line3" style="position:absolute;left:9px;top:319px;width:189px;height:2px;z-index:57;">
</div>
</div>
<div id="wb_Text5" style="position:absolute;left:10px;top:128px;width:212px;height:16px;text-align:center;z-index:87;">
<span style="color:#000000;font-family:Arial;font-size:13px;">EMPRESA S.A. de C.V.</span></div>
<div id="Layer15" style="position:absolute;text-align:left;left:1000px;top:230px;width:242px;height:36px;z-index:88;">
<div id="wb_Text13" style="position:absolute;left:10px;top:10px;width:220px;height:18px;text-align:center;z-index:67;">
<span style="color:#4B4B4B;font-family:Arial;font-size:16px;">33 12 20 67 18</span></div>
</div>
<div id="wb_Text30" style="position:absolute;left:750px;top:210px;width:242px;height:16px;text-align:center;z-index:89;">
<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Célular</span></div>
<div id="wb_Text45" style="position:absolute;left:980px;top:120px;width:250px;height:18px;text-align:center;z-index:90;">
<span style="color:#696969;font-family:Arial;font-size:16px;">Pérfil completado:</span></div>
<div id="wb_Text46" style="position:absolute;left:1140px;top:120px;width:100px;height:20px;text-align:right;z-index:91;">
<span style="color:#000000;font-family:Impact;font-size:16px;">2 5 %</span></div>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb10.png" alt="WYSIWYG Web Builder" style="position:absolute;left:581px;top:907px;border-width:0;z-index:250"></a>
<hr id="Line2" style="position:absolute;left:20px;top:620px;width:189px;height:2px;z-index:93;">
<div id="wb_Text20" style="position:absolute;left:70px;top:580px;width:150px;height:28px;z-index:94;text-align:left;">
<span style="color:#696969;font-family:Arial;font-size:11px;">Compra venta de zapatos, precios al por mayor </span></div>
<div id="wb_Image5" style="position:absolute;left:20px;top:560px;width:40px;height:40px;z-index:95;">
<img src="images/Bugueadospeq.png" id="Image5" alt=""></div>
<div id="wb_Text21" style="position:absolute;left:70px;top:560px;width:140px;height:15px;z-index:96;text-align:left;">
<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Calzado OP S.A. de C.V.</span></div>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:0%;top:800px;width:100%;height:140px;z-index:97;">
<div id="Layer5_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer1" style="position:fixed;text-align:center;left:0;top:0;right:0;height:50px;z-index:98;">
<div id="Layer1_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image12" style="position:absolute;left:10px;top:10px;width:50px;height:32px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:77;">
<img src="images/img0019.png" id="Image12" alt=""></div>
<div id="wb_Text94" style="position:absolute;left:70px;top:20px;width:130px;height:16px;z-index:78;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<form action="" name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:453px;top:4px;width:342px;height:37px;line-height:37px;z-index:79;" name="SiteSearch1" value="" placeholder="Ejemplo buscar: Zapatos en Jalisco - Abogado en Jalisco"></form>
<div id="wb_CssMenu1" style="position:absolute;left:1136px;top:0px;width:114px;height:50px;z-index:80;">
<ul>
<li class="firstmain"><a href="./CrearCuenta.php" target="_self">Registrarse</a>
</li>
</ul>
<br>
</div>
<div id="wb_LoginName1" style="position:absolute;left:820px;top:20px;width:190px;height:16px;z-index:81;">
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
<div id="Layer3" style="position:absolute;text-align:center;left:0px;top:50px;width:100%;height:5px;z-index:99;">
<div id="Layer3_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
</body>
</html>