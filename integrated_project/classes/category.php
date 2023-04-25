<?php

require_once './classes/db.php';
require_once './classes/story.php';
class Category {

    public $id;
    public $name;

    public function __construct($props = null) {
        if ($props != null) {
            $this->id    = $props["id"];
            $this->name  = $props["name"];

        }
    }

    public static function findById($id) {
        $category = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();
            
            $sql = "SELECT * FROM categories WHERE id = :id";
            
            $params = [
                ":id" => $id
            ];

        //    $sql = "SELECT * FROM categories WHERE id = " . $id;

            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message =
                    "SQLSTATE error code = " . $error_info[0] .
                    "; error message = ".$error_info[2];
                throw new Exception($message);
            }

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row !== FALSE) {
                $category = new Category($row);
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
        return $category;
    }
} 
?>