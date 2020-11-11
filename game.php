<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['email']) || filter_var($_GET['game-id'], FILTER_VALIDATE_INT) === false || $_GET['game-id'] < 1 || $_GET['game-id'] > 18) {
    header("Location: index.php");
    die();
}

$data = $pdo->query("SELECT * FROM games WHERE id = " . $_GET['game-id'] . "");
foreach ($data as $row) {
    $headline = $row['headline'];
    $category = $row['category'];
    $timeFrame = $row['time_frame'];
    $groupSize = $row['group_size'];
    $facLevel = $row['fac_level'];
    $gameText = $row['game_text'];
    $materials = $row['materials'];
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
    <link href="styles/game.css" rel="stylesheet">
</head>

<body>
    <div class="my_navbar">
        <div class="hamb_menu">
            <div class="hamb_icon" onclick="openNav()">
                <div class="hamb_line"></div>
                <div class="hamb_line"></div>
                <div class="hamb_line"></div>
            </div>
            <span class="hamb_icon_text" onclick="openNav()">Мени</span>
        </div>
        <a href="index.php"><img class="logo" src="media/images/logo.png"></a>
        <div class="nav_buttons">
            <a href="https://www.brainster.io/business" class="my_btn btn_yellow">Обуки за компании</a>
            <a href="https://www.brainster.io/business" class="my_btn btn_black">Вработи наши студенти</a>
        </div>
    </div>
    <div id="myNav" class="overlay">
        <div class="menu_header">
            <a href="index.php"><img class="menu_logo" src="media/images/logo.png"></a>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                <i class="fas fa-times fa-2x"></i>
                <span class="close_menu">Затвори</span>
            </a>
        </div>
        <div class="overlay_content">
            <a href="register.php" class="gold">Регистрирај се</a>
            <a href="login.php" class="gold">Најави се</a>
            <a href="register.php">Регистрирај се</a>
            <a href="about.php">За нас</a>
            <a href="https://www.facebook.com/pg/brainster.co/photos/">Галерија</a>
            <a href="contact.php">Контакт</a>
        </div>
    </div>

    <div class="header">
        <div id="background_diagonal_container">
            <div id="background_diagonal_part1"></div>
            <div id="background_diagonal_part2"></div>
        </div>
    </div>

    <div class="main_content container">
        <h1><?= $headline ?></h1>
        <div class="game-info">
            <div class="row">
                <div class="col-md-3"><i class="far fa-clock fa-lg"></i><strong>Временска рамка</strong>
                    <p><?= $timeFrame ?></p>
                </div>
                <div class="col-md-3"><i class="fas fa-user-friends fa-lg"></i><strong>Големина на група</strong>
                    <p><?= $groupSize ?></p>
                </div>
                <div class="col-md-3"><i class="fas fa-university fa-lg"></i><strong>Ниво за фасилитирање</strong>
                    <p><?= $facLevel ?></p>
                </div>
                <div class="col-md-3 materials"><i class="fas fa-paint-roller fa-lg"></i><strong>Материјали</strong>
                    <p><?= $materials ?></p>
                </div>
            </div>
        </div>
        <div><?= $gameText ?></div>
    </div>

    <div id="bottom">
        <div id="background_diagonal_container_bottom">
            <div id="background_diagonal_part2_bottom"></div>
            <div id="background_diagonal_part1_bottom">
                <h1 class="title">Future-proof your organization</h1>
                <p class="subtitle">Find out how to unlock progress in your business. Understand your
                    curent state, identify opportunity areas and prepare to take charge
                    of your organization's future.</p>
                <a href="https://brainsterquiz.typeform.com/to/kC2I9E" class="my_btn btn_yellow btn_assess">Take the assessment</a>
            </div>
        </div>
        <div id="footer" class="text-center">
            <div class="social">
                <a href="https://www.linkedin.com/school/brainster-co/" target="_blank"><i class="fab fa-linkedin-in fa-2x"></i></a>
                <a href="https://twitter.com/BrainsterCo" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="https://www.facebook.com/brainster.co" target="_blank"><i class="fab fa-facebook-f fa-2x"></i></a>
            </div>
            <a href="index.php"><img class="logo_bottom" src="media/images/logo.png"></a>
            <div class="aboutus">
                <a href="about.php">За нас</a>
                <a href="contact.php">Контакт</a>
                <a href="https://www.facebook.com/pg/brainster.co/photos/">Галерија</a>
            </div>
        </div>
    </div>

    <?php

    ?>


    <script src="jquery.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="index.js"></script>
</body>

<html>