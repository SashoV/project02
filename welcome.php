<?php
session_start();
require_once 'connect.php';
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch();
} else {
    header("Location: login.php");
    die();
}
if($_SESSION['user_type'] == 1) {
    $adminBtn = '<a class="btn my_btn btn_black" href="admin.php">Админ Панел</a>';
} else {
    $adminBtn = "";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Brainster ToolBox | Home</title>
    <script src="https://kit.fontawesome.com/e0b18861b4.js" crossorigin="anonymous"></script>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="styles/welcome.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="pull-left"><?= $user['name'] . " " . $user['lastname']; ?></h1>
            <a class="btn my_btn btn_yellow pull-right" href="logout.php">Одлогирај ме</a>
            <a class="btn my_btn btn_yellow pull-right" href="index.php">Назад кон почетна</a>
        </div>
        <div>
            <p>email: <?= $user['email']; ?></p>
            <p>Phone number: <?= $user['phone_number']; ?></p>
            <p>Company: <?= $user['company']; ?></p>
            <p>Number of employees: <?= $user['no_of_employees']; ?></p>
            <p>Sector: <?= $user['sector']; ?></p>
            <div class="div"><span>Порака:</span>
                <p class="message text-justify"><?= $user['message']; ?></p>
            </div>
            <a class="btn my_btn btn_yellow" href="edit.php">Измени податоци</a>
            <a class="btn my_btn btn_black" href="delete.php">Избриши профил</a>
            <?= $adminBtn ?>
        </div>
    </div>
</body>

</html>