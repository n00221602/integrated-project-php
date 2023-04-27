<?php
require_once "etc/config.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }
    if (!array_key_exists("id", $_GET)) {
        throw new Exception("Invalid request--missing id");
    }
    $id = $_GET["id"];
    $story = Story::findById($id);
    if ($story === null) {
        throw new Exception("Invalid request--unknown id");
    }
}
catch (Exception $ex) {
    die($ex->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Suez+One&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/article.css">

    <title>Article</title>
</head>

<header>
    <div class="container">
        <div class="menu width-1">
            <i class="fa-solid fa-bars"></i>
            <h7>Menu</h7>
        </div>
        <div class="title width-5">
            <h1>Newspage Website</h1>
        </div>
        <div class="search width-6">
            <h7>Search...</h7><i class="fa-solid fa-magnifying-glass"></i>
        </div>
    </div>
</header>

<body>
    <div class="articlePage">
        <div class="container">
            <div class="section01 width-12">
                <img src= "images/<?= $story->image ?>"  width="810" height="460"> <!-- Image -->
            </div>

            <div class="section02 width-12">
                <h2><?= $story->heading; ?></h2> <!-- Heading -->
            </div>

            <div class="section03 width-12">
                <p><?= $story->sub_heading; ?></p> <!-- Sub heading -->
            </div>

            <div class="section04 width-12">
                <h3>By <?= $story->author; ?></h3> <!-- Author -->
            </div>

            <div class="section05 width-6">
                <h3>Date: <?= $story->publish_date ?> </h3> <!-- Date -->
            </div>

            <div class="section06 width-6">
                <h3>Time: <?= $story->publish_time ?> </h3> <!-- Time -->
            </div>

            <div class="article width-12">
                <p><?= $story->article ?></p> <!-- Article -->
            </div>

        </div>
    </div>

   



    </div>

    <footer>
        <div class="container">
            <div class="blocks block01 width-3">
                <h2>About us</h2>
                <a href="#"><h4>Recruitment</h4></a>
                <a href="#"><h4>Subscription info</h4></a>
                <a href="#"><h4>Advertisements</h4></a>
                <a href="#"><h4>Our team</h4></a>
            </div>

            <div class="blocks block02 width-3">
                <h2>Support</h2>
                <a href="#"><h4>Help centre</h4></a>
                <a href="#"><h4>Donations</h4></a>
                <a href="#"><h4>Contact us</h4></a>
                <a href="#"><h4>Contact preferences</h4></a>
            </div>

            <div class="blocks block03 width-3">
                <h2>Follow our socials</h2>
                <a href="#"><h4><i class="fa-brands fa-youtube"></i>Youtube</h4></a>
                <a href="#"><h4><i class="fa-brands fa-facebook"></i>Facebook</h4></a>
                <a href="#"><h4><i class="fa-brands fa-twitter"></i>Twitter</h4></a>
                <a href="#"><h4><i class="fa-brands fa-linkedin"></i>Linkedin</h4></a>
            </div>

            <div class="blocks block04 width-3">
                <h2>Other</h2>
                <a href="admin/index.php"><h4>My Admin</h4></a>
                <a href="#"><h4>Terms and conditions</h4></a>
                <a href="#"><h4>Privacy policy</h4></a>
                <a href="#"><h4>Account settings</h4></a>
            </div>

        </div>
    </footer>
</body>

</html>