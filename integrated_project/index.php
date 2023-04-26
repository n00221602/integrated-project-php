<?php 
    require_once "classes/story.php";
    require_once "classes/category.php";
    // $stories = Story::findAll();
    $leftHeadStories = Story::findAllLimitBy(2,0);
    $centreHeadStories = Story::findAllLimitBy(1,2);
    $rightHeadStories = Story::findAllLimitBy(2,3);
    $topStories = Story::findAllLimitBy(4,5);
    $categoryStories = Story::findAllLimitBy(3,9);
    $leftentertainmentStories = Story::findAllLimitBy(2,12);
    $rightentertainmentStories = Story::findAllLimitBy(2,14);
    $leftSportsStories = Story::findAllLimitBy(2,16);
    $rightSportsStories = Story::findAllLimitBy(2,18);
    $leftPoliticsStories = Story::findAllLimitBy(2,20);
    $rightPoliticsStories = Story::findAllLimitBy(2,22);
    
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
    <link rel="stylesheet" href="css/headline_stories.css">
    <link rel="stylesheet" href="css/top_stories.css">
    <link rel="stylesheet" href="css/category_picks.css">
    <link rel="stylesheet" href="css/entertainment.css">
    <link rel="stylesheet" href="css/sports.css">
    <link rel="stylesheet" href="css/politics.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">

    <title>Webpage</title>
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
    <!-- Headline stories -->
    <div class="headlineStories">
        <div class="container">
            <div class="section01 width-12">
                <h4>Politics<i class="fa-solid fa-circle"></i></h4>
                <h4>Entertainment<i class="fa-solid fa-circle"></i></h4>
                <h4>Sports</h4>
            </div>

            <div class="section02 width-3">
                <?php
                    $count = 1;
                    foreach ($leftHeadStories as $story) { ?>
                    
                    <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                    <?php if($count ==1){?>
                        <img src= "<?= $story->image ?>"  width="280" height="160">
                    <?php }?>
                    <p><?= $story->sub_heading; ?></p>
                    <h3>By <?= $story->author; ?></h3>
                        
                    <?php if($count ==1){?>
                        <hr color="#d1d1d1">
                    <?php }?>

                <?php  $count++; } ?>
            </div>
                            
             
            <div class="section03 width-6">
                <?php
                    foreach ($centreHeadStories as $story) { ?>
                    <img src= "<?= $story->image ?>"  width="585" height="390">
                    <h4> Recent news </h4>
                    <a href="article.php?id=<?= $story->id ?>"> <h1><?= $story->heading; ?></h1> </a>
                    <p><?= $story->sub_heading; ?> </p>
                <?php } ?>
            </div>

            <div class="section04 width-3">
                <?php
                    $count = 1;
                    foreach ($rightHeadStories as $story) { ?>
                    
                    <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                    <?php if($count ==1){?>
                        <img src= "<?= $story->image ?>"  width="280" height="160">
                    <?php }?>
                    <p><?= $story->sub_heading; ?></p>
                    <h3>By <?= $story->author; ?></h3>
                        
                    <?php if($count ==1){?>
                        <hr color="#d1d1d1">
                    <?php }?>

                <?php  $count++; } ?>
            </div>

            <div class="border width-5">
                <hr color="#ffb978">
            </div>

            <div class="text width-2">

                <h1>Top stories</h1>

            </div>

            <div class="border width-5">
                <hr color="#ffb978">
            </div>

        </div>
    </div>


    <!-- Top stories -->
    <div class="topStories">
        <div class="container">

                <?php
                    $count = 1;
                    foreach ($topStories as $story) { ?>
                    
                    <div class="sections width-3">
                    <h5><?php echo $count ?></h5>
                    <a href="article.php?id=<?= $story->id ?>"> <p><?= $story->heading; ?></p> </a>
                    </div>
                <?php $count++; } ?> 
        </div> 
    </div>

    <!-- Category picks -->
    <div class="categoryPicks">
        <div class="container">

            <?php
            foreach ($categoryStories as $story) { ?>
            <?php $category = Category::findById($story->category_id); ?>
                <div class="width-4">
                    <img src= "<?= $story->image ?>"  width="380" height="230">
                    <h4><?= $category->name; ?></h4>
                    <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                    <p><?= $story->sub_heading; ?> </p>
                    <h3>Published at <?= $story->publish_time; ?></h3>
                </div>
            <?php } ?> 
        </div>
    </div>

    <!-- Entertainment Section -->
    <div class="entertainment">
        <div class="container">
            <div class="width-12">
                <h6>Entertainment</h6>
            </div>

            <div class="section01 width-6">
                <?php
                    foreach ($leftentertainmentStories as $story) { ?>
                        <div class="block block01 img1 width-3">
                            <img src= "<?= $story->image ?>"  width="245" height="160">

                            <div class="text width-3">
                            <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                                <p><?= $story->sub_heading; ?> </p>
                                <h3>By <?= $story->author; ?></h3>
                            </div>
                        </div>
                <?php } ?> 
            </div>

            <div class="section02 width-6">
                <?php
                    $count = 1;
                    foreach ($rightentertainmentStories as $story) { ?>
                        <div class="">
                            <?php if($count>1) { ?>
                                <hr>
                           <?php } ?>
                           <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                            <p><?= $story->sub_heading; ?> </p>
                            <h3>By <?= $story->author; ?></h3>
                            
                        </div>
                <?php $count++; } ?> 
            </div>
        </div>
    </div>


    <!-- Sports Section -->
    <div class="sports">
        <div class="container">
            <div class="width-12">
                <h6>Sports</h6>
            </div>

            <div class="section02 width-6">
                <?php
                    $count = 1;
                    foreach ($leftSportsStories as $story) { ?>
                        <div class="">
                            <?php if($count>1) { ?>
                                <hr>
                           <?php } ?>
                           <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                            <p><?= $story->sub_heading; ?> </p>
                            <h3>By <?= $story->author; ?></h3>
                            
                        </div>
                <?php $count++; } ?> 
            </div>

            <div class="section01 width-6">
                <?php
                    foreach ($rightSportsStories as $story) { ?>
                        <div class="block block01 img1 width-3">
                            <img src= "<?= $story->image ?>" width="245" height="160">

                            <div class="text width-3">
                            <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                                <p><?= $story->sub_heading; ?> </p>
                                <h3>By <?= $story->author; ?></h3>
                            </div>
                        </div>
                <?php } ?> 
            </div>
        </div>  
    </div>
    <!-- Politics Section -->
    <div class="politics">
        <div class="container">
            <div class="width-12">
                <h6>Politics</h6>
            </div>

            <div class="section01 width-6">
                <?php
                    foreach ($leftPoliticsStories as $story) { ?>
                        <div class="block block01 img1 width-3">
                            <img src= "<?= $story->image ?>"  width="245" height="160">

                            <div class="text width-3">
                            <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                                <p><?= $story->sub_heading; ?> </p>
                                <h3>By <?= $story->author; ?></h3>
                            </div>
                        </div>
                <?php } ?> 
            </div>

            <div class="section02 width-6">
                <?php
                    $count = 1;
                    foreach ($rightPoliticsStories as $story) { ?>
                        <div class="">
                            <?php if($count>1) { ?>
                                <hr>
                           <?php } ?>
                           <a href="article.php?id=<?= $story->id ?>"> <h2><?= $story->heading; ?></h2> </a>
                            <p><?= $story->sub_heading; ?> </p>
                            <h3>By <?= $story->author; ?></h3>
                            
                        </div>
                <?php $count++; } ?> 
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
                <h2>About us</h2>
                <a href="#"><h4>Recruitment</h4></a>
                <a href="#"><h4>Subscription info</h4></a>
                <a href="#"><h4>Advertisements</h4></a>
                <a href="#"><h4>Our team</h4></a>
            </div>

        </div>
    </footer>

</body>

</html>