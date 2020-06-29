<?php require('includes/dbchange.php'); 

$token = $_POST['token'];

$token2 = explode('=', $token);

$token3 = $token2[0];

$sql = sprintf("UPDATE members SET token = '%s', tstat = 'y' WHERE memberID = '%s'",
            mysqli_real_escape_string($link, $token3),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
$merror = mysqli_errno($link);
    header("Location: account.php?s=e&e=$merror");
die(); 
}

else {header("Location: qauth3.php");
die();}

?>