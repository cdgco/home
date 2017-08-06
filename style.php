<?php require('includes/dbchange.php'); 

$style = $_POST['style'];

$sql = "UPDATE members SET style = '$style' WHERE memberID = '$memid'";

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#theme");
    die();
} else {
    header("Location: acpref.php?s=s#theme");
    die();
} 

?>