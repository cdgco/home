<?php

if (!$user->is_logged_in()) {
	echo "F";
}
else {
	require ('includes/dbconnect.php');

    $sql = sprintf("SELECT temp FROM members WHERE memberID = '%s'", mysqli_real_escape_string($link, $memid));
    $res=mysqli_query($link, $sql);

	$userRow = mysqli_fetch_row($res);
	$resulttemp = $userRow[0];
	if ($resulttemp == "f") {
		echo "F";
	}
	else {
		echo "C";
	}
}

?>