<?php
session_start();

include_once 'functions.php';
require_once 'connect.php';


if (isset($_SESSION['id'])) {
    header("Location: welcome.php?error=already-registered");
    die();
}


if (isset($_POST['submit'])) {
    checkRegisterFields();
    checkRegisterEmail();
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone-number'];
    $noOfEmployees = $_POST['no-of-employees'];
    $sector = $_POST['sector'];
    $message = $_POST['text-area'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam('email', $email);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {

        $sql = "INSERT INTO users(name, lastname, password, company, email, phone_number, no_of_employees, sector, message) 
                VALUES (:name, :lastname, :password, :company, :email, :phone_number, :no_of_employees, :sector, :message)";

        $stmt = $pdo->prepare($sql);

        $data = ['name' => $name, 'lastname' => $lastname, 'password' => $password, 'company' => $company, 'email' => $email, 'phone_number' => $phoneNumber, 'no_of_employees' => $noOfEmployees, 'sector' => $sector, 'message' => $message];
        $result = $stmt->execute($data);

        if ($result) {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email' => $email]);

            $userCount = $stmt->rowCount();

            if ($userCount == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id'] = $user['id'];
                $_SESSION['user_type'] = $user['user_type'];
                header("Location: welcome.php");
                die();
            }
        }

        logMessage(json_encode($stmt->errorInfo()));
        header("Location: register.php?error=general");
        die();
    } else {
        header("Location: register.php?error=emailregistered");
        die();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Register Page</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/register.css">
</head>

<body>
    <div class="container-fluid">
        <div class="reg_container col-md-4 col-md-offset-4">
            <h3 class="text-center">Регистрирај се</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Име *</label>
                    <input type="text" class="form-control" id="name" placeholder="Име" name="name">
                </div>
                <div class="form-group">
                    <label for="lastname">Презиме *</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Презиме" name="lastname">
                </div>
                <div class="form-group">
                    <label for="company">Компанија *</label>
                    <input type="text" class="form-control" id="company" placeholder="Компанија" name="company">
                </div>
                <div class="form-group">
                    <label for="email">email *</label>
                    <input type="email" class="form-control" id="email" placeholder="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Лозинка *</label>
                    <input type="password" class="form-control" id="password" placeholder="Лозинка" name="password">
                </div>
                <div class="form-group">
                    <label for="phone-number">Телефонски број *</label>
                    <input type="text" class="form-control" id="phone-number" placeholder="Телефонски број" name="phone-number">
                </div>
                <div class="form-group">
                    <label for="no-of-employees">Број на вработени *</label>
                    <select class="form-control" id="no-of-employees" name="no-of-employees">
                        <option value="1">1</option>
                        <option value="2-10">2-10</option>
                        <option value="11-50">11-50</option>
                        <option value="51-200">51-200</option>
                        <option value="200+">200+</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sector">Сектор *</label>
                    <select class="form-control" id="sector" name="sector">
                        <option value="hr">Човечки ресурси</option>
                        <option value="marketing">Маркетинг</option>
                        <option value="product">Продукт</option>
                        <option value="sales">Продажба</option>
                        <option value="ceo">СЕО</option>
                        <option value="other">Друго</option>
                    </select>
                </div>
                <label for="text-area">Порака</label>
                <textarea class="form-control" rows="3" id="text-area" name="text-area"></textarea>
                <div>
                    <button type="submit" class="btn my_btn btn_yellow pull-right" name="submit">Регистрирај се</button>
                    <a class="btn my_btn btn_yellow pull-right" href="index.php">Назад</a>
                </div>
            </form>
        </div>
    </div>
</body>

<html>