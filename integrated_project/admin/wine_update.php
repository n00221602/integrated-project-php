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
        throw new Exception("Wine id expected");
    }

    $id = $_POST["id"];
    $wine = Wine::findById($id);

    if ($wine === null) {
        throw new Exception("Wine id not found");
    }

    $data = $_POST;

    $validator = new WineValidator($data);
    $imageRequired = false;
    $valid = $validator->validate($imageRequired);

    if (!$valid) {
        $errors = $validator->errors();

        $_SESSION["form-data"] = $data;
        $_SESSION["form-errors"] = $errors;

        $_SESSION["flash-message"] = "There are errors on the form--please correct them.";  

        redirect("wine_edit.php?id=" . $wine->id);
    }
    else {
        $key = "image";
        if (isset($_FILES) && isset($_FILES[$key]) && $_FILES[$key]["error"] !== UPLOAD_ERR_NO_FILE) {
            $filename = upload($key);
            deleteUploaded($wine->image);
            $wine->image = $filename;
        }

        $wine->name = $data["name"];
        $wine->year = $data["year"];
        $wine->price = $data["price"];
        $wine->description = $data["description"];
        $wine->grape_varieties = implode(",", $data["grape_varieties"]);
        $wine->winery_id = $data["winery_id"];
        $wine->save();

        $_SESSION["flash-message"] = "The wine was successfully updated.";  

        redirect("wine_show.php?id=" . $wine->id);
    }
}
catch (Exception $e) {
    die($e->getMessage());
}
?>