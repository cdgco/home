<?php require('includes/dbchange.php'); 

$customlocation = $_POST['customlocation'];

$sql = "UPDATE `members` SET `customlocation` = '$customlocation', `state` = 'N/A', `city` = 'N/A' WHERE `memberID` = '$memid'";

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: aclocation.php?s=e&e=$merror");
    die();
} else {
    header("Location: aclocation.php?s=s");
    die();
}

?>