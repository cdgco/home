<?php require('includes/dbchange.php'); 

$sql = sprintf("UPDATE `members` SET `bgurl` = NULL, `bg` = 'n' WHERE memberID = '%s'",
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    header("Location: acbg.php?s=e");
die(); 
}
else { header("Location: acbg.php?s=s");
die(); }

?>