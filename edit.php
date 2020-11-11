<?php
session_start();
require_once 'connect.php';
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        $userId = $_SESSION['id'];
        $newName = $_POST['name'];
        $newLastname = $_POST['lastname'];
        $newCompany = $_POST['company'];
        $newEmail = $_POST['email'];
        $newPhoneNumber = $_POST['phone-number'];
        $newNoOfEmployees = $_POST['no-of-employees'];
        $newSector = $_POST['sector'];
        $newMessage = $_POST['text-area'];


        $sql = "UPDATE users SET name=:name, lastname=:lastname, company=:company, email=:email, phone_number=:phone_number, no_of_employees=:no_of_employees, sector=:sector, message=:message WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        $data = ['name' => $newName, 'lastname' => $newLastname, 'company' => $newCompany, 'email' => $newEmail, 'phone_number' => $newPhoneNumber, 'no_of_employees' => $newNoOfEmployees, 'sector' => $newSector, 'message' => $newMessage, 'id' => $userId];

        if ($stmt->execute($data)) {
            header("Location: welcome.php?status=success");
            die();
        }

        header("Location: edit.php?status=error");
        die();
    }
} 

$userId = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $userId]);
$row = $stmt->fetch();

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
    <link href="styles/edit.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="text-center">Промени ги податоците</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Име</label>
                    <input type="text" class="form-control" id="name" value="<?= $row['name'] ?>" name="name">
                </div>
                <div class="form-group">
                    <label for="lastname">Презиме</label>
                    <input type="text" class="form-control" id="lastname" value="<?= $row['lastname'] ?>" name="lastname">
                </div>
                <div class="form-group">
                    <label for="company">Компанија</label>
                    <input type="text" class="form-control" id="company" value="<?= $row['company'] ?>" name="company">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" value="<?= $row['email'] ?>" name="email">
                </div>
                <div class="form-group">
                    <label for="phone-number">Телефонски број</label>
                    <input type="text" class="form-control" id="phone-number" value="<?= $row['phone_number'] ?>" name="phone-number">
                </div>
                <div class="form-group">
                    <label for="no-of-employees">Број на вработени</label>
                    <select class="form-control" id="no-of-employees" name="no-of-employees">
                        <option value="1">1</option>
                        <option value="2-10">2-10</option>
                        <option value="11-50">11-50</option>
                        <option value="51-200">51-200</option>
                        <option value="200+">200+</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sector">Сектор</label>
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
                <textarea class="form-control" rows="3" id="text-area" name="text-area"><?= $row['message'] ?></textarea>
                <div>
                    <button type="submit" class="btn my_btn btn_yellow pull-right" name="submit">Зачувај ги промените</button>
                    <a class="btn my_btn btn_yellow pull-right" href="welcome.php">Назад</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>