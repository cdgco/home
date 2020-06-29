<?php require('includes/dbchange.php'); 

$sql = sprintf("UPDATE `members` SET `bgurl` = NULL, `bg` = 'n' WHERE memberID = '%s'",
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    header("Location: acbg.php?s=e");
die(); 
}
else { header("Location: acbg.php?s=s");
die(); }

?>