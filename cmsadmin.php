<?php
   session_start();
   error_reporting(0);
   define('ADMIN_PASS', 'byeps2.1');
   define('MAIN_SCRIPT', basename(__FILE__));
   $session_timeout = 600;
   $mysql_server = 'mysql.hostinger.mx';
   $mysql_username = 'u143464270_regbu';
   $mysql_password = 'byeps2.1';
   $mysql_database = 'u143464270_regbu';
   $username = 'admin';

   $labelHome = 'Home';
   $labelName = 'Name';
   $labelCreatedBy = 'Created by';
   $labelLastUpdate = 'Last update';
   $labelVisible = 'Visible';
   $labelHomePage = 'Home page';
   $labelViews = 'Views';
   $labelOrder = 'Order';
   $labelContent = 'Content';
   $labelURL = 'External URL';
   $labelExtraData = 'Extra data';
   $labelTitle = 'Title';
   $labelDescription = 'Description';
   $labelKeywords = 'Keywords';
   $labelAction = 'Action';
   $labelNewPage = 'New Page';
   $labelCaption = 'Content Management System';
   $labelLogin = 'Login';
   $labelLogout = 'Logout';
   $labelEdit = 'Edit';
   $labelCopy = 'Copy';
   $labelDelete = 'Delete';
   $labelYes = 'Yes';
   $labelNo = 'No';
   $labelSave = 'Save';
   $labelCancel = 'Cancel';
   $labelUp = 'Up';
   $labelDown = 'Down';
   $labelOwner = 'Owner';
   $labelPlugins = 'Plugins';
   $labelUserName = 'Username:';
   $labelPassword = 'Password:';
   $admin_password = isset($_COOKIE['cmsadmin_pwd']) ? $_COOKIE['cmsadmin_pwd'] : '';

   if (empty($admin_password))
   {
      if (isset($_POST['admin_password']))
      {
         $admin_password = md5($_POST['admin_password']);
         if ($admin_password == md5(ADMIN_PASS))
         {
            setcookie('cmsadmin_pwd', $admin_password, time() + $session_timeout);
         }
      }
   }
   else
   if ($admin_password == md5(ADMIN_PASS))
   {
      setcookie('cmsadmin_pwd', $admin_password, time() + $session_timeout);
   }
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
   $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
   $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
   $name = isset($_POST['name']) ? $_POST['name'] : '';
   $content = isset($_POST['content']) ? $_POST['content'] : '';
   $url = isset($_POST['url']) ? $_POST['url'] : '';
   $extra_data = isset($_POST['extra_data']) ? $_POST['extra_data'] : '';
   $title = isset($_POST['title']) ? $_POST['title'] : '';
   $description = isset($_POST['description']) ? $_POST['description'] : '';
   $keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';
   $created_by = isset($_POST['created_by']) ? $_POST['created_by'] : '';
   $visible = isset($_POST['visible']) ? $_POST['visible'] : 0;
   $timestamp = date("y-m-d H:i:s", time());

   $plugins = array();
   if (file_exists('./plugins/'))
   {
      $handle = opendir('./plugins/');
      while ($item = readdir($handle))
      {
         if ($item != "." && $item != ".." && is_dir('./plugins/'.$item) && substr($item, 0, 1) != '_')
         {
            require_once('./plugins/'.$item.'/plugin.php');
            $plugins[$item] = $plugin;
         }
      }
      closedir($handle);
   }
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
   if ($action == 'login')
   {
      if (!$authorized && function_exists('usermanager_login'))
      {
         usermanager_login();
      }
      $action = '';
   }
   if ($authorized)
   {
      if (get_magic_quotes_gpc())
      {
         $content = stripslashes($content);
         $url = stripslashes($url);
         $name = stripslashes($name);
         $extra_data = stripslashes($extra_data);
         $title = stripslashes($title);
         $description = stripslashes($description);
         $keywords = stripslashes($keywords);
         $created_by = stripslashes($created_by);
      }
      $content = mysqli_real_escape_string($db, $content);
      $url = mysqli_real_escape_string($db, $url);
      $name = mysqli_real_escape_string($db, $name);
      $extra_data = mysqli_real_escape_string($db, $extra_data);
      $title = mysqli_real_escape_string($db, $title);
      $description = mysqli_real_escape_string($description);
      $keywords = mysqli_real_escape_string($db, $keywords);
      $created_by = mysqli_real_escape_string($db, $created_by);
      $sql = "CREATE TABLE IF NOT EXISTS CMS_PAGES (id INT UNSIGNED NOT NULL AUTO_INCREMENT,
              category_id INT NOT NULL, 
              name VARCHAR(255) NOT NULL, 
              content TEXT NOT NULL, 
              home tinyint(1) NOT NULL, 
              visible tinyint(1) NOT NULL, 
              create_date TIMESTAMP NOT NULL, 
              created_by VARCHAR(255) NOT NULL, 
              last_update_date TIMESTAMP NOT NULL, 
              last_update_by VARCHAR(255) NOT NULL, 
              views INT NOT NULL, 
              menu_index INT NOT NULL, 
              url VARCHAR(255), 
              extra_data VARCHAR(255), 
              title VARCHAR(100), 
              description VARCHAR(255), 
              keywords VARCHAR(255), 
              seo_friendly_url VARCHAR(100), 
              PRIMARY KEY(id));";
      $result = mysqli_query($db, $sql);
      if (!$result)
      {
         die('Invalid query: ' . mysqli_error($db));
      }
      $sql = "CREATE TABLE IF NOT EXISTS CMS_SEARCH_WORDS (id INT UNSIGNED NOT NULL AUTO_INCREMENT,
              word VARCHAR(50) NOT NULL,
              PRIMARY KEY (id));";
      $result = mysqli_query($db, $sql);
      if (!$result)
      {
         die('Invalid query: ' . mysqli_error($db));
      }
      $sql = "CREATE TABLE IF NOT EXISTS CMS_SEARCH_WORDMATCH (page_id INT UNSIGNED NOT NULL,
              word_id INT UNSIGNED NOT NULL,
              PRIMARY KEY(page_id, word_id));";
      $result = mysqli_query($db, $sql);
      if (!$result)
      {
         die('Invalid query: ' . mysqli_error($db));
      }
      $upgrade = true;
      $result = mysqli_query($db, "show columns from CMS_PAGES");
      while ($data = mysqli_fetch_assoc($result))
      {
         if ($data['Field'] == 'keywords')
         {
            $upgrade = false;
            break;
         }
      }
      if ($upgrade)
      {
         $sql = "ALTER TABLE CMS_PAGES ADD (title varchar(100),
                                            description varchar(255),
                                            keywords varchar(255),
                                            seo_friendly_url varchar(100));";
         $result = mysqli_query($db, $sql);
         if (!$result)
         {
            die('Invalid query: ' . mysqli_error($db));
         }
      }
      foreach($plugins as $pluginname=>$p)
      {
         if (isset($p['admin']['init']))
         {
            $fn_init = $p['admin']['init']['function'];
            $fn_init();
         }
      }
      if (!empty($action))
      {
         if ($action == 'delete')
         {
            $menu_index = 0;
            $sql = "SELECT * FROM CMS_PAGES WHERE `id` = '$id'";
            $result = mysqli_query($db, $sql);
            if ($data = mysqli_fetch_array($result))
            {
               $menu_index = $data['menu_index'];
            }
            $sql = "DELETE FROM CMS_PAGES WHERE `id` = '$id'";
            mysqli_query($db, $sql);
            $sql = "DELETE FROM CMS_SEARCH_WORDMATCH WHERE `page_id` = '$id'";
            mysqli_query($db, $sql);
            $sql = "UPDATE CMS_PAGES SET menu_index=menu_index-1 WHERE menu_index > '$menu_index'";
            mysqli_query($db, $sql);
            mysqli_close($db);
            header('Location: '.basename(__FILE__));
            exit;
         }
         else
         if ($action == 'update')
         {
            $seo_friendly_url = strtolower($title);
            $seo_friendly_url = preg_replace("/[^a-z0-9_\s-]/", "", $seo_friendly_url);
            $seo_friendly_url = preg_replace("/[\s-]+/", " ", $seo_friendly_url);
            $seo_friendly_url = preg_replace("/[\s_]/", "-", $seo_friendly_url);
            $sql = "UPDATE CMS_PAGES SET `name` = '$name', `content` = '$content', `url` = '$url', `extra_data` = '$extra_data', `title` = '$title', `description` = '$description', `keywords` = '$keywords', `seo_friendly_url` = '$seo_friendly_url', `visible` = $visible, `last_update_date` = '$timestamp', ";
            if ($username == 'admin' && $created_by != '')
            {
               $sql .= "`created_by` = '$created_by', ";
            }
            $sql .= "`last_update_by` = '$username' WHERE `id` = '$id'";
            mysqli_query($db, $sql);
            addToSearchIndex($db, $id, $content);
            foreach($plugins as $pluginname=>$p)
            {
               if (isset($p['admin']['update']))
               {
                  $fn_update = $p['admin']['update']['function'];
                  $fn_update($id);
               }
            }
            mysqli_close($db);
            header('Location: '.basename(__FILE__));
            exit;
         }
         else
         if ($action == 'create')
         {
            if ($username != 'admin' || $created_by == '')
            {
               $created_by = $username;
            }
            $sql = "SELECT * FROM CMS_PAGES";
            $result = mysqli_query($db, $sql);
            $menu_index = mysqli_num_rows($result);
            $menu_index = $menu_index + 1;
            $sql = "INSERT CMS_PAGES (`category_id`, `name`, `content`, `url`, `extra_data`, `title`, `description`, `keywords`, `visible`, `home`, `create_date`, `created_by`, `last_update_date`, `last_update_by`, `menu_index`) VALUES (0, '$name', '$content', '$url', '$extra_data', '$title', '$description', '$keywords', $visible, 0, '$timestamp', '$created_by', '$timestamp', '$username', $menu_index)";
            mysqli_query($db, $sql);
            $id = mysqli_insert_id($db);
            addToSearchIndex($db, $id, $content);
            foreach($plugins as $pluginname=>$p)
            {
               if (isset($p['admin']['update']))
               {
                  $fn_update = $p['admin']['update']['function'];
                  $fn_update($id);
               }
            }
            mysqli_close($db);
            header('Location: '.basename(__FILE__));
            exit;
         }
         else
         if ($action == 'home')
         {
            $sql = "UPDATE CMS_PAGES SET `home` = 0";
            mysqli_query($db, $sql);
            $sql = "UPDATE CMS_PAGES SET `home` = 1 WHERE `id` = '$id'";
            mysqli_query($db, $sql);
            mysqli_close($db);
            header('Location: '.basename(__FILE__));
            exit;
         }
         else
         if ($action == 'moveup' || $action == 'movedown')
         {
            $menu_index = 0;
            $sql = "SELECT * FROM CMS_PAGES WHERE `id` = '$id'";
            $result = mysqli_query($db, $sql);
            if ($data = mysqli_fetch_array($result))
            {
               $menu_index = $data['menu_index'];
            }
            if ($action == 'moveup')
               $new_index = $menu_index - 1;
            else
               $new_index = $menu_index + 1;
            $sql = "UPDATE CMS_PAGES SET menu_index = $menu_index WHERE menu_index = '$new_index'";
            mysqli_query($db, $sql);
            $sql = "UPDATE CMS_PAGES SET menu_index = $new_index WHERE id = '$id'";
            mysqli_query($db, $sql);
            mysqli_close($db);
            header('Location: '.basename(__FILE__));
            exit;
         }
         else
         if ($action == 'logout')
         {
            session_unset();
            session_destroy();
            setcookie('cmsadmin_pwd', '', time() - 3600);
            header('Location: '.basename(__FILE__));
            exit;
         }
         else
         {
            if (isset($_REQUEST['plugin']))
            {
               require('./plugins/'.$_REQUEST['plugin'].'/'.$action.'.php');
               exit;
            }
         }
      }
   }
   function addToSearchIndex($db, $page_id, $content)
   {
      $sql = "DELETE FROM CMS_SEARCH_WORDMATCH WHERE page_id = '$page_id'";
      mysqli_query($db, $sql);
      $content = strtolower(html_entity_decode($content));
      $content = preg_replace('/&#?\w+;/', ' ', $content);
      if (!get_magic_quotes_runtime())
         $content = addslashes($content);
      $content = preg_replace('/\s+/', ' ', $content);
      $content = strip_tags($content);
      $content = preg_replace('/\W+/', ' ', $content);
      $words = preg_split('/\s+/', trim($content));
      $id_array = array();
      $index = 0;
      foreach ($words as $word)
      {
         if (strlen($word) < 2) continue;
         if (is_numeric($word)) continue;
         $sql = "SELECT id FROM CMS_SEARCH_WORDS WHERE word = '$word';";
         $result = mysqli_query($db, $sql);
         if (!$result)
         {
            die('Invalid query: ' . mysqli_error($db));
         }
         $record = mysql_fetch_object($result);
         if (!$record || !$word_id = $record->id)
         {
            $sql = "INSERT INTO CMS_SEARCH_WORDS (word) VALUES ('$word');";
            mysqli_query($db, $sql);
            $word_id = mysqli_insert_id($db);
         }
         $id_array[$index] = $word_id;
         $index++;
      }
      foreach ($id_array as $word_id)
      {
         $sql = "INSERT INTO CMS_SEARCH_WORDMATCH (`word_id`, `page_id`) VALUES ('$word_id', '$page_id');";
         mysqli_query($db, $sql);
      }
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Content Management System Administrator</title>
<link rel="stylesheet" href="./cmsadmin.css" type="text/css">
<script type="text/javascript" src="./jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="./ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
   $('#editor').ckeditor({});
   $('ul.tabs').each(function()
   {
      var $active, $content, $links = $(this).find('a');
      $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
      $active.addClass('active');
      $content = $($active.attr('href'));
      $links.not($active).each(function ()
      {
         $($(this).attr('href')).hide();
      });
      $(this).on('click', 'a', function(e)
      {
         $active.removeClass('active');
         $content.hide();
         $active = $(this);
         $content = $($(this).attr('href'));
         $active.addClass('active');
         $content.show();
         e.preventDefault();
      });
   });
});
</script>
</head>
<body>
<?php

   if (!$authorized)
   {
      echo "<table width=\"100%\" border=\"0\">\n";
      echo "<tr><td colspan=\"2\" align=\"center\">$labelCaption<br>&nbsp;</td></tr>\n";
      echo "<form method=\"post\" action=\"" .basename(__FILE__) . "\">\n";
      echo "<tr><td width=\"50%\" align=\"right\">$labelUserName&nbsp;&nbsp;</td><td width=\"50%\"><input type=\"text\" name=\"admin_username\" size=\"20\"></td></tr>\n";
      echo "<tr><td align=\"right\">$labelPassword&nbsp;&nbsp;</td><td><input type=\"password\" name=\"admin_password\" size=\"20\"></td></tr>\n";
      echo "<tr><td>&nbsp;</td><td align=\"left\"><input type=\"submit\" value=\"$labelLogin\" name=\"submit\"></td></tr>\n";
      echo "<input type=\"hidden\" name=\"action\" value=\"login\">\n";
      echo "</form>\n";
      echo "</tr></td></table>\n";
   }
   else
   {
      echo "<ul id=\"nav\">\n";
      echo "   <li><a href=\"" . basename(__FILE__) . "\">$labelHome</a></li>\n";
      echo "   <li><a href=\"" . basename(__FILE__) . "?action=new\">$labelNewPage</a></li>\n";
      if (sizeof($plugins) > 0)
      {
         echo "   <li><a>$labelPlugins</a>\n";
         echo "   <ul>\n";
         foreach($plugins as $pluginname=>$p)
         {
            if (isset($p['admin']['menu']))
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
      echo "   <li><a href=\"" . basename(__FILE__) . "?action=logout\">$labelLogout</a></li>\n";
      echo "</ul>\n";
      if (!empty($action))
      {
         if ($action == 'edit' || $action == 'new' || $action == 'copy')
         {
            $sql = "SELECT * FROM CMS_PAGES WHERE id = '".$id."'";
            $result = mysqli_query($db, $sql);
            $name_value = '';
            $content_value = '';
            $visible_value = '';
            $url_value = '';
            $extra_data_value = '';
            $title_value = '';
            $description_value = '';
            $keywords_value = '';
            $created_by_value = '';
            if ($data = mysqli_fetch_array($result))
            {
               $name_value = htmlspecialchars($data['name']);
               $content_value = $data['content'];
               $visible_value = $data['visible'];
               $url_value = htmlspecialchars($data['url']);
               $extra_data_value = htmlspecialchars($data['extra_data']);
               $title_value = htmlspecialchars($data['title']);
               $description_value = htmlspecialchars($data['description']);
               $keywords_value = htmlspecialchars($data['keywords']);
               $created_by_value = htmlspecialchars($data['created_by']);
            }
            $extra_tabs = array();
            foreach($plugins as $pluginname=>$p)
            {
               if (isset($p['admin']['tab']))
               {
                  $extra_tabs[$p['admin']['tab']['name']] = $p['admin']['tab']['function'];
               }
            }
            echo "<ul class=\"tabs\">\n";
            echo "<li><a href=\"#tab-general\">General</a></li>\n";
            foreach($extra_tabs as $name=>$fn)
            {
               echo "<li><a href=\"#tab-".preg_replace('/[^a-z0-9A-Z]/', '', $name)."\">".htmlspecialchars($name)."</a></li>\n";
            }
            echo "</ul>\n";
            echo "<form action=\"" . basename(__FILE__) . "\" method=\"post\">\n";
            echo "<div class=\"tab\" id=\"tab-general\">\n";
            if ($action == 'new' || $action == 'copy')
            {
               echo "<input type=\"hidden\" name=\"action\" value=\"create\">\n";
            }
            else
            {
               echo "<input type=\"hidden\" name=\"action\" value=\"update\">\n";
            }
            echo "<input type=\"hidden\" name=\"id\" value=\"". $id . "\">\n";
            echo "<table width=\"100%\" border=\"0\">\n";
            echo "<tr><td style=\"width:10%;white-space:nowrap;\">$labelName:</td>\n";
            echo "<td><input type=\"text\" style=\"width:100%;\" name=\"name\" value=\"" . $name_value . "\"></td></tr>\n";
            echo "<tr><td>$labelContent:</td>\n";
            echo "<td><textarea id=\"editor\" style=\"width:100%;height:200px\" name=\"content\">" . $content_value . "</textarea></td></tr>\n";
            echo "<tr><td>$labelURL:</td>\n";
            echo "<td><input type=\"text\" style=\"width:100%;\" name=\"url\" value=\"" . $url_value . "\"></td></tr>\n";
            echo "<tr><td>$labelExtraData:</td>\n";
            echo "<td><input type=\"text\" style=\"width:100%;\" name=\"extra_data\" value=\"" . $extra_data_value . "\"></td></tr>\n";
            echo "<tr><td>$labelTitle:</td>\n";
            echo "<td><input type=\"text\" style=\"width:100%;\" name=\"title\" value=\"" . $title_value . "\"></td></tr>\n";
            echo "<tr><td>$labelDescription:</td>\n";
            echo "<td><input type=\"text\" style=\"width:100%;\" name=\"description\" value=\"" . $description_value . "\"></td></tr>\n";
            echo "<tr><td>$labelKeywords:</td>\n";
            echo "<td><input type=\"text\" style=\"width:98%;\" name=\"keywords\" value=\"" . $keywords_value . "\"></td></tr>\n";
            echo "<tr><td>$labelVisible:</td>\n";
            echo "<td><select name=\"visible\" size=\"1\"><option " . ($visible_value == "0" ? "selected " : "") . "value=\"0\">Hidden</option><option " . ($visible_value != "0" ? "selected " : "") . "value=\"1\">Visible</option></select></td></tr>\n";
            if ($username == 'admin')
            {
               echo "<tr><td>$labelOwner:</td><td><input type=\"text\" style=\"width:100%;\" name=\"created_by\" value=\"" . $created_by_value . "\"></td></tr>\n";
            }
            echo "</table>\n";
            echo "</div>\n";
            foreach($extra_tabs as $name=>$fn)
            {
               echo "<div class=\"tab\" id=\"tab-".preg_replace('/[^a-z0-9A-Z]/', '', $name)."\">\n";
               echo $fn();
               echo "</div>\n";
            }
            echo "<input style=\"margin-top:6px;\" type=\"submit\" name=\"save\" value=\"$labelSave\">\n";
            echo "</form>\n";
         }
      }
      else
      {
         echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"2\">\n";
         echo "<tr><th>$labelName</th>\n";
         echo "<th>$labelCreatedBy</th>\n";
         echo "<th>$labelLastUpdate</th>\n";
         echo "<th>$labelVisible</th>\n";
         echo "<th>$labelHomePage</th>\n";
         echo "<th>$labelViews</th>\n";
         echo "<th>$labelOrder</th>\n";
         echo "<th>$labelAction</th></tr>\n";

         $sql = "SELECT * FROM CMS_PAGES";
         if ($username != 'admin')
         {
            $sql = $sql . " WHERE created_by = '".$username."'";
         }
         $sql = $sql . " ORDER BY menu_index ASC";
         $result = mysqli_query($db, $sql);
         $num_rows = mysqli_num_rows($result);
         while ($data = mysqli_fetch_array($result))
         {
            echo "<tr>\n";
            echo "<td>" . $data['name'] . "</td>\n";
            echo "<td>" . $data['created_by'] . "</td>\n";
            echo "<td>" . $data['last_update_date'] . "</td>\n";
            echo "<td>" . ($data['visible'] == "0" ? $labelNo : $labelYes) . "</td>\n";
            echo "<td>";
            if ($data['home'] == "1")
               echo $labelYes;
            else
               echo "   <a href=\"" . basename(__FILE__) . "?action=home&id=" . $data['id'] . "\">$labelNo</a>";
            echo "</td>\n";
            echo "<td>" . $data['views'] . "</td>\n";
            echo "<td>";
            if ($data['menu_index'] <= 1)
            {
               echo "   <a href=\"" . basename(__FILE__) . "?action=movedown&id=" . $data['id'] . "\">$labelDown</a>";
            }
            elseif ($data['menu_index'] >= $num_rows)
            {
               echo "   <a href=\"" . basename(__FILE__) . "?action=moveup&id=" . $data['id'] . "\">$labelUp</a>";
            }
            else
            {
               echo "   <a href=\"" . basename(__FILE__) . "?action=moveup&id=" . $data['id'] . "\">$labelUp</a> &nbsp; ";
               echo "   <a href=\"" . basename(__FILE__) . "?action=movedown&id=" . $data['id'] . "\">$labelDown</a>";
            }
            echo "</td>\n";
            echo "<td>\n";
            echo "   <a href=\"" . basename(__FILE__) . "?action=edit&id=" . $data['id'] . "\">$labelEdit</a> | \n";
            echo "   <a href=\"" . basename(__FILE__) . "?action=copy&id=" . $data['id'] . "\">$labelCopy</a> | \n";
            echo "   <a href=\"" . basename(__FILE__) . "?action=delete&id=" . $data['id'] . "\">$labelDelete</a>\n";
            echo "</td>\n";
            echo "</tr>\n";
         }
         echo "</table>\n";
      }
   }

?>
</body>
</html>
