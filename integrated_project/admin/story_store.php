<?php
require "../etc/config.php";

try {
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!$_SERVER["REQUEST_METHOD"] === "POST") {
        throw new Exception("Invalid request");
    }

    $data = $_POST;

    $validator = new StoryValidator($data);
    $imageRequired = true;
    $valid = $validator->validate($imageRequired);

    if(!$valid) {
        $errors = $validator->errors();

        $_SESSION["form-data"] = $data;
        $_SESSION["form-errors"] = $errors;

        $_SESSION["flash-message"] = "There are errors on the form--please correct them.";  

        header("Location: story_create.php");
    }
    else {
        $filename = upload("image");
        $data["grape_varieties"] = implode(",", $data["grape_varieties"]);
        $data["image"] = $filename;

        $story = new Story($data);
        $story->save();

        $_SESSION["flash-message"] = "The story was successfully added.";  

        redirect("story_show.php?id=" . $story->id);
    }
}
catch (Exception $e) {
    die("Caught exception: " . $e->getMessage());
}
?>