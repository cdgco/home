<?php
require ('includes/dbchange.php');

$token = $_POST['token'];
$token2 = explode('=', $token);
$token3 = $token2[0];
$sql = "UPDATE members SET token = '$token3', tstat = 'y', gmail = 'yes' WHERE memberID = '$memid'";

if (!mysql_query($sql)) {
	$merror = mysql_errno($link);
	header("Location: account.php?s=e&e=$merror");
	die();
}
else {
	header("Location: tokencheck2.php");
	die();
}

?>