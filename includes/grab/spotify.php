<?php

if (!$user->is_logged_in())
	{
	echo 'spotify:user:spotifycharts:playlist:37i9dQZEVXbLRQDuF5jeBp';
	}
  else
	{
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT spotify FROM members WHERE memberID = '%s'",
                  mysqli_real_escape_string($link, $memid));
        $res=mysqli_query($link, $sql);

	$userRow = mysqli_fetch_row($res);
	$spotplay = $userRow[0];
	echo $spotplay;
	}

?>