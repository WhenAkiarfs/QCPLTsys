<?php
$host= 'localhost';
$db_name='ticketingsys';
$username='root';
$password='';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) }
?>