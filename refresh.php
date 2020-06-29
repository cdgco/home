<?php require('includes/dbchange.php'); 

$result = $_POST['rtime'];
            $result_explode = explode('|', $result);
            $refresh = $result_explode[0];
            $refreshname = $result_explode[1];

$sql = sprintf("UPDATE `members` SET `refresh` = '%s', `refreshname` = '%s' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $refresh),
            mysqli_real_escape_string($link, $refreshname),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    $merror = mysqli_errno($link);
    header("Location: acpref.php?s=e&e=$merror#refresh");
    die();
} else {
    header("Location: acpref.php?s=s#refresh");
    die();
}
?>