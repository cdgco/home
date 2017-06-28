<?php

if (!$user->is_logged_in())
	{
	echo 'spotify:user:spotifycharts:playlist:37i9dQZEVXbLRQDuF5jeBp';
	}
  else
	{
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT spotify FROM members WHERE memberID = '$memid'");
	$userRow = mysql_fetch_row($res);
	$spotplay = $userRow[0];
	echo $spotplay;
	}

?>