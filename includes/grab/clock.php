<?php

if (!$user->is_logged_in()) { echo "12"; }
  else
	{
	require ('includes/dbconnect.php');

        $sql = sprintf("SELECT clock FROM members WHERE memberID = '%s'",
                  mysql_real_escape_string($memid));
        $res=mysql_query($sql);
	$userRow = mysql_fetch_row($res);
	print_r($userRow[0]);
	};
?>