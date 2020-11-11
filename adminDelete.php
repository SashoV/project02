<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['id']) || $_SESSION['user_type'] !== "1") {
    header("Location: index.php");
    die();
}


$userId = $_SESSION['id'];
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=:id LIMIT 1";
$stmt = $pdo->prepare($sql);


if ($stmt->execute(['id' => $id])) {
    header("Location: admin.php?status=deleted-user");
    die();
}
