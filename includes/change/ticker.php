<<?php require('../dbchange.php'); 

$stocks = $_POST['stocks'];

if (isset($stocks)) {

$sql = "UPDATE `members` SET `stocks` = '$stocks' WHERE `memberID` = '$memid'"; 

if (!mysql_query($sql)) {
    header("Location: ../../account.php?s=e");
die(); 
}
else { header("Location: ../../account.php?s=s");
die(); }
}

if (empty($stocks)) {

$sql = "UPDATE `members` SET  `stocks` = NULL WHERE  `memberID` = '$memid'"; 
if (!mysql_query($sql)) {
    header("Location: ../../account.php?s=e");
die(); 
}

else { header("Location: ../../account.php?s=s");
die(); }

}

?>