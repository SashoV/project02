<?php 
session_start();
require_once 'connect.php';

if (!isset($_SESSION['id'])) { 
    header("Location: index.php");
    die();
}

$userId = $_SESSION['id'];

$sql = "DELETE FROM users WHERE id=:id LIMIT 1";
$stmt = $pdo->prepare($sql);


if($stmt->execute(['id' => $userId])) {
    session_destroy();
    header("Location: index.php?status=deleted-profile");
    die();
} 
