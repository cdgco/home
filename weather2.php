<?php require('includes/dbconnect.php'); 

$city = $_POST['city'];
$state = $_POST['state'];

$sql = sprintf("UPDATE `members` SET `city` = '%s', `CustomLocation` = 'Y', `state` = '%s' WHERE `memberID` = '%s'",
            mysql_real_escape_string($city),
            mysql_real_escape_string($state),
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