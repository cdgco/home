<?php require('includes/dbchange.php'); 

$result = $_POST['newclock'];
            $result_explode = explode('|', $result);
            $clock = $result_explode[0];
            $clockname = $result_explode[1];



$sql = "UPDATE `members` SET `clock` = '$clock', `clockname` = '$clockname' WHERE `memberID` = '$memid'";

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#clock");
    die();
} else {
    header("Location: acpref.php?s=s#clock");
    die();
}

?>