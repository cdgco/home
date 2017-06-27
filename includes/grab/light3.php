<?php

if (!$user->is_logged_in()) { echo "style"; }

  else
	{
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT style FROM members WHERE memberID=" . $_SESSION['memberID']);
	$userRow = mysql_fetch_row($res);
	$resulttemp = $userRow[0];

	if ($resulttemp == "l") { echo "style"; }
	else { echo "night"; }
	}

?>