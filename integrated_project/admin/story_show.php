<?php
require_once "../etc/config.php";
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

<html>
    <head>
        <title>Admin - Story details</title>
        <link rel="stylesheet" href="../css/main.css" />
    </head>
    <body class="container">
        <?php require "./include/flash.php"; ?>
        <h1>Admin - Story details</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $story->id ?>" />
            <div class="row">
                <div class="column-2">
                    <label for="heading">Heading</label>
                    <input type="text" value="<?= $story->heading ?>" readonly />

                    <label for="sub_heading">Sub heading</label>
                    <input type="text" value="<?= $story->sub_heading ?>" readonly />

                    <label for="author">Author</label>
                    <input type="text" value="<?= $story->author ?>" readonly />

                    <label for="article">Article</label>
                    <textarea readonly><?= $story->article ?></textarea>

                    <label for="category_id">Category</label>
                    <input type="text" value="<?= Category::findById($story->category_id)->name ?>" readonly />

                    <label for="publish_date">Date</label>
                    <input type="date" value="<?= $story->publish_date ?>" readonly />

                    <label for="publish_time">Time</label>
                    <input type="time" value="<?= $story->publish_time ?>" readonly />

                </div>
                <div class="column-2">
                    <img src="<?= APP_URL . "/uploads/". $story->image ?>" width="460px" />
                </div>
            </div>
            <p><a class="btn bg-warning" href="story_edit.php?id=<?= $story->id ?>">Edit</a><p>
            <button type="submit" 
                class="btn bg-danger" 
                formaction="story_delete.php?id=<?= $story->id ?>">Delete</button>
        </form>
    </body>
</html>