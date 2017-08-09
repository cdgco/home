<?php

if (!$user->is_logged_in())
	{
	echo 'spotify:user:spotifycharts:playlist:37i9dQZEVXbLRQDuF5jeBp';
	}
  else
	{
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT spotify FROM members WHERE memberID = '%s'",
                  mysql_real_escape_string($memid));
        $res=mysql_query($sql);

	$userRow = mysql_fetch_row($res);
	$spotplay = $userRow[0];
	echo $spotplay;
	}

?>