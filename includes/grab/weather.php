<?php

if (!$user->is_logged_in()) {
	echo '" + states[name] + "/" + response.city + "';
}
else {
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT CustomLocation FROM members WHERE memberID = '$memid'");
	$userRow = mysql_fetch_row($res);
	$result1 = $userRow[0];
	if ($result1 == "Y") {
		$res = mysql_query("SELECT state FROM members WHERE memberID = '$memid'");
		$userRow = mysql_fetch_row($res);
		$state2 = $userRow[0];
		$res = mysql_query("SELECT city FROM members WHERE memberID = '$memid'");
		$userRow = mysql_fetch_row($res);
		$city2 = $userRow[0];
		print_r($state2 . "/" . $city2);
	}
	else {
		echo '" + states[name] + "/" + response.city + "';
	}
}

?>