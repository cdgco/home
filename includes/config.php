<?php
ob_start();

ini_set('session.gc_probability',0); 
session_start();

//////////////////////////////////////
// ONLY EDIT VALUES IN THIS SECTION //
//////////////////////////////////////

//set timezone
date_default_timezone_set('America/Los_Angeles');

//database credentials
define('DBHOST', '');
define('DBUSER', '');
define('DBPASS', '');
define('DBNAME', '');

//application address
define('DIR', 'http://domain.com');
define('SITEEMAIL', 'hello@domain.com');

//api credentials
define('GCLIENTID', 'GOOGLE-CLOUD-GMAIL-API-KEY-HERE');
define('WUAPIKEY', 'WEATHER-UNDERGROUND-API-KEY-HERE');
define('RECAPTCHA', 'GOOGLE-RECAPTCHA-INVISIBLE-V2-KEY');

//Reset Email Content
define('RESETFROMADDRESS', 'reset@domain.com');
define('RESETFROMNAME', 'CDG Home Team');
define('RESETSUBJECT', 'Reset CDG Home Account');

$resetcontent = "<p>Someone requested that the password on your account be reset.</p>
		 <p>If this was a mistake, just ignore this email and nothing will happen.</p>
		 <p>To reset your password, visit the following address: 
                 <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a></p>";


///////////////////////
// DO NOT EDIT BELOW //
///////////////////////

$authurl = "https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/gmail.readonly&redirect_uri=" . DIR . "auth.php&response_type=token&client_id=" . GCLIENTID;

$qauthurl = "https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/gmail.readonly&redirect_uri=" . DIR . "qauth.php&response_type=token&client_id=" . GCLIENTID;
?>