<?php require('includes/dbchange.php'); 

$token = $_POST['token'];

$sql = "UPDATE `members` SET `token` = '', `tstat` = 'n', `gmail` = 'no' WHERE `memberID` = '$memid'";


require('includes/footer.php'); 

?>