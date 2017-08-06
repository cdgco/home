<?php require('includes/dbchange.php'); 

$temp = $_POST['temp'];

$sql = "UPDATE `members` SET `temp` = '$temp' WHERE `memberID` = '$memid'";

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#temp");
    die();
} else {
    header("Location: acpref.php?s=s#temp");
    die();
} 
?>