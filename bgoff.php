<?php require('includes/dbchange.php'); 

$sql = "UPDATE `members` SET `bgurl` = NULL, `bg` = 'n' WHERE memberID = '$memid'"; 

if (!mysql_query($sql)) {
    header("Location: account.php?s=e");
die(); 
}
else { header("Location: account.php?s=s");
die(); }

?>
