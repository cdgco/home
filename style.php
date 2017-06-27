<?php require('includes/dbchange.php'); 

$style = $_POST['style'];

$sql = "UPDATE members SET style = '$style' WHERE memberID = '$memid'";

require('includes/footer.php'); 

?>