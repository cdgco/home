<?php require('includes/dbchange.php'); 

$result = $_POST['rtime'];
            $result_explode = explode('|', $result);
            $refresh = $result_explode[0];
            $refreshname = $result_explode[1];

$sql = "UPDATE `members` SET `refresh` = '$refresh', `refreshname` = '$refreshname' WHERE `memberID` = '$memid'";


require('includes/footer.php'); 
?>