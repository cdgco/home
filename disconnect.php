<?php require('includes/dbchange.php'); 

$token = $_POST['token'];

$sql = "UPDATE `members` SET `token` = '', `tstat` = 'n', `gmail` = 'no' WHERE `memberID` = '$memid'";


if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#gmail");
    die();
} else {
    header("Location: acpref.php?s=s#gmail");
    die();
} 

?>