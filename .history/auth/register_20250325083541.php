<?php   
include 'config.php;';
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $USERNAME = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}
?>