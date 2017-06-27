<?php require('../dbchange.php'); 

$style = $_POST['style'];

$sql = "UPDATE members SET style = '$style' WHERE memberID = '$memid'";

require('footer.php'); 

?>