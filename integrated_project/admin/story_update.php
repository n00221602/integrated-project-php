<?php
require "../etc/config.php";

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!$_SERVER["REQUEST_METHOD"] === "POST") {
        throw new Exception("Invalid request");
    }
    else if (!isset($_POST["id"])) {
        throw new Exception("Story id expected");
    }

    $id = $_POST["id"];
    $story = story::findById($id);

    if ($story === null) {
        throw new Exception("Story id not found");
    }

    $data = $_POST;

    $validator = new StoryValidator($data);
    $imageRequired = false;
    $valid = $validator->validate($imageRequired);

    if (!$valid) {
        $errors = $validator->errors();

        $_SESSION["form-data"] = $data;
        $_SESSION["form-errors"] = $errors;

        $_SESSION["flash-message"] = "There are errors on the form--please correct them.";  

        redirect("story_edit.php?id=" . $story->id);
    }
    else {
        $key = "image";
        if (isset($_FILES) && isset($_FILES[$key]) && $_FILES[$key]["error"] !== UPLOAD_ERR_NO_FILE) {
            $filename = upload($key);
            deleteUploaded($story->image);
            $story->image = $filename;
        }

        $story->heading = $data["heading"];
        $story->sub_heading = $data["sub_heading"];
        $story->author = $data["author"];
        $story->article = $data["article"];
        $story->publish_date = $data["publish_date"];
        $story->publish_time = $data["publish_time"];
        $story->category_id = $data["category_id"];
        $story->save();

        $_SESSION["flash-message"] = "Story was successfully updated.";  

        redirect("story_show.php?id=" . $story->id);
    }
}
catch (Exception $e) {
    die($e->getMessage());
}
?>