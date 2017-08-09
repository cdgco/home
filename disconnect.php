<?php require('includes/dbchange.php'); 

$sql = sprintf("UPDATE `members` SET `token` = '', `tstat` = 'n', `gmail` = 'no' WHERE `memberID` = '%s'",
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#gmail");
    die();
} else {
    header("Location: acpref.php?s=s#gmail");
    die();
} 

?>