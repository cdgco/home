<?php

require('includes/vars.php');
require('includes/grab/cookies.php');

$link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (!$link) {
    dir('There was a problem when trying to connect to the MySQL Database. Please contact Tech Support. Error: ' . mysqli_error($link));    
}

?>