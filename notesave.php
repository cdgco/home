<?php require('includes/dbchange.php'); 

$postnote = $_POST['notes'];

$sql = sprintf("UPDATE `members` SET `notes` = '%s' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $postnote),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    $merror = mysql_errno($link);
    echo $merror;
    die();
} else {
    die();
}

?>