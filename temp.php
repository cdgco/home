<?php require('includes/dbchange.php'); 

$temp = $_POST['temp'];

$sql = "UPDATE `members` SET `temp` = '$temp' WHERE `memberID` = '$memid'";

require('includes/footer.php'); 

?>