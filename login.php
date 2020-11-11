<?php
session_start();
include_once 'connect.php';
require_once 'functions.php';

if (isset($_SESSION['id'])) {
    header("Location: welcome.php");
    die(); 
}

if (isset($_POST['submit'])) {
    checkLoginFields();
    checkLoginEmail();
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);

    $userCount = $stmt->rowCount();

    if ($userCount == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $user['id'];
        $_SESSION['user_type'] = $user['user_type'];
        header("Location: welcome.php");
        die();
    }

    header("Location: login.php?error=wrongcredentials");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Login Page</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <div class="container-fluid">
        <div class="login_container col-md-4 col-md-offset-4">
            <h3 class="text-center">Најави се</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" placeholder="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Лозинка</label>
                    <input type="password" class="form-control" id="password" placeholder="Лозинка" name="password">
                </div>
                <div>
                    <button type="submit" class="btn my_btn btn_yellow pull-right" name="submit">Најави се</button>
                    <a class="btn my_btn btn_yellow pull-right" href="index.php">Назад</a>
                </div>
            </form>
        </div>
    </div>
</body>

<html>