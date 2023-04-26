<?php
require "../etc/config.php";

try {
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!$_SERVER["REQUEST_METHOD"] === "GET") {
        throw new Exception("Invalid request");
    }
    else if (!isset($_GET["id"])) {
        throw new Exception("Story id expected");
    }

    $id = $_GET["id"];
    $story = Story::findById($id);

    if ($story === null) {
        throw new Exception("Story id not found");
    }

    //$storyGrapeVarietyIds = explode(",", $story->grape_varieties);

    $stories = Story::findAll();
    $categories = Category::findAll();
}
catch (Exception $e) {
    die($e->getMessage());
}
?>
<html>
    <head>
        <title>Admin - Edit story</title>
        <link rel="stylesheet" href="../css/main.css" />
    </head>
    <body class="container">
            <?php require "./include/flash.php"; ?>
        <h1>Admin - Edit story</h1>
        <form method="POST" action="story_update.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $story->id ?>" />
            <div class="row">
                <div class="column-2">
                    <label for="heading">Heading</label>
                    <input type="text"
                        id="heading"
                        name="heading"
                        placeholder="Heading..."
                        value="<?= old("heading", $story->heading) ?>"
                        />
                    <div class="error"><?= error("heading") ?></div>


                    <label for="sub_heading">Sub heading</label>
                    <input type="text"
                        id="sub_heading"
                        name="sub_heading"
                        placeholder="sub_heading..."
                        value="<?= old("sub_heading", $story->sub_heading) ?>"
                        />
                    <div class="error"><?= error("sub_heading") ?></div>


                    <label for="author">Author</label>
                    <input type="text"
                        id="author"
                        name="author"
                        placeholder="author..."
                        value="<?= old("author", $story->author) ?>"
                        />
                    <div class="error"><?= error("author") ?></div>


                    <label for="article">Article</label>
                    <textarea id="article"
                            name="article"
                            placeholder="article..."><?= old("article", $story->article) ?></textarea>
                    <div class="error"><?= error("article") ?></div>


                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id">
                        <?php foreach ($categories as $c) { ?>
                            <option value="<?= $c->id ?>"
                                    <?= (chosen("category_id", $c->id, $story->category_id) ? "selected" : "") ?>
                                    >
                            <?= $c->name ?>
                            </option>
                        <?php } ?>
                    </select>
                    <div class="error"><?= error("category_id") ?></div>


                    <label for="publish_date">Date</label>
                    <input type="date"
                        id="publish_date"
                        name="publish_date"
                        placeholder="publish_date..."
                        value="<?= old("publish_date", $story->publish_date) ?>"
                        />
                    <div class="error"><?= error("publish_date") ?></div>


                    <label for="publish_time">Time</label>
                    <input type="time"
                        id="publish_time"
                        name="publish_time"
                        placeholder="publish_time..."
                        value="<?= old("publish_time", $story->publish_time) ?>"
                        />
                    <div class="error"><?= error("publish_time") ?></div>

                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="btn" />
                    <div class="error"><?= error("image") ?></div>
                </div>
                <div class="column-2">
                    <img src="<?= APP_URL . "/uploads/". $story->image ?>" width="460px" />
                </div>
            </div>
            <input type="submit" class="btn bg-success" value="Update">
        </form>
                          
                        
        </form>
    </body>
</html>
<?php
if (isset($_SESSION["form-data"])) {
    unset($_SESSION["form-data"]);
}
if (isset($_SESSION["form-errors"])) {
    unset($_SESSION["form-errors"]);
}
?>
<!-- <input type="submit" class="btn bg-success" value="Update"> -->