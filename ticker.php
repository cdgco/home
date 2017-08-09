<?php require('includes/dbchange.php'); 

$stocks = $_POST['stocks'];

if (isset($stocks)) {

$sql = sprintf("UPDATE `members` SET `stocks` = '%s' WHERE `memberID` = '%s'",
            mysql_real_escape_string($stocks),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    header("Location: accontent.php?s=e#stock");
die(); 
}
else { header("Location: accontent.php?s=s#stock");
die(); }
}

if (empty($stocks)) {

$sql = sprintf("UPDATE `members` SET  `stocks` = NULL WHERE `memberID` = '%s'",
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    header("Location: accontent.php?s=e#stock");
die(); 
}

else { header("Location: accontent.php?s=s#stock");
die(); }

}

?>