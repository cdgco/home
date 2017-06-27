<?php require('includes/dbchange.php'); 

$spotify = $_POST['spotify'];
$spotname = $_POST['spotname'];

$sql = "UPDATE `members` SET `spotify` = '$spotify', `spotname` = '$spotname' WHERE `memberID` = '$memid'";


require('includes/footer.php'); 

?>