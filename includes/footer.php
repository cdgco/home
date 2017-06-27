<?php
if (!mysql_query($sql)) {
    $merror = mysql_errno($link);
    header("Location: account.php?s=e&e=$merror");
    die();
} else {
    header("Location: account.php?s=s");
    die();
}
?>