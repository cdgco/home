<?php

if (!$user->is_logged_in()) { echo "12"; }
  else
	{
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT clock FROM members WHERE memberID = '$memid'");
	$userRow = mysql_fetch_row($res);
	print_r($userRow[0]);
	};
?>