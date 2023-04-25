<?php
require_once "./etc/global.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">


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
        </style>
    </head>
    <body>
        <form action="process_form.php" method="POST">
            <p>
                Headline: 
                <input type="text" name="headline" value="<?= old("headline") ?>">
                <span class="error"><?= error("headline") ?><span>
            </p>
            
            <p>
                Sub heading: 
                <input type="text" name="sub_heading" value="<?= old("sub_heading") ?>">
                <span class="error"><?= error("sub_heading") ?><span>
            </p>

            <p>
                Author: 
                <input type="text" name="author" value="<?= old("author") ?>">
                <span class="error"><?= error("author") ?><span>
            </p>

            <p>
                Date: 
                <input type="date" name="date" value="<?= old("date") ?>">
                <span class="error"><?= error("date") ?><span>
            </p>

            <p>
                Time: 
                <input type="time" name="time" value="<?= old("time") ?>">
                <span class="error"><?= error("time") ?><span>
            </p>

            <p>
                Article: 
                <textarea name="article" value="<?= old("article") ?>"></textarea>
                <span class="error"><?= error("article") ?><span>
            </p>

            <p>
                Category:
                <select name="category">
                    <option value="">Please choose a category...</option>"
                    <option value="Entertainment"  <?= chosen("category", "Entertainment")  ? "selected" : "" ?>>Entertainment</option>
                    <option value="Politics"  <?= chosen("category", "Politics")  ? "selected" : "" ?>>Politics</option>
                    <option value="Sports" <?= chosen("category", "Sports") ? "selected" : "" ?>>Sports</option>
                </select>
                <span class="error"><?= error("category") ?><span>
            </p>
            <p>
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