<?php require('includes/dbchange.php'); 

$temp = $_POST['temp'];

$sql = sprintf("UPDATE `members` SET `temp` = '%s' WHERE `memberID` = '%s'",
            mysql_real_escape_string($temp),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#temp");
    die();
} else {
    header("Location: acpref.php?s=s#temp");
    die();
} 
?>