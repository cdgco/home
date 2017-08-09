<?php require('includes/dbchange.php'); 

$token = $_POST['token'];

$token2 = explode('=', $token);

$token3 = $token2[0];

$sql = sprintf("UPDATE members SET token = '%s', tstat = 'y' WHERE memberID = '%s'",
            mysql_real_escape_string($token3),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
$merror = mysql_errno($link);
    header("Location: account.php?s=e&e=$merror");
die(); 
}

else {header("Location: qauth3.php");
die();}

?>