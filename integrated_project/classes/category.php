<?php

require_once 'db.php';
require_once 'story.php';
class Category {

    public $id;
    public $name;

    public function __construct($props = null) {
        if ($props != null) {
            $this->id    = $props["id"];
            $this->name  = $props["name"];

        }
    }

    public static function findAll() {
        $categories = [];
        try {
            $db = new DB();
            $conn = $db->open();

            $sql = "SELECT * FROM categories";
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if(!$status) {
                $error_info = $stmt->errorInfo();
                $message =
                "SQLSTATE error code = " . $error_info[0] . 
                "; error message = ".$error_info[2];
                throw new Exception($message);
            }

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            while ($row !== FALSE) {
                $category = new Category($row);
                $categories[] = $category;

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
        return $categories;
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

    public function getCategories() {
        $categories = array();

        try {
            $db = new DB();
            $conn = $db->open();

            $sql = "SELECT * FROM categories WHERE id IN (". $this->categories .")";
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if(!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = " . $error_info[0] ."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $category = new Category($row);
                    $categories[] = $category;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }   
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
        
        return $categories;
    }
} 
?>