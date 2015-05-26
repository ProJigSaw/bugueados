<?php

$plugin = array(
	'name' => 'Tell-a-friend',
	'description' => 'Tell-a-friend',
	'admin' => array(
		'init' => array('function' => 'tellafriend_init'),
		'update' => array('function' => 'tellafriend_update'),
		'tab' => array('name' => 'Tell-a-friend', 'function' => 'tellafriend_tab')
		),
	'events' => array('onAfterContent' => 'tellafriend_display_after')
	);

define("TELL_A_FRIEND_TITLE", "Tell a friend");
define("TELL_A_FRIEND_INVALID_EMAIL", "&bull; Please enter a valid email address.");
define("TELL_A_FRIEND_INVALID_NAME", "&bull; Please enter your name.");
define("TELL_A_FRIEND_INVALID_FRIENDNAME", "&bull; Please enter your friend's name.");
define("TELL_A_FRIEND_INVALID_CAPTCHA", "&bull; The CAPTCHA wasn't entered correctly: ");
define("TELL_A_FRIEND_SENT", "&bull; Tell-a-friend message has been sent.");

define("TELL_A_FRIEND_NAME", "Your Name: ");
define("TELL_A_FRIEND_EMAIL", "Your Email: ");
define("TELL_A_FRIEND_FRIEND_NAME", "Friend's Name: ");
define("TELL_A_FRIEND_FRIEND_EMAIL", "Friend's Email: ");
define("TELL_A_FRIEND_SUBMIT", "Send");
define("TELL_A_FRIEND_INPUT_WIDTH", 350);

