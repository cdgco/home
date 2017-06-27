<?php require('../dbchange.php'); 

$temp = $_POST['temp'];

$sql = "UPDATE `members` SET `temp` = '$temp' WHERE `memberID` = '$memid'";

require('footer.php'); 

?>