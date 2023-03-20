<?php

// require_once "classes/category.php";
require_once "classes/story.php";

 try{
    $stories = Story::findAll();
 }
 catch (Exception $e)
{
     echo $e;
}

?>
<html>
    <head>
        <title>Stories</title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <table>
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
                    <td><img src= "<?$s->image?>"  width="200" height="150">
                    <td><?= $s->pub_date ?></td>
                    <td><?= $s->pub_time ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>