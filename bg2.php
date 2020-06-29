<?php require('includes/dbchange.php'); 

$bgurl = $_POST['bgurl'];

$sql = sprintf("UPDATE `members` SET `bgurl` = '%s', `bg` = 'y' WHERE memberID = '%s'",
            mysqli_real_escape_string($link, $bgurl),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    header("Location: acbg.php?s=e");
die(); 
}
else { header("Location: acbg.php?s=s");
die(); }

?>