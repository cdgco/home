<?php require('includes/dbconnect.php'); 

$city = $_POST['city'];
$state = $_POST['state'];

$sql = sprintf("UPDATE `members` SET `city` = '%s', `CustomLocation` = 'Y', `state` = '%s' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $city),
            mysqli_real_escape_string($link, $state),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    $merror = mysqli_errno($link);
    header("Location: aclocation.php?s=e&e=$merror");
    die();
} else {
    header("Location: aclocation.php?s=s");
    die();
}
?>