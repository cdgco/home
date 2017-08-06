<?php require('includes/dbchange.php'); 

$spotify = $_POST['spotify'];
$spotname = $_POST['spotname'];

$sql = "UPDATE `members` SET `spotify` = '$spotify', `spotname` = '$spotname' WHERE `memberID` = '$memid'";


if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: accontent.php?s=e&e=$merror#spotify");
    die();
} else {
    header("Location: accontent.php?s=s#spotify");
    die();
}

?>