<?php require('../dbchange.php'); 

$customlocation = $_POST['customlocation'];

$sql = "UPDATE `members` SET `customlocation` = '$customlocation', `state` = 'N/A', `city` = 'N/A' WHERE `memberID` = '$memid'";

require('footer.php'); 

?>