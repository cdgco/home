<?php

if (!$user->is_logged_in()) { echo "night"; }

  else
	{
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT style FROM members WHERE memberID = '$memid'");
	$userRow = mysql_fetch_row($res);
	$resulttemp = $userRow[0];

	if ($resulttemp == "l") { echo "night"; }
	else { echo "style"; }
	}

?>