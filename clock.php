<?php require('includes/dbchange.php'); 

$result = $_POST['newclock'];
            $result_explode = explode('|', $result);
            $clock = $result_explode[0];
            $clockname = $result_explode[1];

$sql = sprintf("UPDATE `members` SET `clock` = '%s', `clockname` = '%s' WHERE `memberID` = '%s'",
            mysql_real_escape_string($clock),
            mysql_real_escape_string($clockname),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#clock");
    die();
} else {
    header("Location: acpref.php?s=s#clock");
    die();
}

?>