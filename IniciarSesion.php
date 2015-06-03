<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'loginform')
{
   $success_page = '';
   $error_page = basename(__FILE__);
   $mysql_server = 'mysql.hostinger.mx';
   $mysql_username = 'u143464270_regbu';
   $mysql_password = 'byeps2.1';
   $mysql_database = 'u143464270_regbu';
   $mysql_table = 'regbu';
   $crypt_pass = md5($_POST['password']);
   $found = false;
   $fullname = '';
   $session_timeout = 600;
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
   $sql = "SELECT password, fullname, active FROM ".$mysql_table." WHERE username = '".mysqli_real_escape_string($db, $_POST['username'])."'";
   $result = mysqli_query($db, $sql);
   if ($data = mysqli_fetch_array($result))
   {
      if ($crypt_pass == $data['password'] && $data['active'] != 0)
      {
         $found = true;
         $fullname = $data['fullname'];
      }
   }
   mysqli_close($db);
   if($found == false)
   {
      header('Location: '.$error_page);
      exit;
   }
   else
   {
      if (session_id() == "")
      {
         session_start();
      }
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['fullname'] = $fullname;
      $_SESSION['expires_by'] = time() + $session_timeout;
      $_SESSION['expires_timeout'] = $session_timeout;
      $rememberme = isset($_POST['rememberme']) ? true : false;
      if ($rememberme)
      {
         setcookie('username', $_POST['username'], time() + 3600*24*30);
         setcookie('password', $_POST['password'], time() + 3600*24*30);
      }
      header('Location: '.$success_page);
      exit;
   }
}
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
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
<link href="IniciarSesion.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function()
{
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
<div id="wb_Login1" style="position:absolute;left:405px;top:190px;width:440px;height:260px;text-align:right;z-index:20;">
<form name="loginform" method="post" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="Login1_header" colspan="2" style="height:22px;">Iniciar Sesión</td>
</tr>
<tr>
   <td style="height:42px;width:147px">Usuario:</td>
   <td style="text-align:left"><input class="Login1_input" name="username" type="text" id="username" value="<?php echo $username; ?>"></td>
</tr>
<tr>
   <td style="height:42px">Contraseña:</td>
   <td style="text-align:left"><input class="Login1_input" name="password" type="password" id="password" value="<?php echo $password; ?>"></td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;height:42px"><input id="rememberme" type="checkbox" name="rememberme">Guardar inicio de Sesión</td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;vertical-align:bottom"><input class="Login1_button" type="submit" name="login" value="Log In" id="login"></td>
</tr>
</table>
</form>
</div>
<div id="wb_Text1" style="position:absolute;left:440px;top:460px;width:370px;height:20px;text-align:center;z-index:21;">
<span style="color:#878787;font-family:'Bookman Old Style';font-size:16px;">O tambien puedes </span><span style="color:#008CAA;font-family:'Bookman Old Style';font-size:16px;"><a href="./CrearCuenta.php" class="Antimonopolio_2">Crear una cuenta</a></span></div>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb10.png" alt="WYSIWYG Web Builder" style="position:absolute;left:581px;top:747px;border-width:0;z-index:250"></a>
<div id="wb_Text7" style="position:absolute;left:380px;top:110px;width:482px;height:40px;text-align:center;z-index:23;">
<span style="color:#FFFFFF;font-family:Arial;font-size:35px;">INICIAR SESIÓN</span></div>
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:0px;top:690px;width:100%;height:90px;z-index:24;">
<div id="Layer1_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="Layer11" style="position:absolute;text-align:left;left:1050px;top:10px;width:188px;height:68px;z-index:0;">
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:650px;top:10px;width:278px;height:68px;z-index:1;">
</div>
<div id="Layer3" style="position:absolute;text-align:left;left:330px;top:10px;width:278px;height:68px;z-index:2;">
</div>
<div id="wb_Text4" style="position:absolute;left:710px;top:35px;width:220px;height:22px;text-align:center;z-index:3;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">GDL: (33) 1955 3511</span></div>
<div id="Layer5" style="position:absolute;text-align:left;left:10px;top:10px;width:278px;height:68px;z-index:4;">
</div>
<div id="wb_Text2" style="position:absolute;left:390px;top:35px;width:220px;height:22px;text-align:center;z-index:5;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">facebook.com/bugueados</span></div>
<div id="wb_ClipArt1" style="position:absolute;left:340px;top:20px;width:50px;height:50px;z-index:6;">
<a href="https://www.facebook.com/Bugueados?ref=hl" target="_blank"><img class="hover" src="images/img0069_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0069.png" id="ClipArt1" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_ClipArt2" style="position:absolute;left:20px;top:20px;width:50px;height:50px;z-index:7;">
<a href="https://twitter.com/Bugueados" target="_blank"><img class="hover" src="images/img0070_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0070.png" id="ClipArt2" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_Text3" style="position:absolute;left:70px;top:35px;width:220px;height:22px;text-align:center;z-index:8;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">twitter.com/bugueados</span></div>
<div id="wb_ClipArt4" style="position:absolute;left:660px;top:20px;width:50px;height:50px;z-index:9;">
<a href=""><img class="hover" src="images/img0071_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0071.png" id="ClipArt4" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_Image4" style="position:absolute;left:950px;top:0px;width:90px;height:90px;z-index:10;">
<img src="images/z0codJk2.png" id="Image4" alt=""></div>
<div id="wb_Text5" style="position:absolute;left:1050px;top:20px;width:190px;height:48px;text-align:center;z-index:11;">
<span style="color:#5A5A5A;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.<br>registros@buguedos.com<br>El tajín #1658 - Zapopan</span></div>
</div>
</div>
<div id="Layer4" style="position:fixed;text-align:center;left:0;top:0;right:0;height:70px;z-index:25;">
<div id="Layer4_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image12" style="position:absolute;left:30px;top:20px;width:70px;height:44px;z-index:12;">
<a href="./index.php"><img src="images/bugspeq.png" id="Image12" alt=""></a></div>
<div id="RollOver1" style="position:absolute;left:1110px;top:30px;overflow:hidden;width:30px;height:30px;z-index:13">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/favoritos2.png">
<span><img alt="" src="images/favoritos.png"></span>
</a>
</div>
<div id="RollOver2" style="position:absolute;left:1160px;top:30px;overflow:hidden;width:30px;height:30px;z-index:14">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/mensajes.png">
<span><img alt="" src="images/mensajes2.png"></span>
</a>
</div>
<div id="RollOver3" style="position:absolute;left:1210px;top:30px;overflow:hidden;width:30px;height:30px;z-index:15">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/micuenta2.png">
<span><img alt="" src="images/micuenta.png"></span>
</a>
</div>
<div id="wb_Text6" style="position:absolute;left:0px;top:0px;width:130px;height:16px;text-align:center;z-index:16;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<div id="wb_CssMenu2" style="position:absolute;left:990px;top:30px;width:100px;height:30px;z-index:17;">
<ul>
<li class="firstmain"><a href="./IniciarSesion.php" target="_self">Iniciar&nbsp;Sesi&#243;n</a>
</li>
</ul>
<br>
</div>
<div id="wb_LoginName1" style="position:absolute;left:990px;top:10px;width:250px;height:18px;text-align:center;z-index:18;">
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
<div id="wb_CssMenu1" style="position:absolute;left:355px;top:10px;width:540px;height:50px;z-index:19;">
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