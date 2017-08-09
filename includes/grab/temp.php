<?php

if (!$user->is_logged_in()) {
	echo "F";
}
else {
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT temp FROM members WHERE memberID = '%s'",
                  mysql_real_escape_string($memid));
        $res=mysql_query($sql);

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