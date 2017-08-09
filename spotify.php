<?php require('includes/dbchange.php'); 

$spotify = $_POST['spotify'];
$spotname = $_POST['spotname'];

$sql = sprintf("UPDATE `members` SET `spotify` = '%s', `spotname` = '%s' WHERE `memberID` = '%s'",
            mysql_real_escape_string($spotify),
            mysql_real_escape_string($spotname),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: accontent.php?s=e&e=$merror#spotify");
    die();
} else {
    header("Location: accontent.php?s=s#spotify");
    die();
}

?>