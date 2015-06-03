<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form1')
{
   $mailto = 'registros@bugueados.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Información de Contacto';
   $message = 'Values submitted from web site form:';
   $success_url = './Exito.php';
   $error_url = './Error.php';
   $error = '';
   $eol = "\n";
   $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
   $boundary = md5(uniqid(time()));

   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }

   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }

   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
   $body .= '--'.$boundary.$eol;
   $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
   $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $body .= $eol.stripslashes($message).$eol;
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
          {
             $body .= '--'.$boundary.$eol;
             $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
             $body .= 'Content-Transfer-Encoding: base64'.$eol;
             $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
             $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
          }
      }
   }
   $body .= '--'.$boundary.'--'.$eol;
   if ($mailto != '')
   {
      mail($mailto, $subject, $body, $header);
   }
   header('Location: '.$success_url);
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
<link href="wb.validation.css" rel="stylesheet">
<link href="Antimonopolio.css" rel="stylesheet">
<link href="Contactar.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
<script src="wb.validation.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Form1").submit(function(event)
   {
      var isValid = $.validate.form(this);
      return isValid;
   });
   $("#Editbox1").validate(
   {
      required: false,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f]*$/,
      length_min: '4',
      length_max: '30',
      color_text: '#FFFFFF',
      color_hint: '#00FF00',
      color_error: '#00596C',
      opacity: 0.80,
      color_border: '#00596C',
      nohint: true,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: -10,
      offsety: 0,
      bubble_class: 'tooltip',
      effect: 'fade',
      error_text: 'Se requiere unicamente texto'
   });
   $("#Editbox2").validate(
   {
      required: false,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f]*$/,
      length_min: '4',
      length_max: '30',
      color_text: '#FFFFFF',
      color_hint: '#00FF00',
      color_error: '#00596C',
      opacity: 0.80,
      color_border: '#00596C',
      nohint: true,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: -10,
      offsety: 0,
      bubble_class: 'tooltip',
      effect: 'fade',
      error_text: 'Se requiere unicamente texto'
   });
   $("#Editbox3").validate(
   {
      required: false,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f]*$/,
      length_min: '4',
      length_max: '30',
      color_text: '#FFFFFF',
      color_hint: '#00FF00',
      color_error: '#00596C',
      opacity: 0.80,
      color_border: '#00596C',
      nohint: true,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: -10,
      offsety: 0,
      bubble_class: 'tooltip',
      effect: 'fade',
      error_text: 'Se requiere unicamente texto'
   });
   $("#Editbox4").validate(
   {
      required: false,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f]*$/,
      length_min: '4',
      length_max: '30',
      color_text: '#FFFFFF',
      color_hint: '#00FF00',
      color_error: '#00596C',
      opacity: 0.80,
      color_border: '#00596C',
      nohint: true,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: -10,
      offsety: 0,
      bubble_class: 'tooltip',
      effect: 'fade',
      error_text: 'Se requiere unicamente texto'
   });
   $("#Editbox6").validate(
   {
      required: false,
      type: 'custom',
      param: /^[0-9-]*$/,
      length_min: '4',
      length_max: '30',
      color_text: '#FFFFFF',
      color_hint: '#00FF00',
      color_error: '#00596C',
      opacity: 0.80,
      color_border: '#00596C',
      nohint: true,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: -10,
      offsety: 0,
      bubble_class: 'tooltip',
      effect: 'fade',
      error_text: 'Se requiere unicamente Números'
   });
   $("#Editbox7").validate(
   {
      required: false,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f]*$/,
      length_min: '4',
      length_max: '30',
      color_text: '#FFFFFF',
      color_hint: '#00FF00',
      color_error: '#00596C',
      opacity: 0.80,
      color_border: '#00596C',
      nohint: true,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: -10,
      offsety: 0,
      bubble_class: 'tooltip',
      effect: 'fade',
      error_text: 'Se requiere unicamente texto'
   });
   $("#Editbox5").validate(
   {
      required: false,
      type: 'custom',
      param: /^[0-9-]*$/,
      length_min: '4',
      length_max: '30',
      color_text: '#FFFFFF',
      color_hint: '#00FF00',
      color_error: '#00596C',
      opacity: 0.80,
      color_border: '#00596C',
      nohint: true,
      font_family: 'Arial',
      font_size: '13px',
      position: 'centerright',
      offsetx: -10,
      offsety: 0,
      bubble_class: 'tooltip',
      effect: 'fade',
      error_text: 'Se requiere unicamente Números'
   });
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
<div id="wb_Form1" style="position:absolute;left:330px;top:190px;width:600px;height:470px;z-index:50;">
<form name="Contacto" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form1">
<input type="hidden" name="formid" value="form1">
<div id="wb_Text3" style="position:absolute;left:10px;top:70px;width:90px;height:18px;z-index:1;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Nombre:</span></div>
<input type="text" id="Editbox1" style="position:absolute;left:90px;top:60px;width:198px;height:38px;line-height:38px;z-index:2;" name="Nombre" value="">
<div id="wb_Text4" style="position:absolute;left:10px;top:120px;width:80px;height:18px;z-index:3;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Dirección:</span></div>
<div id="wb_Text5" style="position:absolute;left:10px;top:170px;width:57px;height:36px;z-index:4;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Ciudad:</span></div>
<div id="wb_Text6" style="position:absolute;left:10px;top:220px;width:57px;height:36px;z-index:5;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Estado:</span></div>
<div id="wb_Text7" style="position:absolute;left:310px;top:120px;width:57px;height:18px;z-index:6;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">C.P.</span></div>
<div id="wb_Text8" style="position:absolute;left:310px;top:70px;width:70px;height:18px;z-index:7;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Teléfono:</span></div>
<div id="wb_Text9" style="position:absolute;left:310px;top:170px;width:57px;height:18px;z-index:8;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Correo:</span></div>
<div id="wb_Text10" style="position:absolute;left:310px;top:220px;width:70px;height:18px;z-index:9;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">País</span></div>
<select name="País" size="1" id="Combobox1" style="position:absolute;left:390px;top:210px;width:200px;height:40px;z-index:10;">
<option selected value="Selecciona">Selecciona tu país</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Aland Islands">Aland Islands</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote D'Ivoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
<option value="Vatican City">Vatican City</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="South Korea">South Korea</option>
<option value="North Korea">North Korea</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macao">Macao</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option selected value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">Netherlands Antilles</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">Northern Mariana Islands</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Palestinian Territory">Palestinian Territory</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Helena">Saint Helena</option>
<option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia and Montenegro">Serbia and Montenegro</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syrian Arab Republic">Syrian Arab Republic</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Timor-Leste">Timor-Leste</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands">Virgin Islands</option>
<option value="Wallis and Futuna">Wallis and Futuna</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
<input type="submit" id="Button1" name="" value="Enviar" style="position:absolute;left:390px;top:420px;width:200px;height:40px;z-index:11;">
<div id="Layer1" style="position:absolute;text-align:left;left:10px;top:10px;width:580px;height:25px;z-index:12;">
<div id="wb_Text11" style="position:absolute;left:85px;top:4px;width:411px;height:18px;text-align:center;z-index:0;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Formulario de contacto</span></div>
</div>
<input type="reset" id="Button2" name="" value="Reiniciar" style="position:absolute;left:10px;top:420px;width:200px;height:40px;z-index:13;">
<input type="radio" id="RadioButton1" name="Queja O Sugerencia" value="Queja O Sugerencia" checked style="position:absolute;left:205px;top:300px;z-index:14;">
<div id="wb_Text1" style="position:absolute;left:45px;top:300px;width:160px;height:18px;z-index:15;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Queja o Sugerencia</span></div>
<div id="wb_Text12" style="position:absolute;left:45px;top:330px;width:100px;height:18px;z-index:16;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Soy PYME</span></div>
<input type="radio" id="RadioButton2" name="Soy Pyme" value="Soy Pyme" style="position:absolute;left:205px;top:330px;z-index:17;">
<div id="wb_Text13" style="position:absolute;left:45px;top:360px;width:160px;height:18px;z-index:18;text-align:left;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Solicitud de empleo</span></div>
<input type="radio" id="RadioButton3" name="Urgente" value="Urgente" style="position:absolute;left:205px;top:360px;z-index:19;">
<div id="wb_Text14" style="position:absolute;left:45px;top:270px;width:180px;height:18px;text-align:center;z-index:20;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Estoy aqui por</span></div>
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:290px;top:292px;width:288px;height:96px;z-index:21;" rows="5" cols="45"></textarea>
<div id="wb_Text15" style="position:absolute;left:290px;top:270px;width:290px;height:18px;text-align:center;z-index:22;">
<span style="color:#5A5A5A;font-family:Arial;font-size:16px;">Escribe tu mensaje (No obligatorio)</span></div>
<input type="text" id="Editbox2" style="position:absolute;left:90px;top:110px;width:198px;height:38px;line-height:38px;z-index:23;" name="Nombre" value="">
<input type="text" id="Editbox3" style="position:absolute;left:90px;top:160px;width:198px;height:38px;line-height:38px;z-index:24;" name="Nombre" value="">
<input type="text" id="Editbox4" style="position:absolute;left:90px;top:210px;width:198px;height:38px;line-height:38px;z-index:25;" name="Nombre" value="">
<input type="number" id="Editbox6" style="position:absolute;left:390px;top:110px;width:198px;height:38px;line-height:38px;z-index:26;" name="Nombre" value="">
<input type="text" id="Editbox7" style="position:absolute;left:390px;top:160px;width:198px;height:38px;line-height:38px;z-index:27;" name="Nombre" value="">
<input type="number" id="Editbox5" style="position:absolute;left:390px;top:60px;width:198px;height:38px;line-height:38px;z-index:28;" name="Nombre" value="">
</form>
</div>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb10.png" alt="WYSIWYG Web Builder" style="position:absolute;left:581px;top:747px;border-width:0;z-index:250"></a>
<div id="wb_Text20" style="position:absolute;left:380px;top:110px;width:482px;height:40px;text-align:center;z-index:52;">
<span style="color:#FFFFFF;font-family:Arial;font-size:35px;">CONTACTAR</span></div>
</div>
<div id="Layer2" style="position:absolute;text-align:center;left:0px;top:690px;width:100%;height:90px;z-index:53;">
<div id="Layer2_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="Layer11" style="position:absolute;text-align:left;left:1050px;top:10px;width:188px;height:68px;z-index:30;">
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:650px;top:10px;width:278px;height:68px;z-index:31;">
</div>
<div id="Layer3" style="position:absolute;text-align:left;left:330px;top:10px;width:278px;height:68px;z-index:32;">
</div>
<div id="wb_Text2" style="position:absolute;left:710px;top:35px;width:220px;height:22px;text-align:center;z-index:33;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">GDL: (33) 1955 3511</span></div>
<div id="Layer5" style="position:absolute;text-align:left;left:10px;top:10px;width:278px;height:68px;z-index:34;">
</div>
<div id="wb_Text16" style="position:absolute;left:390px;top:35px;width:220px;height:22px;text-align:center;z-index:35;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">facebook.com/bugueados</span></div>
<div id="wb_ClipArt1" style="position:absolute;left:340px;top:20px;width:50px;height:50px;z-index:36;">
<a href="https://www.facebook.com/Bugueados?ref=hl" target="_blank"><img class="hover" src="images/img0072_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0072.png" id="ClipArt1" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_ClipArt2" style="position:absolute;left:20px;top:20px;width:50px;height:50px;z-index:37;">
<a href="https://twitter.com/Bugueados" target="_blank"><img class="hover" src="images/img0085_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0085.png" id="ClipArt2" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_Text17" style="position:absolute;left:70px;top:35px;width:220px;height:22px;text-align:center;z-index:38;">
<span style="color:#5A5A5A;font-family:'Trebuchet MS';font-size:16px;">twitter.com/bugueados</span></div>
<div id="wb_ClipArt4" style="position:absolute;left:660px;top:20px;width:50px;height:50px;z-index:39;">
<a href=""><img class="hover" src="images/img0086_hover.png" alt="" style="border-width:0;width:50px;height:50px;"><span><img src="images/img0086.png" id="ClipArt4" alt="" style="width:50px;height:50px;"></span></a></div>
<div id="wb_Image4" style="position:absolute;left:950px;top:0px;width:90px;height:90px;z-index:40;">
<img src="images/z0codJk2.png" id="Image4" alt=""></div>
<div id="wb_Text18" style="position:absolute;left:1050px;top:20px;width:190px;height:48px;text-align:center;z-index:41;">
<span style="color:#5A5A5A;font-family:Arial;font-size:13px;">Bugueados S.A. de C.V.<br>registros@buguedos.com<br>El tajín #1658 - Zapopan</span></div>
</div>
</div>
<div id="Layer4" style="position:fixed;text-align:center;left:0;top:0;right:0;height:70px;z-index:54;">
<div id="Layer4_Container" style="width:1250px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Image12" style="position:absolute;left:30px;top:20px;width:70px;height:44px;z-index:42;">
<a href="./index.php"><img src="images/bugspeq.png" id="Image12" alt=""></a></div>
<div id="RollOver1" style="position:absolute;left:1110px;top:30px;overflow:hidden;width:30px;height:30px;z-index:43">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/favoritos2.png">
<span><img alt="" src="images/favoritos.png"></span>
</a>
</div>
<div id="RollOver2" style="position:absolute;left:1160px;top:30px;overflow:hidden;width:30px;height:30px;z-index:44">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/mensajes.png">
<span><img alt="" src="images/mensajes2.png"></span>
</a>
</div>
<div id="RollOver3" style="position:absolute;left:1210px;top:30px;overflow:hidden;width:30px;height:30px;z-index:45">
<a href="./Mi_cuenta.php">
<img class="hover" alt="" src="images/micuenta2.png">
<span><img alt="" src="images/micuenta.png"></span>
</a>
</div>
<div id="wb_Text19" style="position:absolute;left:0px;top:0px;width:130px;height:16px;text-align:center;z-index:46;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Publicidad aleatoria</span></div>
<div id="wb_CssMenu2" style="position:absolute;left:990px;top:30px;width:100px;height:30px;z-index:47;">
<ul>
<li class="firstmain"><a href="./IniciarSesion.php" target="_self">Iniciar&nbsp;Sesi&#243;n</a>
</li>
</ul>
<br>
</div>
<div id="wb_LoginName1" style="position:absolute;left:990px;top:10px;width:250px;height:18px;text-align:center;z-index:48;">
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
<div id="wb_CssMenu1" style="position:absolute;left:355px;top:10px;width:540px;height:50px;z-index:49;">
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