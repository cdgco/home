<?php

require('config.php');

try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch (PDOException $e) {
    echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
    exit;
}

include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);

?>