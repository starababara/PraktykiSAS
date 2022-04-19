<?php
    session_start();
    unset($_SESSION['logId']);
    header("Location: admin.php");
?>