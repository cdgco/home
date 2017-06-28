<?php

if (!$user->is_logged_in())
	{ echo "http://rss.cnn.com/rss/cnn_topstories.rss"; }
  else
	{
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT newsource FROM members WHERE memberID = '$memid'");
	$userRow = mysql_fetch_row($res);
	print_r($userRow[0]);
	}

?>