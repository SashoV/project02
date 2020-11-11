<?php
include_once 'functions.php';

$user = "root";
$password = "root";

try {
    $pdo = new PDO("mysql:dbname=project_2;charset=utf8;host=localhost;", $user, $password);
} catch (PDOException $e) {
    logMessage($e->getMessage());
    header("Location: index.php?error=general");
    die();
}


