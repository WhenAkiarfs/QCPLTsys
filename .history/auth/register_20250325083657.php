<?php   
include 'config.php;';
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $USERNAME = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = 'INSERT INTO t_admin ';
}
?>