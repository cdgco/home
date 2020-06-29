<?php require('includes/dbchange.php'); 

$customlocation = $_POST['customlocation'];

$sql = sprintf("UPDATE `members` SET `customlocation` = '%s', `state` = 'N/A', `city` = 'N/A' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $customlocation),
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