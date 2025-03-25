<?php
$host= 'localhost';
$db_name='ticketingsys';
$username='root';
$password='';

try {
    $conn = new PDO("mysql:host=$host;dbname=$ticketing", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
 }
?>