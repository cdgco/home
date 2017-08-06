<?php require('includes/dbchange.php'); 

$bgurl = $_POST['bgurl'];

$sql = "UPDATE `members` SET `bgurl` = '$bgurl', `bg` = 'y' WHERE memberID = '$memid'"; 

if (!mysql_query($sql)) {
    header("Location: acbg.php?s=e");
die(); 
}
else { header("Location: acbg.php?s=s");
die(); }

?>