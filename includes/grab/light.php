<?php

if (!$user->is_logged_in())
	{
	echo '
			<input type="radio" style="font-family: inherit;font-size: 100%;line-height: normal;margin: 0;box-sizing: border-box;padding: 0;" name="switch" onclick="toggle()" id="switch-off" checked>
			<input type="radio" style="font-family: inherit;font-size: 100%;line-height: normal;margin: 0;box-sizing: border-box;padding: 0;" name="switch" onclick="toggle()" id="switch-on">
';
	}
  else
	{
	require ('includes/dbconnect.php');

	$res = mysql_query("SELECT style FROM members WHERE memberID=" . $_SESSION['memberID']);
	$userRow = mysql_fetch_row($res);
	$resulttemp = $userRow[0];
	if ($resulttemp == "l")
		{
		echo '
			<input type="radio" style="font-family: inherit;font-size: 100%;line-height: normal;margin: 0;box-sizing: border-box;padding: 0;" name="switch" onclick="toggle()" id="switch-off" checked>
			<input type="radio" style="font-family: inherit;font-size: 100%;line-height: normal;margin: 0;box-sizing: border-box;padding: 0;" name="switch" onclick="toggle()" id="switch-on">
';
		}
	  else
		{
		echo '
			<input type="radio" style="font-family: inherit;font-size: 100%;line-height: normal;margin: 0;box-sizing: border-box;padding: 0;" name="switch" onclick="toggle()" id="switch-on">
			<input type="radio" style="font-family: inherit;font-size: 100%;line-height: normal;margin: 0;box-sizing: border-box;padding: 0;" name="switch" onclick="toggle()" id="switch-off" checked>
';
		}
	}

?>