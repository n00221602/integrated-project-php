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

        <style>
            .container {
                margin-left:200px;
            }

            table, th, td {
                border: 1px solid black;
                padding:10px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
    
            }
            
        </style>
        
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
                    <td><a href="story_show.php?id=<?= $s->id ?>"> <h2><?= $s->heading; ?></a></td>
                    <td><?= $s->sub_heading ?></td>
                    <td><img src= "<?= APP_URL . '/uploads/' . $s->image ?>"  width="200" height="150">
                    <td><?= $s->publish_date ?></td>
                    <td><?= $s->publish_time ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        <?php } ?>
    </body>
</html>