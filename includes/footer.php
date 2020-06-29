<?php
if (!mysqli_query($link, $sql)) {
    $merror = mysqli_errno($link);
    header("Location: account.php?s=e&e=$merror");
    die();
} else {
    header("Location: account.php?s=s");
    die();
}
?>