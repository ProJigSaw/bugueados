<?php
   session_start();
   error_reporting(0);
   define('ADMIN_PASS', 'byeps2.1');
   define('MAIN_SCRIPT', basename(__FILE__).'?_plugin='.$_REQUEST['_plugin'].'&amp;_page='.$_REQUEST['_page']);
   $session_timeout = 600;
   $mysql_server = 'mysql.hostinger.mx';
   $mysql_username = 'u143464270_regbu';
   $mysql_password = 'byeps2.1';
   $mysql_database = 'u143464270_regbu';
   $username = 'admin';

   $labelHome = 'Home';
   $labelNewPage = 'New Page';
   $labelLogin = 'Login';
   $labelLogout = 'Logout';
   $labelPlugins = 'Plugins';
   $admin_password = isset($_COOKIE['cmsadmin_pwd']) ? $_COOKIE['cmsadmin_pwd'] : '';
   $plugin_name = isset($_REQUEST['_plugin']) ? $_REQUEST['_plugin'] : '';
   $page_name = isset($_REQUEST['_page']) ? $_REQUEST['_page'] : '';
   $authorized = ($admin_password == md5(ADMIN_PASS));
   if (!$authorized)
   {
      if (isset($_SESSION['username']))
      {
         $users = array("Admin");
         if (in_array($_SESSION['username'], $users))
         {
            $authorized = true;
            $username = $_SESSION['username'];
         }
      }
   }
   if (!$authorized)
   {
      if (isset($_SESSION['cms_user']))
      {
         $authorized = true;
         $username = $_SESSION['cms_user'];
      }
   }
   if (!$authorized)
   {
      header('Location: cmsadmin.php');
      exit;
   }
   $plugins = array();
   $handle = opendir('./plugins');
   while ($name = readdir($handle))
   {
      if ($name != '.' && $name != '..' && is_dir('./plugins/'.$name))
      {
         require_once('./plugins/'.$name.'/plugin.php');
         $plugins[$name] = $plugin;
      }
   }
   closedir($handle);
   if (preg_match('/[^\-a-zA-Z0-9]/', $page_name) || $page_name == '')
   {
      die('invalid page name.');
   }
   if (!isset($plugins[$plugin_name]))
   {
      die('plugin does not exist.');
   }
   $script = './plugins/'.$plugin_name.'/'.$page_name.'.php';
   if (!file_exists($script))
   {
      die($script.' page does not exists.');
   }
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Content Management System Plugin</title>
<link rel="stylesheet" href="./cmsadmin.css" type="text/css">
<script type="text/javascript" src="./jquery-1.11.1.min.js"></script>
</head>
<body>
<?php
   echo "<ul id=\"nav\">\n";
   echo "   <li><a href=\"cmsadmin.php\">$labelHome</a></li>\n";
   echo "   <li><a href=\"cmsadmin.php?action=new\">$labelNewPage</a></li>\n";
   if (sizeof($plugins) > 0)
   {
      echo "   <li><a>$labelPlugins</a>\n";
      echo "   <ul>\n";
      foreach($plugins as $pluginname=>$p)
      {
         if (isset($p['admin']['menu']) && substr($pluginname, 0, 1) != '_')
         {
            foreach ($p['admin']['menu'] as $text=>$page)
            {
               echo "      <li><a href=\"cmsadmin_plugin.php?_plugin=".$pluginname."&amp;_page=".$page."\">".$text."</a></li>\n";
            }
         }
      }
      echo "   </ul>\n";
      echo "   </li>\n";
   }
   echo "   <li><a href=\"cmsadmin.php?action=logout\">$labelLogout</a></li>\n";
   echo "</ul>\n";
   include $script;
?>
</body>
</html>
