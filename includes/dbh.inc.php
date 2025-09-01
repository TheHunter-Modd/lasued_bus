<?php

$host = 'localhost';
$dbname = 'lasued_bus';
$dbusername = 'root';
$dbpassword = 'Hunter08155726750';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $dbusername, $dbpassword);
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}