<?php

if (!$user->is_logged_in()) {}
  
else  {
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT stocks FROM members WHERE memberID = '%s'",
                  mysql_real_escape_string($memid));
        $res=mysql_query($sql);

	$userRow = mysql_fetch_row($res);
	$stocks = $userRow[0];

	if (empty($stocks)) {}
	else { echo "&s=" . $stocks; }
	}; 
?>