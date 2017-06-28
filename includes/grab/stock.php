	

<?php

if (!$user->is_logged_in()) {}
  
else  {
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT stocks FROM members WHERE memberID = '$memid'");
	$userRow = mysql_fetch_row($res);
	$stocks = $userRow[0];

	if (empty($stocks)) {}
	else { echo "&s=" . $stocks; }
	}; 
?>
