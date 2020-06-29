<?php require('includes/dbchange.php'); 

$temp = $_POST['temp'];

$sql = sprintf("UPDATE `members` SET `temp` = '%s' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $temp),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    $merror = mysqli_errno($link);
    header("Location: acpref.php?s=e&e=$merror#temp");
    die();
} else {
    header("Location: acpref.php?s=s#temp");
    die();
} 
?>