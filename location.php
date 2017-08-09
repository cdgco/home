<?php require('includes/dbchange.php'); 

$customlocation = $_POST['customlocation'];

$sql = sprintf("UPDATE `members` SET `customlocation` = '%s', `state` = 'N/A', `city` = 'N/A' WHERE `memberID` = '%s'",
            mysql_real_escape_string($customlocation),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: aclocation.php?s=e&e=$merror");
    die();
} else {
    header("Location: aclocation.php?s=s");
    die();
}

?>