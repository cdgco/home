<?php

if (!$user->is_logged_in()) {}
  
else  {
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT stocks FROM members WHERE memberID = '%s'",
                  mysqli_real_escape_string($link, $memid));
        $res=mysqli_query($link, $sql);

	$userRow = mysqli_fetch_row($res);
	$stocks = $userRow[0];

	if (empty($stocks)) {}
	else { echo "&s=" . $stocks; }
	}; 
?>