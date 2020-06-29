<?php require('includes/dbchange.php'); 

$result = $_POST['newclock'];
            $result_explode = explode('|', $result);
            $clock = $result_explode[0];
            $clockname = $result_explode[1];

$sql = sprintf("UPDATE `members` SET `clock` = '%s', `clockname` = '%s' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $clock),
            mysqli_real_escape_string($link, $clockname),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#clock");
    die();
} else {
    header("Location: acpref.php?s=s#clock");
    die();
}

?>