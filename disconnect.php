<?php require('includes/dbchange.php'); 

$sql = sprintf("UPDATE `members` SET `token` = '', `tstat` = 'n', `gmail` = 'no' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    $merror = mysqli_errno($link);
    header("Location: acpref.php?s=e&e=$merror#gmail");
    die();
} else {
    header("Location: acpref.php?s=s#gmail");
    die();
} 

?>