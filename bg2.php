<?php require('includes/dbchange.php'); 

$bgurl = $_POST['bgurl'];

$sql = sprintf("UPDATE `members` SET `bgurl` = '%s', `bg` = 'y' WHERE memberID = '%s'",
            mysql_real_escape_string($bgurl),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    header("Location: acbg.php?s=e");
die(); 
}
else { header("Location: acbg.php?s=s");
die(); }

?>