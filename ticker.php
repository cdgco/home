<?php require('includes/dbchange.php'); 

$stocks = $_POST['stocks'];

if (isset($stocks)) {

$sql = sprintf("UPDATE `members` SET `stocks` = '%s' WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $stocks),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    header("Location: accontent.php?s=e#stock");
die(); 
}
else { header("Location: accontent.php?s=s#stock");
die(); }
}

if (empty($stocks)) {

$sql = sprintf("UPDATE `members` SET  `stocks` = NULL WHERE `memberID` = '%s'",
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    header("Location: accontent.php?s=e#stock");
die(); 
}

else { header("Location: accontent.php?s=s#stock");
die(); }

}

?>