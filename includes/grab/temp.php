	

<?php

if (!$user->is_logged_in()) {
	echo "F";
}
else {
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT temp FROM members WHERE memberID=" . $_SESSION['memberID']);
	$userRow = mysql_fetch_row($res);
	$resulttemp = $userRow[0];
	if ($resulttemp == "f") {
		echo "F";
	}
	else {
		echo "C";
	}
}

?>
