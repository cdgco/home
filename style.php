<?php require('includes/dbchange.php'); 

$style = $_POST['style'];

$sql = sprintf("UPDATE members SET style = '%s' WHERE memberID = '%s'",
            mysqli_real_escape_string($link, $style),
            mysqli_real_escape_string($link, $memid));

if (!mysqli_query($link, $sql)) {
    $merror = mysqli_errno($link);
    header("Location: acpref.php?s=e&e=$merror#theme");
    die();
} else {
    header("Location: acpref.php?s=s#theme");
    die();
} 

?>