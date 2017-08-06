<?php require('includes/dbchange.php'); 

$stocks = $_POST['stocks'];

if (isset($stocks)) {

$sql = "UPDATE `members` SET `stocks` = '$stocks' WHERE `memberID` = '$memid'"; 

if (!mysql_query($sql)) {
    header("Location: accontent.php?s=e#stock");
die(); 
}
else { header("Location: accontent.php?s=s#stock");
die(); }
}

if (empty($stocks)) {

$sql = "UPDATE `members` SET  `stocks` = NULL WHERE  `memberID` = '$memid'"; 
if (!mysql_query($sql)) {
    header("Location: accontent.php?s=e#stock");
die(); 
}

else { header("Location: accontent.php?s=s#stock");
die(); }

}

?>