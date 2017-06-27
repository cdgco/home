<?php require('includes/dbchange.php'); 

$city = $_POST['city'];
$state = $_POST['state'];

$sql = "UPDATE `members` SET `city` = '$city', `CustomLocation` = 'Y', `state` = '$state' WHERE `memberID` = '$memid'";


require('includes/footer.php'); 

?>