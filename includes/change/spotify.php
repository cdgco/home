<?php require('../dbchange.php'); 

$spotify = $_POST['spotify'];
$spotname = $_POST['spotname'];

$sql = "UPDATE `members` SET `spotify` = '$spotify', `spotname` = '$spotname' WHERE `memberID` = '$memid'";


require('footer.php'); 

?>