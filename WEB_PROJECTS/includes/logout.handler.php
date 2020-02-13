<?php
    session_start();
    unset($_SESSION["useridmail"]);
    session_destroy();
    header("Location: ../loginPage.php");
    exit();
?>