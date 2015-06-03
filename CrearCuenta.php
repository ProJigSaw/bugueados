<?php
$mysql_server = 'mysql.hostinger.mx';
$mysql_username = 'u143464270_regbu';
$mysql_password = 'byeps2.1';
$mysql_database = 'u143464270_regbu';
$mysql_table = 'regbu';
$success_page = './Mi_cuenta.php';
$activated_page = './Exito.php';
$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'signupform')
{
   $newusername = $_POST['username'];
   $newemail = $_POST['email'];
   $newpassword = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $newfullname = $_POST['fullname'];
   $Soy_empresa_o_Particular = $_POST['Soy_empresa_o_Particular'];
   $website = $_SERVER['HTTP_HOST'];
   $script = $_SERVER['SCRIPT_NAME'];
   $timestamp = time();
   $code = md5($website.$timestamp.rand(100000, 999999));
   if ($newpassword != $confirmpassword)
   {
      $error_message = 'Password and Confirm Password are not the same!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9_!@$]{1,50}$/", $newusername))
   {
      $error_message = 'El nombre de usuario es invalido - Intentar nuevamente porfavor.';
   }
   else
   if (!preg_match("/^[A-Za-z0-9_!@$]{1,50}$/", $newpassword))
   {
      $error_message = 'La contraseña es invalida - Intentar nuevamente porfavor.';
   }
   else
   if (!preg_match("/^[A-Za-z0-9_!@$.' &]{1,50}$/", $newfullname))
   {
      $error_message = 'El nombre es invalido - Intentar nuevamente porfavor.';
   }
   else
   if (!preg_match("/^.+@.+\..+$/", $newemail))
   {
      $error_message = 'El correo no es correcto - Intentar nuevamente porfavor.';
   }
   if (empty($error_message))
   {
      $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
      if (!$db)
      {
         die('Failed to connect to database server!<br>'.mysqli_error($db));
      }
      mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
      $sql = "SELECT username FROM ".$mysql_table." WHERE username = '".$newusername."'";
      $result = mysqli_query($db, $sql);
      if ($data = mysqli_fetch_array($result))
      {
         $error_message = 'El usuario ya existe -  - Intentar nuevamente porfavor.';
      }
   }
   if (empty($error_message))
   {
      $crypt_pass = md5($newpassword);
      $newusername = mysqli_real_escape_string($db, $newusername);
      $newemail = mysqli_real_escape_string($db, $newemail);
      $newfullname = mysqli_real_escape_string($db, $newfullname);
      $Soy_empresa_o_Particular = mysqli_real_escape_string($db, $Soy_empresa_o_Particular);
      $sql = "INSERT `".$mysql_table."` (`username`, `password`, `fullname`, `email`, `active`, `code`, `extra1`) VALUES ('$newusername', '$crypt_pass', '$newfullname', '$newemail', 0, '$code', '$Soy_empresa_o_Particular')";
      $result = mysqli_query($db, $sql);
      mysqli_close($db);
      $subject = 'Felicidades! ';
      $message = 'Has creado una nueva cuenta';
      $message .= "\r\nUsername: ";
      $message .= $newusername;
      $message .= "\r\nPassword: ";
      $message .= $newpassword;
      $message .= "\r\n";
      $message .= "\r\nhttp://".$website.$script."?user=".$newusername."&code=$code";
      $header  = "From: registros@bugueados.com"."\r\n";
      $header .= "Reply-To: registros@bugueados.com"."\r\n";
      $header .= "MIME-Version: 1.0"."\r\n";
      $header .= "Content-Type: text/plain; charset=utf-8"."\r\n";
      $header .= "Content-Transfer-Encoding: 8bit"."\r\n";
      $header .= "X-Mailer: PHP v".phpversion();
      mail($newemail, $subject, $message, $header);
      header('Location: '.$success_page);
      exit;
   }
}
else
if (isset($_GET['code']) && isset($_GET['user']))
{
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
   $sql = "SELECT * FROM ".$mysql_table." WHERE username = '".$_GET['user']."' AND code = '".$_GET['code']."'";
   $result = mysqli_query($db, $sql);
   if ($data = mysqli_fetch_array($result))
   {
      $sql = "UPDATE `".$mysql_table."` SET `active` = 1 WHERE `username` = '".$_GET['user']."'";
      mysqli_query($db, $sql);
   }
   else
   {
      die ('User not found!');
   }
   mysqli_close($db);
   header("refresh:5;url=".$activated_page);
   echo 'Your user account was succesfully activated. You\'ll be redirected in about 5 secs. If not, click <a href="'.$activated_page.'">here</a>.';
   exit;
}
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
<link href="CrearCuenta.css" rel="stylesheet">
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
<div id="wb_Signup1" style="position:absolute;left:380px;top:190px;width:482px;height:484px;z-index:20;">
<form name="signupform" method="post" action="<?php echo basename(__FILE__); ?>" id="signupform">
<input type="hidden" name="form_name" value="signupform">
<table id="Signup1">
<tr>
   <td class="Signup1_header" colspan="2" style="height:22px;">Crear cuenta - Bugueados</td>
</tr>
<tr>
   <td style="height:42px">Nombre completo:</td>
   <td style="text-align:left"><input class="Signup1_input" name="fullname" type="text" id="fullname"></td>
</tr>
<tr>
   <td style="height:42px">Usuario</td>
   <td style="text-align:left"><input class="Signup1_input" name="username" type="text" id="username"></td>
</tr>
<tr>
   <td style="height:42px;">Contraseña:</td>
   <td style="text-align:left"><input class="Signup1_input" name="password" type="password" id="password"></td>
</tr>
<tr>
   <td style="height:42px">Confirmar Contraseña:</td>
   <td style="text-align:left"><input class="Signup1_input" name="confirmpassword" type="password" id="confirmpassword"></td>
</tr>
<tr>
   <td style="height:42px">E-mail:</td>
   <td style="text-align:left"><input class="Signup1_input" name="email" type="text" id="email"></td>
</tr>
<tr>
   <td style="height:42px">Soy empresa o Particular</td>
   <td style="text-align:left">
   <select class="Signup1_input" name="Soy_empresa_o_Particular" id="Soy_empresa_o_Particular" style="width:202px;height:42px;">
      <option value="Si">Si</option>
      <option value="No">No</option>
   </select>
</td>
</tr>
<tr>
   <td colspan="2"><?php echo $error_message; ?></td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;vertical-align:bottom"><input class="Signup1_button" type="submit" name="signup" value="Crear Usuario" id="signup"></td>
</tr>
</table>
</form>
</div>
<div id="wb_Text1" style="position:absolute;left:440px;top:570px;width:370px;height:40px;text-align:center;z-index:21;">
<span style="color:#878787;font-family:'Bookman Old Style';font-size:16px;">Al crear tu cuenta aceptas los </span><span style="color:#008CAA;font-family:'Bookman Old Style';font-size:16px;">terminos y condiciones</span><span style="color:#878787;font-family:'Bookman Old Style';font-size:16px;"> de Bugueados S.A. de C.V.</span></div>
<div id="wb_Text6" style="position:absolute;left:380px;top:110px;width:482px;height:40px;text-align:center;z-index:22;">
<span style="color:#FFFFFF;font-family:Arial;font-size:35px;">CREAR CUENTA</span></div>
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:0px;top:690px;width:100%;height:90px;z-index:23;">
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
<a href="https://www.facebook.com/Bugueados?ref=hl" target="_blank"><img class="hover" src="images/img0002_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0002.png" id="ClipArt1" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_ClipArt2" style="position:absolute;left:20px;top:20px;width:50px;height:50px;z-index:7;">
<a href="https://twitter.com/Bugueados" target="_blank"><img class="hover" src="images/img0013_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0013.png" id="ClipArt2" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_Text3" style="position:absolute;left:70px;top:35px;width:220px;height:22px;text-align:center;z-index:8;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">twitter.com/bugueados</span></div>
<div id="wb_ClipArt4" style="position:absolute;left:660px;top:20px;width:50px;height:50px;z-index:9;">
<a href=""><img class="hover" src="images/img0014_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0014.png" id="ClipArt4" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_Image4" style="position:absolute;left:950px;top:0px;width:90px;height:90px;z-index:10;">
<img src="images/z0codJk2.png" id="Image4" alt=""></div>
<div id="wb_Text5" style="position:absolute;left:1050px;top:20px;width:190px;height:48px;text-align:center;z-index:11;">
<span style="color:#5A5A5A;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.<br>registros@buguedos.com<br>El tajín #1658 - Zapopan</span></div>
</div>
</div>
<div id="Layer4" style="position:fixed;text-align:center;left:0;top:0;right:0;height:70px;z-index:24;">
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
<div id="wb_Text7" style="position:absolute;left:0px;top:0px;width:130px;height:16px;text-align:center;z-index:16;">
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