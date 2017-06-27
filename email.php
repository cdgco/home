<?php require('includes/dbchange.php'); 

$newemail = $_POST['changeemail'];

$sql = "UPDATE `members` SET `email` = '$newemail' WHERE `memberID` = '$memid'";


require('includes/footer.php'); 

?>