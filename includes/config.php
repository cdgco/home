<?php
ob_start();

ini_set('session.gc_probability',0); 
session_start();

//set timezone
date_default_timezone_set('America/Los_Angeles');

//database credentials
define('DBHOST', '');
define('DBUSER', '');
define('DBPASS', '');
define('DBNAME', '');

//application address
define('DIR', 'http://domain.com/');
define('SITEEMAIL', 'hello@domain.com');

try {
    
    //create PDO connection
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch (PDOException $e) {
    //show error
    echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>