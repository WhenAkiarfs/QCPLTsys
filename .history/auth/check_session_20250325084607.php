<?php
session_start();
if (!isset($_SESSION['UserId'])) {
    header('Location: ../public/index.php');
    exit();
}
?>
