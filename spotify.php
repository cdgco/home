<?php require('includes/dbchange.php'); 

$spotify = $_POST['spotify'];
$spotname = $_POST['spotname'];

$sql = sprintf("UPDATE `members` SET `spotify` = '%s', `spotname` = '%s' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $spotify),
            mysqli_real_escape_string($link, $spotname),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    $merror = mysqli_errno($link);
    header("Location: accontent.php?s=e&e=$merror#spotify");
    die();
} else {
    header("Location: accontent.php?s=s#spotify");
    die();
}

?>