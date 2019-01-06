
 <?php

include_once 'header.php';
?>

<?php

if (isset($_POST['submit'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}