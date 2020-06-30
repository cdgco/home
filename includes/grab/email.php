<?php

if (!$user->is_logged_in()) { echo '<br /><br /><img src="img/gmail.png" height="120">'; }
else {
	require ('includes/dbconnect.php');

    $sql = sprintf("SELECT tstat FROM members WHERE memberID = '%s'", mysqli_real_escape_string($link, $memid));
	$res=mysqli_query($link, $sql);
	
	$userRow = mysqli_fetch_row($res);
	$resultstat = $userRow[0];
	if ($resultstat == "y"){ echo '<br /><br /><br /><span class="title" id="unreademails" style="font-size:80px;"></span>'; }
	else { echo '<br /><br /><img src="img/gmail.png" height="120">'; }
}

?><br/>
<span class="tile-holder tile-holder-sm">

<?php

if (!$user->is_logged_in()) { echo '<span class="title">Email</span>'; }
else {
	require ('includes/dbconnect.php');

    $sql = sprintf("SELECT tstat FROM members WHERE memberID = '%s'", mysqli_real_escape_string($link, $memid));
	$res=mysqli_query($link, $sql);
	
	$userRow = mysqli_fetch_row($res);
	$resultstat = $userRow[0];

	if ($resultstat == "y") { echo '<span style="font-size:35px;" class="title">Unread Emails</span>'; }
	else { echo '<span class="title">Email</span>'; }
}

?>