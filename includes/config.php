<?php
ob_start();
session_start();
//////////////////////////////////////
// ONLY EDIT VALUES IN THIS SECTION //
//////////////////////////////////////
//set timezone
date_default_timezone_set('America/Los_Angeles');
//database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'mysql');
define('DBNAME', 'home');
//application address with following slash
define('DIR', 'http://localhost/home-master/');
define('SITEEMAIL', 'hello@domain.com');
//api credentials
define('GCLIENTID', '108987339289-i90dq9p08dqn97djldm62l8aq0f4q0sf.apps.googleusercontent.com');
define('OWAPIKEY', 'b5af904ffa42b0e7891c7b649efb1d31');
define('RECAPTCHA', '6LdAAycUAAAAAOC4Lw_weHuApTvHV0f04yoFVyUU');
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