
<?php
require ('includes/dbconnect.php');

$res = mysql_query("SELECT CustomLocation FROM members WHERE memberID=" . $_SESSION['memberID']);
$userRow = mysql_fetch_row($res);
$result1 = $userRow[0];

if ($result1 == "Y")
	{

	$res = mysql_query("SELECT state FROM members WHERE memberID=" . $_SESSION['memberID']);
	$userRow = mysql_fetch_row($res);
	$state2 = $userRow[0];

	$res = mysql_query("SELECT city FROM members WHERE memberID=" . $_SESSION['memberID']);
	$userRow = mysql_fetch_row($res);
	$city2 = $userRow[0];

	echo '<div style="display:inline;">' . $city2 . ', ' . $state2 . '</div>';
	}
  else
	{
	echo '<div style="display:inline;" id="address"></div> <div style="display:inline;" id="state"></div>';
	}

?>
