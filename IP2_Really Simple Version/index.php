<?php 
    require_once "classes/story.php";
    require_once "classes/category.php";
    $stories = Story::findAll();
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
                <h2>Electric Ireland to cut prices for businesses but not households</h2>
                <img src="images/01-Electric Ireland.png">
                <p>The State's largest electricity supplier has been called on to cut its prices for households after
                    reducing energy costs for businesses.</p>
                <h3>By Charlie Weston</h3>

                <hr color="#d1d1d1">

                <h2>The last US-Russia arms control treaty is in big trouble</h2>
                <p>Russian President Vladimir Putin delivers his annual state of the nation address at the Gostiny Dvor
                    conference centre in central Moscow on February 21, 2023.</p>
                <h3>By Jen Kirby</h3>
            </div>

            <div class="section03 width-6">
                <img src="images/03-What can the world learn from China.png">
                <h4>Recent news</h4>
                <h1>What can the world learn from China's “zero-Covid” lockdown?</h1>
                <p>Volunteers deliver food supplies to residents at a gated community after Shanghai imposed a citywide
                    lockdown to halt the spread of Covid-19 on April 8, 2022 in Shanghai, China.</p>
            </div>

            <div class="section04 width-3">
                <h2>Lawyers won't compromise on police reform. </h2>
                <img src="images/04-Lawmakers won’t compromise.png">
                <p>New calls for police reform face old Democratic and Republican divisions in Congress.</p>
                <h3>By Nicole Narea and Li Zhou</h3>

                <hr color="#d1d1d1">

                <h2>Rishi Sunak's plan for small boats 'will lock up people fleeing war'</h2>
                <p>Prime minister's proposed legislation aimed at stopping Channel crossings branded 'a joke' by a
                    former minister.</p>
                <h3>By Rowena Mason and Rajeev Syal</h3>
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
            <!-- <div class="section01 width-12">
                <h1>Top stories</h1>
            </div> -->

            <div class="sections section02 width-3">
                <h5>1</h5>
                <p>War in Ukraine: Macron warns that fighter jets cannot be delivered to Kyiv in 'the coming weeks'.</p>
            </div>

            <div class="sections section03 width-3">
                <h5>2</h5>
                <p>Thousands of homeowners urged to switch as they face €500-a-month hike when fixed rate mortgage ends
                </p>
            </div>

            <div class="sections section04 width-3">
                <h5>3</h5>
                <p>Blow for Ireland as prop Finlay Bealham ruled out for rest of Six Nations with knee injury</p>
            </div>

            <div class="sections section05 width-3">
                <h5>4</h5>
                <p>Tourism Ireland to spend over €500,000 on 'Banshees of Inisherin' promotional activity</p>
            </div>
        </div>
    </div>

    <!-- Category picks -->

    


    <div class="categoryPicks">
        <div class="container">


        <div class="width-12 nested">
        <?php
        foreach ($stories as $story) { ?>
        <?php $category = Category::findById($story->category_id); ?>
            <div class="width-4">
                <h4><?= $category->name; ?></h4>
                <h2><?= $story->headline; ?></h2>
                <p><?= $story->sub_heading; ?> </p>
                <h3><?= $story->pub_time; ?></h3>
            </div>
        <?php } ?>


            <div class="section01 width-4">
                <img src="images/10-War of succession.png">
                <h4>Entertainment</h4>
                <h2>War of succession? HBO boss casts doubt on spin-off idea</h2>
                <p>Writer Jesse Armstrong has suggested characters could live on 'in allied world' but HBO boss may need
                    some convincing</p>
                <h3>Published 19 hours ago</h3>
            </div>

            <div class="section02 width-4">
                <img src="images/11-Fickou seals victory.png">
                <h4>Sports</h4>
                <h2>Fickou seals victory in 14-a-side Six Nations battle</h2>
                <p>Gaël Fickou goes over in the last minute for France to secure their victory. Photograph: Christophe
                    Petit-Tesson/EPA</p>
                <h3>Published 15 hours ago</h3>
            </div>

            <div class="section03 width-4">
                <img src="images/12-Vladimir Putin accuses west.png">
                <h4>Politics</h4>
                <h2>Putin accuses west of seeking to 'dismember' Russia</h2>
                <p>Vladimir Putin has accused the west of seeking to “dismember” Russia and to turn the vast country
                    into a series of weak mini-states.</p>
                <h3>Published 4 hours ago</h3>
            </div>
        </div>
    </div>

    <!-- Entertainment Section -->
    <div class="entertainment">
        <div class="container">

            <div class="width-12">
                <h6>Entertainment</h6>
            </div>

            <div class="section01 width-6">

                <div class="block block01 img1 width-3">
                    <img src="images/13-Cocaine Bear.png">

                    <div class="text width-3">
                        <h2>Movie Review: 'Cocaine Bear'</h2>
                        <p>'Cocaine Bear' is a temporary high, but you should still do a bump</p>
                        <h3>By Brian Lloyd</h3>
                    </div>
                </div>
                <div class="block img1 width-6">
                    <img src="images/14-'You' Season 4.png">

                    <div class="text width-3">
                        <h2>'You' Season 4 isn't so bad it's good, it's just plain bad</h2>
                        <p>Watch this as a comedy, you say? Who has the time?</p>
                        <h3>By Brian Lloyd</h3>
                    </div>
                </div>
            </div>

            <div class="section02 width-3">
                <div class="textStories">
                    <h2>Liam Neeson turned down James Bond because his wife gave an ultimatum</h2>
                    <p>Neeson says he was approached for the role in the 1990s</p>
                    <h3>By Lauren Murphy</h3>

                    <hr color="#d1d1d1">

                    <div class=" block block02">
                        <img src="images/17-Creed III.png">
                        <div class="text">
                            <h2>'Creed III' isn't a knockout, but it still packs a punch</h2>
                            <h3>By Brian Lloyd</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section03 width-3">
                <div class="textStories">
                    <h2>Mrs Brown's Boys to return to BBC with first mini-series in a decade</h2>
                    <p>'Fasten your seatbelts and hold on to your hats,' said Brendan O'Carroll</p>
                    <h3>By Ellie Iorizzo</h3>

                    <hr color="#d1d1d1">

                    <div class=" block block02">
                        <img src="images/18-House of the dragon.png">
                        <div class="text">
                            <h2>'House of the Dragon' won't return until summer 2024</h2>
                            <h3>By Lauren Murphy</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- Sports Section -->
    <div class="sports">
        <div class="container">

            <div class="width-12">
                <h6>Sports</h6>
            </div>

            <div class="section02 width-3">
                <div class="textStories">
                    <h2>Barcelona crumble with no soul to anger Xavi and 'give Real Madrid life'</h2>
                    <p>Real's failure to beat 10-man Atlético gave the leaders the chance to go 10 points clear - but Almería spoiled the party</p>
                    <h3>By Sid Lowe</h3>

                    <hr color="#d1d1d1">

                    <div class=" block block02">
                        <img src="images/22-Leo Cullen signs.png">
                        <div class="text">
                            <h2>Leo Cullen signs new two-year deal with Leinster</h2>
                            <h3>By Cian Tracey</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section03 width-3">
                <div class="textStories">
                    <h2>Europe's Top 5 Leagues: Who will win the titles?</h2>
                    <p>Five of Europe's top leagues are approaching the climax of their seasons.In some countries, the usual suspects are in pole position, but elsewhere, we could be in for some surprises. So, who will hold their nerves as the season ends?</p>
                    <h3>By Sid Lowe</h3>

                    <hr color="#d1d1d1">

                    <div class=" block block02">
                        <img src="images/23-Britain v Ireland.png">
                        <div class="text">
                            <h2>Britain v Ireland at Cheltenham could be a one-sided battle</h2>
                    <h3>By Greg Wood</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section01 width-6">

                <div class="block block01 img1 width-3">
                    <img src="images/21-Johnny Sexton back in Ireland.png">

                    <div class="text width-3">
                        <h2>Johnny Sexton back in Ireland training after injury</h2>
                        <p>The captain has been named in mini camp along with Ringrose, Henshaw, Gibson-Park and Furlong.</p>
                        <h3>By John O'Sullivan</h3>
                    </div>
                </div>
                <div class="block img1 width-6">
                    <img src="images/24-Qatar World Cup stadiums.png">

                    <div class="text width-3">
                        <h2>What will happen to Qatar's World Cup Stadiums?</h2>
                        <p>It's hard to believe it has been two months since the World Cup final took place in Qatar.</p>
                        <h3>By Lee Campbell</h3>
                    </div>
                </div>
            </div>

            

            <!-- <div class="textStories width-6">
                <div class="section02 width-3">
                    
                </div>

                <div class="section03 width-3">
                    <h2>Europe's Top 5 Leagues: Who will win the titles?</h2>
                    <p>Five of Europe's top leagues are approaching the climax of their seasons.In some
                        countries, the
                        usual
                        suspects are in pole position, but elsewhere, we could be in for some surprises. So, who
                        will
                        hold
                        their nerves as the season ends?</p>
                    <h3>By Sid Lowe</h3>
                </div>
            </div>

            <div class="section01 width-6">
                <div class="img1 width-3">
                    <img src="images/21-Johnny Sexton back in Ireland.png">
                </div>

                <div class=" text width-3">
                    <h2>Johnny Sexton back in Ireland training after injury</h2>
                    <p>The captain has been named in mini camp along with Ringrose, Henshaw, Gibson-Park and
                        Furlong.
                    </p>
                    <h3>By John O'Sullivan</h3>
                </div>
            </div>

            <hr color="#d1d1d1">

            <div class="section05 width-3">
                <div class="img2">
                    <img src="images/22-Leo Cullen signs.png">
                </div>

                <div class="text">
                    <h2>Leo Cullen signs new two-year deal with Leinster</h2>
                    <h3>By Cian Tracey</h3>
                </div>
            </div>

            <div class="section06 width-3">
                <div class="img2">
                    <img src="images/23-Britain v Ireland.png">
                </div>

                <div class="text">
                    <h2>Britain v Ireland at Cheltenham could be a one-sided battle</h2>
                    <h3>By Greg Wood</h3>
                </div>
            </div>

            <div class="section04 width-6">
                <div class="img1 width-3">
                    <img src="images/24-Qatar World Cup stadiums.png">
                </div>

                <div class="text width-3">
                    <h2>What will happen to Qatar's World Cup Stadiums?</h2>
                    <p>It's hard to believe it has been two months since the World Cup final took place in
                        Qatar.</p>
                    <h3>By Lee Campbell</h3>
                </div>
            </div> -->





        </div>
    </div>

    <!-- Politics Section -->
    <div class="politics">
        <div class="container">

            <div class="width-12">
                <h6>Politics</h6>
            </div>

            <div class="section01 width-6">

                <div class="block block01 img1 width-3">
                    <img src="images/25-All the Republicans.png">

                    <div class="text width-3">
                        <h2>All the Republicans running for president in 2024</h2>
                        <p>Right-wing activist Vivek Ramaswamy is the latest to challenge Trump for the GOP nomination.</p>
                        <h3>By Nicole Narea</h3>
                    </div>
                </div>
                <div class="block img1 width-6">
                    <img src="images/28-Biggest decision in Sunak's career.png">

                    <div class="text width-3">
                        <h2>'Biggest decision of Sunak's career'</h2>
                        <p>PM hails 'decisive breakthrough' and 'three big steps forward' for Northern Ireland.</p>
                        <h3>By Rob Powell</h3>
                    </div>
                </div>
            </div>
            
            <div class="section02 width-3">
                <div class="textStories">
                    <h2>Rishi Sunak agrees deal with EU over Brexit Northern Ireland protocol</h2>
                    <p>Prime minister unveils agreement with European Commission president after four months of negotiations</p>
                    <h3>By Lisa O'Carroll and Aubrey Allegretti</h3>

                    <hr color="#d1d1d1">

                    <div class=" block block02">
                        <img src="images/29-What arming Ukraine looks like.png">
                        <div class="text">
                            <h2>Here’s what arming Ukraine could look like in the future</h2>
                            <h3>By Ellen Ioanes</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section03 width-3">
                <div class="textStories">
                    <h2>Britain's King Charles meeting Ursula von der Leyen ahead of expected Protocol deal</h2>
                    <p>Meeting comes ahead of expected announcement on Northern Ireland Protocol deal</p>
                    <h3>By Emma Montgomery</h3>

                    <hr color="#d1d1d1">

                    <div class=" block block02">
                        <img src="images/30-Europe far from a gas price cap.png">
                        <div class="text">
                            <h2>Europe ‘still far’ from a deal on the gas price cap, says Polish PM</h2>
                            <h3>By Efi Koutsokosta</h3>
                        </div>
                    </div>
                </div>
            </div>

    <footer>
        <div class="container">
            <div class="blocks block01 width-3">
                <h2>About us</h2>
                <h4>Recruitment</h4>
                <h4>Subscription info</h4>
                <h4>Advertisements</h4>
                <h4>Our team</h4>
            </div>

            <div class="blocks block02 width-3">
                <h2>Support</h2>
                <h4>Help centre</h4>
                <h4>Donations</h4>
                <h4>Contact us</h4>
                <h4>Contact preferences</h4>
            </div>

            <div class="blocks block03 width-3">
                <h2>Follow our socials</h2>
                <h4><i class="fa-brands fa-youtube"></i>Youtube</h4>
                <h4><i class="fa-brands fa-facebook"></i>Facebook</h4>
                <h4><i class="fa-brands fa-twitter"></i>Twitter</h4>
                <h4><i class="fa-brands fa-linkedin"></i>Linkedin</h4>
            </div>

            <div class="blocks block04 width-3">
                <h2>About us</h2>
                <h4>Recruitment</h4>
                <h4>Subscription info</h4>
                <h4>Advertisements</h4>
                <h4>Our team</h4>
            </div>

        </div>
    </footer>

</body>

</html>