function tellafriend_display_after($id)
{
   global $cms_content, $db;

   $sql = "SELECT * FROM CMS_TELLAFRIEND WHERE page_id='$id'";
   $result = mysqli_query($db, $sql);
   $data = mysqli_fetch_array($result);
   if (!$data)
      return;

   $tellafriend_enabled = $data['tellafriend_enabled'];
   if ($tellafriend_enabled == 0)
      return;

   $tellafriend_subject = $data['tellafriend_subject'];
   $tellafriend_message = $data['tellafriend_message'];
   $captcha_public_key = $data['captcha_public_key'];
   $captcha_private_key = $data['captcha_private_key'];

   if ($captcha_public_key != '')
   {
      $recaptchalib = basename(dirname(dirname(__FILE__)));
      $recaptchalib .= "/";
      $recaptchalib .= basename(dirname(__FILE__));
      $recaptchalib .= "/recaptchalib.php";
      require_once($recaptchalib);
   }

   $error = '';
   if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'tellafriend_submit')
   {
      if ($captcha_public_key != '')
      {
         $response = recaptcha_check_answer($captcha_private_key, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);
         if (!$response->is_valid)
         {
            $message .= TELL_A_FRIEND_INVALID_CAPTCHA;
            $message .= $response->error;
            $message .= "<br>\n";
         }
      }
      if (!isset($_REQUEST['tellafriend-name']) || $_REQUEST['tellafriend-name']=='')
      {
         $error .= TELL_A_FRIEND_INVALID_NAME.'<br>';
      }
      if (!isset($_REQUEST['tellafriend-email']) || !preg_match("/^.+@.+\..+$/", $_REQUEST['tellafriend-email']))
      {
         $error .= TELL_A_FRIEND_INVALID_EMAIL.'<br>';
      }
      if (!isset($_REQUEST['tellafriend-friendname']) || $_REQUEST['tellafriend-friendname']=='')
      {
         $error .= TELL_A_FRIEND_INVALID_FRIENDNAME.'<br>';
      }
      if (!isset($_REQUEST['tellafriend-friendemail']) || !preg_match("/^.+@.+\..+$/", $_REQUEST['tellafriend-friendemail']))
      {
         $error .= TELL_A_FRIEND_INVALID_EMAIL.'<br>';
      }     
      if (!$error) 
      {
         $mailto = $_REQUEST['tellafriend-friendemail'];
         $mailfrom = $_REQUEST['tellafriend-email'];
         $subject = $tellafriend_subject;
         $eol = "\n";

         $header  = 'From: '.$mailfrom.$eol;
         $header .= 'Reply-To: '.$mailfrom.$eol;
         $header .= 'MIME-Version: 1.0'.$eol;
         $header .= 'X-Mailer: PHP v'.phpversion().$eol;

         $tellafriend_message = preg_replace('/tellafriend-friendname/', $_REQUEST['tellafriend-friendname'], $tellafriend_message);
         $tellafriend_message = preg_replace('/tellafriend-nam/', $_REQUEST['tellafriend-name'], $tellafriend_message);
         $tellafriend_message = preg_replace('/tellafriend-email/', $_REQUEST['tellafriend-email'], $tellafriend_message);
         mail($mailto, $subject, $tellafriend_message, $header);

         $error = TELL_A_FRIEND_SENT."<br>";
      }
   }

   $cms_content .= "<h3>".TELL_A_FRIEND_TITLE."</h3>\n";

   if ($error)
   { 
      $cms_content .= $error;
   }
   $cms_content .= "<form action=\"".MAIN_SCRIPT."\" method=\"post\">\n";
   $cms_content .= "<input name=\"page\" type=\"hidden\" value=\"".$id."\">\n";
   $cms_content .= "<input name=\"action\" type=\"hidden\" value=\"tellafriend_submit\">\n";
   $cms_content .= "<table>\n<tr><td>".TELL_A_FRIEND_NAME."</td><td><input class=\"cms_input\" name=\"tellafriend-name\" style=\"width:".TELL_A_FRIEND_INPUT_WIDTH."px\"></td></tr>\n";
   $cms_content .= "<tr><td>".TELL_A_FRIEND_EMAIL."</td><td><input class=\"cms_input\" type=\"email\" name=\"tellafriend-email\" style=\"width:".TELL_A_FRIEND_INPUT_WIDTH."px\"></td></tr>\n";
   $cms_content .= "<tr><td>".TELL_A_FRIEND_FRIEND_NAME."</td><td><input class=\"cms_input\" name=\"tellafriend-friendname\" style=\"width:".TELL_A_FRIEND_INPUT_WIDTH."px\"></td></tr>\n";
   $cms_content .= "<tr><td>".TELL_A_FRIEND_FRIEND_EMAIL."</td><td><input class=\"cms_input\" name=\"tellafriend-friendemail\" style=\"width:".TELL_A_FRIEND_INPUT_WIDTH."px\"></td></tr>\n";
   if ($captcha_public_key != '')
   {
      $cms_content .= "<tr><td>&nbsp;</td><td>";
      $cms_content .= recaptcha_get_html($captcha_public_key);
      $cms_content .= "</td></tr>\n";
   }
   $cms_content .= "<tr><td>&nbsp;</td><td><input class=\"cms_button\" name=\"submit\" type=\"submit\" value=\"".TELL_A_FRIEND_SUBMIT."\"></td></tr>\n";
   $cms_content .= "</table>\n</form>\n";
}

function tellafriend_tab()
{
   global $id, $db;

   $tellafriend_enabled = 0;
   $tellafriend_subject = "Here's a web site recommendation";
   $tellafriend_message = "Hi {tellafriend-friendname},\n\nA friend of yours, {tellafriend-name}, whose email address is {tellafriend-email} thought you may like to visit this web site: http://www.website.com";
   $captcha_public_key = '';
   $captcha_private_key = '';
 
   $sql = "SELECT * FROM CMS_TELLAFRIEND WHERE page_id='$id'";
   $result = mysqli_query($db, $sql);
   if ($data = mysqli_fetch_array($result))
   {
      $tellafriend_enabled = $data['tellafriend_enabled'];
      $tellafriend_subject = $data['tellafriend_subject'];
      $tellafriend_message = $data['tellafriend_message'];
      $captcha_public_key = $data['captcha_public_key'];
      $captcha_private_key = $data['captcha_private_key'];
   }
 
   $html .= "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"2\">\n";
   $html .= "<tr><td style=\"width:10%;white-space:nowrap;\">Enable Tell-a-friend for this page:&nbsp;&nbsp;</td><td><select name=\"tellafriend-enabled\" size=\"1\"><option value=\"0\"";
   if ($tellafriend_enabled == 0)
   {
      $html .= " selected";
   }
   $html .= ">disabled</option><option value=\"1\"";
   if ($tellafriend_enabled == 1)
   {
      $html .= " selected";
   }
   $html .= ">enabled</option></select></td></tr>";
   $html .= "<tr><td>Email Subject:</td><td><input name=\"tellafriend-subject\" style=\"width:100%;\" value=\"$tellafriend_subject\"></td></tr>";
   $html .= "<tr><td>Email Message:</td><td><textarea name=\"tellafriend-message\" style=\"width:100%;\" rows=\"4\">$tellafriend_message</textarea></td></tr>";
   $html .= "<tr><td>reCAPTCHA public key:</td><td><input name=\"tellafriend-publickey\" style=\"width:100%;\" value=\"$captcha_public_key\"></td></tr>";
   $html .= "<tr><td>reCAPTCHA private key:</td><td><input name=\"tellafriend-privatekey\" style=\"width:100%;\" value=\"$captcha_private_key\"></td></tr>";
   $html .= "</table>\n";

   return $html;
}

