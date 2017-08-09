<?php require('includes/dbchange.php'); 

$postnote = $_POST['notes'];

$sql = sprintf("UPDATE `members` SET `notes` = '%s' WHERE `memberID` = '%s'",
            mysql_real_escape_string($postnote),
            mysql_real_escape_string($memid));

die();
?>