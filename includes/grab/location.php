<?php
require ('includes/dbconnect.php');

$sql = sprintf("SELECT CustomLocation FROM members WHERE memberID = '%s'",
          mysql_real_escape_string($memid));
$res=mysql_query($sql);
$userRow = mysql_fetch_row($res);
$result1 = $userRow[0];

if ($result1 == "Y")
	{

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

	echo '<div style="display:inline;">' . $city2 . ', ' . $state2 . '</div>';
	}
  else
	{
	echo '<div style="display:inline;" id="address"></div> <div style="display:inline;" id="state"></div>';
	}

?>