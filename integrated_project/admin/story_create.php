<?php
require "../etc/config.php";

try {
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $categories = Category::findAll();

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}
catch (Exception $e) {
    die($e->getMessage());
}
?>

<head>
        <title>Create story</title>
        <style>
            .error { color: red; }

            body {
                margin-left: 368px;
                margin-right: 368px;
            }

            input[type=text], input[type=date], input[type=time], textarea, select, input[type=file] {
                width: 1100px;
                padding: 12px 20px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-bottom: 20px;
            }

            textarea[name="article"]{
                height: 500px;
                padding: 10px 0px 0px 10px
            }

            button[type=submit] {
                width: 100px;
                background-color: #ffab2d;
                color: white;
                font-weight: 600;
                font-size: 20px;
                text-align: center;
                padding: 12px 15px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            p {
                display:flex;
                flex-direction:column;
            }
        </style>
    </head>
    <body>
        <h1>Create new story</h1>

        <form action="story_store.php" method="POST" enctype="multipart/form-data">
            <div>
            <p>
                Heading: 
                <input type="text" name="heading" value="<?= old("heading") ?>">
                <span class="error"><?= error("heading") ?><span>
            </p>
            </div>

            <div>
            <p>
                Sub heading: 
                <input type="text" name="sub_heading" value="<?= old("sub_heading") ?>">
                <span class="error"><?= error("sub_heading") ?><span>
            </p>
            </div>

            <div>
            <p>
                Author: 
                <input type="text" name="author" value="<?= old("author") ?>">
                <span class="error"><?= error("author") ?><span>
            </p>
            </div>

            <div>
            <p>
                Date: 
                <input type="date" name="publish_date" value="<?= old("publish_date") ?>">
                <span class="error"><?= error("publish_date") ?><span>
            </p>
            </div>

            <div>
            <p>
                Time: 
                <input type="time" name="publish_time" value="<?= old("publish_time") ?>">
                <span class="error"><?= error("publish_time") ?><span>
            </p>
            </div>

            <div>
            <p>
                Article: 
                <textarea name="article" value="<?= old("article") ?>"></textarea>
                <span class="error"><?= error("article") ?><span>
            </p>
            </div>

            <div>
            <p>
                Category:
                <select id="category_id" name="category_id">
                    <?php foreach ($categories as $c) { ?>
                        <option value="<?= $c->id ?>"
                            <?= (chosen("category_id", $c->id) ? "selected" : "") ?>
                        >
                            <?= $c->name ?>
                        </option>
                    <?php } ?>
            </select>
            <div class="error"><?= error("winery_id") ?></div>
            </p>
            </div>

            <div>
            <p>
                Image: 
                <input type="file" name="image" value="<?= old("image") ?>">
                <span class="error"><?= error("image") ?><span>
            </p>
            </div>

            <button type="submit">Submit</button>
        </form>
    </body>
</html>
<?php 
if (array_key_exists("form-data", $_SESSION)) {
    unset($_SESSION["form-data"]);
}

if (array_key_exists("form-errors", $_SESSION)) {
    unset($_SESSION["form-errors"]);
}
?>