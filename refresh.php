<?php require('includes/dbchange.php'); 

$result = $_POST['rtime'];
            $result_explode = explode('|', $result);
            $refresh = $result_explode[0];
            $refreshname = $result_explode[1];

$sql = sprintf("UPDATE `members` SET `refresh` = '%s', `refreshname` = '%s' WHERE `memberID` = '%s'",
            mysql_real_escape_string($refresh),
            mysql_real_escape_string($refreshname),
            mysql_real_escape_string($memid));

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#refresh");
    die();
} else {
    header("Location: acpref.php?s=s#refresh");
    die();
}
?>