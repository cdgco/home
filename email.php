<?php require('includes/dbchange.php'); 

$newemail = $_POST['changeemail'];

$sql = "UPDATE `members` SET `email` = '$newemail' WHERE `memberID` = '$memid'";

if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: acpref.php?s=e&e=$merror#email");
    die();
} else {
    header("Location: acpref.php?s=s#email");
    die();
} 

?>