function tellafriend_init()
{
   global $authorized, $db;
   if ($authorized)
   {
        $sql = "CREATE TABLE IF NOT EXISTS CMS_TELLAFRIEND (
              id INT UNSIGNED NOT NULL AUTO_INCREMENT,
              page_id INT, 
              tellafriend_enabled INT, 
              tellafriend_subject TEXT, 
              tellafriend_message TEXT, 
              captcha_public_key TEXT, 
              captcha_private_key TEXT,
              PRIMARY KEY(id));";
      mysqli_query($db, $sql) or die(mysqli_error($db));
   }
}

function tellafriend_update($id)
{
   global $authorized, $db;
   if ($authorized)
   {
      if (isset($_REQUEST['tellafriend-enabled']) && 
          isset($_REQUEST['tellafriend-subject']) &&
          isset($_REQUEST['tellafriend-message']) &&
          isset($_REQUEST['tellafriend-publickey']) &&
          isset($_REQUEST['tellafriend-privatekey']))
      {
         $tellafriend_enabled = intval($_REQUEST['tellafriend-enabled']);
         $tellafriend_subject = $_REQUEST['tellafriend-subject'];
         $tellafriend_message = $_REQUEST['tellafriend-message'];
         $captcha_public_key = $_REQUEST['tellafriend-publickey'];
         $captcha_private_key = $_REQUEST['tellafriend-privatekey'];
         if (get_magic_quotes_gpc())
         {
            $tellafriend_subject = stripslashes($tellafriend_subject);
            $tellafriend_message = stripslashes($tellafriend_message);
            $captcha_public_key = stripslashes($captcha_public_key);
            $captcha_private_key = stripslashes($captcha_private_key);
         }
         $tellafriend_subject = mysqli_real_escape_string($db, $tellafriend_subject);
         $tellafriend_message = mysqli_real_escape_string($db, $tellafriend_message);
         $captcha_public_key = mysqli_real_escape_string($db, $captcha_public_key);
         $captcha_private_key = mysqli_real_escape_string($db, $captcha_private_key);

         $sql = "SELECT * FROM CMS_TELLAFRIEND WHERE page_id=".$id;
         $result = mysqli_query($db, $sql);
         if (mysqli_num_rows($result) == 0)
            $sql = "INSERT INTO CMS_TELLAFRIEND (`tellafriend_enabled`, `tellafriend_subject`, `tellafriend_message`, `captcha_public_key`, `captcha_private_key`, `page_id`) VALUES ('$tellafriend_enabled', '$tellafriend_subject', '$tellafriend_message', '$captcha_public_key', '$captcha_private_key', '$id');";
         else
            $sql = "UPDATE CMS_TELLAFRIEND SET tellafriend_enabled='$tellafriend_enabled', tellafriend_subject='$tellafriend_subject', tellafriend_message='$tellafriend_message', captcha_public_key='$captcha_public_key', captcha_private_key='$captcha_private_key' WHERE page_id='$id'";
         mysqli_query($db, $sql) or die(mysqli_error($db));
      }
   }
}

?>