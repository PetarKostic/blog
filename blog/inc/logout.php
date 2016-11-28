<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['level']);
unset($_SESSION['vreme']);
session_destroy();
header('location: ../index.php');
?>