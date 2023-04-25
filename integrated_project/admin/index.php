<?php
require_once '../etc/config.php';
try {
    $stories = Story::findAll();   //loads all stories from database
}
catch (Exception $ex) {
    die($ex->getMessage()); 
}
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/main.css" />
        <title>Webpage - Admin</title>
    </head>
    <body class="container">
        <?php require "./include/flash.php"; ?>
        <h1>Webpage - Admin</h1>
        <p><a class="btn bg-primary" href="story_create.php">Create</a></p>
        <?php if (count($stories) === 0) { ?>
            <p>,There are no stories,</p>
        <?php } else { ?>
            <table class="stories">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Author</th>
                    <th>Headline</th>
                    <th>Sub heading</th>
                    <th>Image</th>
                    <th>Published date</th>
                    <th>Published time</th>

                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stories as $s) { ?>
                <tr>
                    <td><?= $s->category_id ?></td>
                    <td><?= $s->author ?></td>
                    <td><?= $s->headline ?></td>
                    <td><?= $s->sub_heading ?></td>
                    <td><img src= "<?= $s->image ?>"  width="200" height="150">
                    <td><?= $s->pub_date ?></td>
                    <td><?= $s->pub_time ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        <?php } ?>
    </body>
</html>