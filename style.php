<?php require('includes/dbchange.php'); 

$style = $_POST['style'];

$sql = sprintf("UPDATE members SET style = '%s' WHERE memberID = '%s'",
            mysql_real_escape_string($style),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#theme");
    die();
} else {
    header("Location: acpref.php?s=s#theme");
    die();
} 

?>