<?php require('includes/dbchange.php'); 

$result = $_POST['newsource'];
            $result_explode = explode('|', $result);
            $source = $result_explode[0];
            $sourcename = $result_explode[1];

$sql = "UPDATE `members` SET `newsource` = '$source', `sourcename` = '$sourcename' WHERE `memberID` = '$memid'";


if (!mysqli_query($link, $sql)) {
    $merror = mysqli_errno($link);
    header("Location: accontent.php?s=e&e=$merror#news");
    die();
} else {
    header("Location: accontent.php?s=s#news");
    die();
} 
?>