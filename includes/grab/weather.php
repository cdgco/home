<?php

if (!$user->is_logged_in()) {
	echo '" + states[name] + "/" + response.city + "';
}
else {
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT CustomLocation FROM members WHERE memberID = '%s'",
                  mysql_real_escape_string($memid));
        $res=mysql_query($sql);

	$userRow = mysql_fetch_row($res);
	$result1 = $userRow[0];
	if ($result1 == "Y") {
                $sql = sprintf("SELECT state FROM members WHERE memberID = '%s'",
                          mysql_real_escape_string($memid));
                 $res=mysql_query($sql);

		$userRow = mysql_fetch_row($res);
		$state2 = $userRow[0];
                $sql = sprintf("SELECT city FROM members WHERE memberID = '%s'",
                          mysql_real_escape_string($memid));
                $res=mysql_query($sql);

		$userRow = mysql_fetch_row($res);
		$city2 = $userRow[0];
		print_r($state2 . "/" . $city2);
	}
	else {
		echo '" + states[name] + "/" + response.city + "';
	}
}

?>