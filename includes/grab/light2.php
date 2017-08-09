<?php

if (!$user->is_logged_in()) { echo "night"; }

  else
	{
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT style FROM members WHERE memberID = '%s'",
                  mysql_real_escape_string($memid));
        $res=mysql_query($sql);
	$userRow = mysql_fetch_row($res);
	$resulttemp = $userRow[0];

	if ($resulttemp == "l") { echo "night"; }
	else { echo "style"; }
	}

?>