<?php

require_once 'db.php';
class Story {

    public $id;
    public $heading;
    public $sub_heading;
    public $category_id;
    public $image;
    public $publish_date;
    public $publish_time;
    public $author;
    public $article;

    public function __construct($props = null) {
        if ($props != null) {
            $this->id             = $props["id"];
            $this->heading       = $props["heading"];
            $this->sub_heading   = $props["sub_heading"];
            $this->category_id    = $props["category_id"];
            $this->image          = $props["image"];
            $this->publish_date       = $props["publish_date"];
            $this->publish_time       = $props["publish_time"];
            $this->author       = $props["author"];
            $this->article       = $props["article"];
        }
    }

  
    public function save() {
        $stories = [];
        try {
            $db = new DB();
            $conn = $db->open();

            $params = [
                ":heading" => $this->heading,
                ":sub_heading" => $this->sub_heading,
                ":author" => $this->author,
                ":article" => $this->article,
                ":image" => $this->image,
                ":publish_date" => $this->publish_date,
                ":publish_time" => $this->publish_time,
                ":category_id" => $this->category_id
                
            ];

            if($this->id === null) {
                $sql = 
                    "INSERT INTO stories(".
                    "heading, sub_heading, author, article, image, publish_date, publish_time, category_id" .
                    ") VALUES (".
                    ":heading, :sub_heading, :author, :article, :image, :publish_date, :publish_time, :category_id" .
                    ")";

            }
            else {
                $sql =
                    "UPDATE stories SET " .
                    "heading = :heading, " .
                    "sub_heading = :sub_heading, " .
                    "author = :author, " .
                    "article = :article, " .
                    "image = :image, " .
                    "publish_date = :publish_date, " .
                    "publish_time = :publish_time, " .
                    "category_id = :category_id " .
                    "WHERE id = :id" ;

                $params[":id"] = $this->id;
            }
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if(!$status) {
                $error_info = $stmt->errorInfo();
                $message =
                "SQLSTATE error code = " . $error_info[0] . 
                "; error message = ".$error_info[2];
                throw new Exception($message);
            }

            if ($stmt->rowCount() !== 1) {
                throw new Exception("Failed to save story.");
            }

            if($this->id === null) {
               $this->id = $conn->lastInsertId();
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {    
                $db->close();
            }
        }
        return $stories;
    }

    public function delete() {
        try {
            $db = new DB();
            $conn = $db->open();

            if ($this->id !== null) {
                $sql = "DELETE FROM stories WHERE id = :id";
                $params[":id"] = $this->id;
                $stmt = $conn->prepare($sql);
                $status = $stmt->execute($params);

                if(!$status) {
                $error_info = $stmt->errorInfo();
                $message =
                    "SQLSTATE error code = " . $error_info[0] . 
                    "; error message = ".$error_info[2];
                throw new Exception($message);
                }

                if ($stmt->rowCount() !== 1) {
                    throw new Exception("Failed to delete story.");
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }   
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