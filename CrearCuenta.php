<?php
if (session_id() == "")
{
   session_start();
}
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
      $sql = "INSERT `".$mysql_table."` (`username`, `password`, `fullname`, `email`, `active`, `code`) VALUES ('$newusername', '$crypt_pass', '$newfullname', '$newemail', 0, '$code')";
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<meta name="generator" content="WYSIWYG Web Builder 10 - http://www.wysiwygwebbuilder.com">
<link href="Antimonopolio.css" rel="stylesheet">
<link href="CrearCuenta.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Signup1" style="position:absolute;left:384px;top:170px;width:482px;height:432px;z-index:9;">
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
   <td colspan="2"><?php echo $error_message; ?></td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;vertical-align:bottom"><input class="Signup1_button" type="submit" name="signup" value="Crear Usuario" id="signup"></td>
</tr>
</table>
</form>
</div>
<div id="wb_Text1" style="position:absolute;left:440px;top:500px;width:370px;height:40px;text-align:center;z-index:10;">
<span style="color:#878787;font-family:'Bookman Old Style';font-size:16px;">Al crear tu cuenta aceptas los </span><span style="color:#008CAA;font-family:'Bookman Old Style';font-size:16px;">terminos y condiciones</span><span style="color:#878787;font-family:'Bookman Old Style';font-size:16px;"> de Bugueados S.A. de C.V.</span></div>
</div>
<div id="Layer5" style="position:absolute;text-align:center;left:0px;top:670px;width:100%;height:350px;z-index:11;">
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
<div id="Layer2" style="position:absolute;text-align:center;left:0px;top:50px;width:100%;height:5px;z-index:12;">
<div id="Layer2_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
</div>
</div>
<div id="Layer4" style="position:fixed;text-align:center;left:0;top:0;right:0;height:50px;z-index:13;">
<div id="Layer4_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_CssMenu2" style="position:absolute;left:483px;top:0px;width:285px;height:50px;z-index:5;">
<ul>
<li class="firstmain"><a href="./Mi_cuenta.php" target="_self">Mi&nbsp;cuenta</a>
</li>
</ul>
<br>
</div>
<div id="wb_Image12" style="position:absolute;left:10px;top:10px;width:50px;height:32px;filter:alpha(opacity=90);-moz-opacity:0.90;opacity:0.90;z-index:6;">
<img src="images/img0016.png" id="Image12" alt=""></div>
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