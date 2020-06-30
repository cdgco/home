<?php

if (!$user->is_logged_in()) { echo "12"; }
else {
	require ('includes/dbconnect.php');

    $sql = sprintf("SELECT clock FROM members WHERE memberID = '%s'", mysqli_real_escape_string($link, $memid));
	$res=mysqli_query($link, $sql);

	$userRow = mysqli_fetch_row($res);
	print_r($userRow[0]);
}
?>