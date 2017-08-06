<?php require('includes/dbchange.php'); 

$sql = "UPDATE `members` SET `bgurl` = NULL, `bg` = 'n' WHERE memberID = '$memid'"; 

if (!mysql_query($sql)) {
    header("Location: acbg.php?s=e");
die(); 
}
else { header("Location: acbg.php?s=s");
die(); }

?>