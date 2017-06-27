<?php require('../dbchange.php'); 

$result = $_POST['newsource'];
            $result_explode = explode('|', $result);
            $source = $result_explode[0];
            $sourcename = $result_explode[1];

$sql = "UPDATE `members` SET `newsource` = '$source', `sourcename` = '$sourcename' WHERE `memberID` = '$memid'";


require('footer.php'); 
?>