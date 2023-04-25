<?php
require_once "./etc/config.php";
require_once "./etc/global.php";

function redirect($url) {
    header("Location: " . $url);
    exit();
}

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    $validator = new FormValidator($_POST);
    $valid = $validator->validate();

    if ($valid) {
    redirect("success.php");
    }


    else {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $errors = $validator->errors();

    $_SESSION["form-data"] = $_POST;
    $_SESSION["form-errors"] = $errors;

    redirect("form.php");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>