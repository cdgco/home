<?php require('includes/dbchange.php'); 

function generateRandomString($length = 5) {
    return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}

$eventname = generateRandomString();

$sql = "CREATE EVENT expiration_$eventname ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR ON COMPLETION NOT PRESERVE ENABLE DO UPDATE members SET token = NULL, tstat = 'n' WHERE memberID = '$memid'";

if (!mysql_query($sql)) {
$merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#gmail");
die(); 
}

else {header("Location: index.php");
die();} 

?>