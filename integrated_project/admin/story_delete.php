<?php
require "../etc/config.php";

try {
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!$_SERVER["REQUEST_METHOD"] === "POST") {
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

    $story->delete();
    deleteUploaded($story->image);

    $_SESSION["flash-message"] = "The story was successfully deleted";  

    redirect("index.php");
}
catch (Exception $e) {
    die($e->getMessage());
}
?>