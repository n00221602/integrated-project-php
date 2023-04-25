<?php

require_once 'db.php';
class Story {

    public $id;
    public $headline;
    public $sub_heading;
    public $category_id;
    public $image;
    public $pub_date;
    public $pub_time;
    public $author;
    public $article;

    public function __construct($props = null) {
        if ($props != null) {
            $this->id             = $props["id"];
            $this->headline       = $props["heading"];
            $this->sub_heading   = $props["sub_heading"];
            $this->category_id    = $props["category_id"];
            $this->image          = $props["image"];
            $this->pub_date       = $props["publish_date"];
            $this->pub_time       = $props["publish_time"];
            $this->author       = $props["author"];
            $this->article       = $props["article"];
        }
    }

  
    public function save() {
        // not yet written
    }

    public function delete() {
       // not yet written
    
    }

    public static function findAll() {
        $stories = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM stories";
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $story = new Story($row);
                    $stories[] = $story;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $stories;
    }

    public static function findById($id) {
        $story = null;
        try {
            $db = new DB();
            $conn = $db->open();

            $sql = "SELECT * FROM stories WHERE id = :id";
            $params = [
                ":id" => $id
            ];
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
                $story = new Story($row);
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
        return $story;
    }

    public static function findAllLimitBy($limit, $row) {
        $stories = array();
    
        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();
    
            $sql = "SELECT * FROM stories LIMIT $limit OFFSET $row" ;
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();
    
            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }
    
            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $story = new Story($row);
                    $stories[] = $story;
    
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    
        return $stories;
    }

    public static function findRandom($category, $limit) {
        $stories = array();
    
        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();
    
            $sql = "SELECT * FROM stories WHERE category_id = $category ORDER BY RAND() DESC LIMIT $limit" ;
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();
    
            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }
    
            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $story = new Story($row);
                    $stories[] = $story;
    
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    
        return $stories;
    }
}




?>