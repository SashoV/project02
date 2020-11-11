<?php
session_start();
require_once 'functions.php';
require_once 'connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        checkModalEmail();
        isEmailValid();

        $email = $_POST['email'];
        $gameId = $_POST['game-id'];
        $_SESSION["email"] = $email;

        $sql = "SELECT * FROM email_list WHERE email = :email";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam('email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $sql = "INSERT INTO email_list (email) VALUES (:email)";

            $stmt = $pdo->prepare($sql);
            $data = ['email' => $email];
            $result = $stmt->execute($data);

            if ($result) {
                header("Location: game.php?success=true&game-id=$gameId");
                die();
            }
        }
        header("Location: game.php?game-id=$gameId");
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
    <title>Brainster ToolBox | Home</title>
    <script src="https://kit.fontawesome.com/e0b18861b4.js" crossorigin="anonymous"></script>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/filter.css" rel="stylesheet">
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
        <p class="header_p_mobile">Изработено од студенти од академијата за програмирање на <a href="https://www.brainster.co">Brainster</a></p>
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
    <div id="all_content">
        <div class="main">
            <div id="background_diagonal_container">
                <div id="background_diagonal_part1">
                    <p class="header_p_desktop">Изработено од студенти од академијата за програмирање
                        на <a href="https://www.brainster.co">Brainster</a></p>
                    <h1 class="title">Future-proof your organization</h1>
                    <p class="subtitle">Find out how to unlock progress in your business. Understand your
                        curent state, identify opportunity areas and prepare to take charge
                        of your organization's future.</p>
                    <a href="https://brainsterquiz.typeform.com/to/kC2I9E" class="my_btn btn_yellow btn_assess">Take the assessment</a>
                    <div class="filter container" id="top_filter">
                        <div class="col-md-6 col-sm-6 col-xs-12" id="by_category">
                            <p>Категорија</p>
                            <div class="col-md-4 col-sm-4 col-xs-6"><input type="checkbox" name="card-category" class="checkBtn" id="action" hidden><label for="action">Акција</label></div>
                            <div class="col-md-4 col-sm-4 col-xs-6"><input type="checkbox" name="card-category" class="checkBtn" id="inovation" hidden><label for="inovation">Иновација</label></div>
                            <div class="col-md-4 col-sm-4 col-xs-6"><input type="checkbox" name="card-category" class="checkBtn" id="lidership" hidden><label for="lidership">Лидерство</label></div>
                            <div class="col-md-4 col-sm-4 col-xs-6"><input type="checkbox" name="card-category" class="checkBtn" id="team" hidden><label for="team">Тим</label></div>
                            <div class="col-md-4 col-sm-4 col-xs-6"><input type="checkbox" name="card-category" id="all" onclick="uncheckAll()" hidden><label for="all">Сите</label></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12" id="by_time_frame">
                            <p>Временска рамка</p>
                            <div class="col-md-6 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="5_30" hidden><label for="5_30">5-30</label></div>
                            <div class="col-md-6 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="30_60" hidden><label for="30_60">30-60</label></div>
                            <div class="col-md-6 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="30_120" hidden><label for="30_120">30-120</label></div>
                            <div class="col-md-6 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="60_120" hidden><label for="60_120">60-120</label></div>
                            <div class="col-md-6 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="60_240" hidden><label for="60_240">60-240</label></div>
                            <div class="col-md-6 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="120_240" hidden><label for="120_240">120-240</label></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12" id="by_group_size">
                            <p>Големина на група</p>
                            <div class="col-md-4 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="2_10" hidden><label for="2_10">2-10</label></div>
                            <div class="col-md-4 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="2_40" hidden><label for="2_40">2-40</label></div>
                            <div class="col-md-4 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="3_40" hidden><label for="3_40">3-40</label></div>
                            <div class="col-md-4 col-sm-6 col-xs-4"><input type="checkbox" name="card-category" class="checkBtn" id="2_40p" hidden><label for="2_40p">2-40+</label></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12" id="get-cards">
                            <p class="invisible">.</p>
                            <div class="col-md-12 col-sm-12 col-xs-12"><button id="btn-get-cards">Барај</button></div>
                        </div>
                    </div>

                </div>
                <div id="background_diagonal_part2"></div>
            </div>
        </div>
        <div class="container cards" id="container_cards">

            <?php

            $data = $pdo->query("SELECT * FROM games")->fetchAll();

            foreach ($data as $row) {
                $href = "#myModal";

                if (isset($_SESSION['email'])) {
                    $href = "game.php?game-id=" . $row['id'] . "";
                }

                echo '
                    <div class="col-sm-6 col-md-4 col-lg-4 my-card ' . $row['time_frame'] . ' ' . $row['category'] . ' ' . $row['group_size'] . '">
                    <a id="' . $row['id'] . '" data-toggle="modal" href="' . $href . '" onClick="saveId(this.id)">
                    <div class="thumbnail my-thumbnail">
                        <img src="media/images/' . $row['img_url'] . '" alt="" id="card-image">
                    <div class="caption">
                    <div class="float-left">
                        <p><b>' . $row['headline'] . '</b></p>
                        <p>Категорија: <span class="pastel_blue">' . $row['category'] . '</span></p>
                    </div>
                    <img src="media/icons/' . $row['icon_url'] . '" alt="" width="50px" class="float-right">
                    <p class="clear-both duration"><i class="far fa-clock fa-lg"></i><b>Времетраење</b></p>
                    <p class="card_time">' . $row['time_frame'] . ' минути</p>
                    </div>
                    </div>
                    </a>
                    </div>';
            }
            ?>

        </div>
        <div id="filter_bottom">

        </div>

        <div id="bottom">
            <div id="background_diagonal_container_bottom">
                <div id="background_diagonal_part2_bottom"></div>
                <div id="background_diagonal_part1_bottom">
                    <h1 class="title" id="title_bottom">Future-proof your organization</h1>
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="modal-title text-center" id="myModalLabel">Please enter your email</h4>
                        <form action="" method="Post" class="text-right">
                            <input type="text" name="game-id" id="hidden" hidden>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"><br>
                            <button type="submit" name="submit" class="btn btn-primary" id="modal-btn">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
<script src="jquery.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script src="index.js"></script>

<html>