<?php

require_once './classes/db.php';
require_once './classes/story.php';
class Category {

    public $entertainment;
    public $sports;
    public $politics;

    public function __construct($props = null) {
        if ($props != null) {
            $this->entertainment    = $props["entertainment"];
            $this->sports           = $props["sports"];
            $this->politics         = $props["politics"];
        }
    }
} 
?>