<?php require('includes/dbchange.php'); 

$city = $_POST['city'];
$state = $_POST['state'];

$sql = "UPDATE `members` SET `city` = '$city', `CustomLocation` = 'Y', `state` = '$state' WHERE `memberID` = '$memid'";


if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: aclocation.php?s=e&e=$merror");
    die();
} else {
    header("Location: aclocation.php?s=s");
    die();
}
?>