<?php

require('includes/vars.php');
require('includes/grab/cookies.php');

$link = mysql_connect(DBHOST, DBUSER, DBPASS);

if (!$link) {
    dir('There was a problem when trying to connect to the host. Please contact Tech Support. Error: ' . mysql_error());
}

$db_selected = mysql_select_db(DBNAME, $link);

if (!$link) {
    dir('There was a problem when trying to connect to the database. Please contact Tech Support. Error: ' . mysql_error());
}

?>