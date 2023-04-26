<?php 
require_once "./etc/config.php";

/* try {
    echo "<pre>";
    $stories = Story::findById(1);
    if ($stories !== null) {
        print_r($stories);
    }
    $stories = Story::findById(-1);
    if ($stories === null) {
        echo "Not found";
    }
    echo "</pre>";
}
catch (Exception $e) {
    echo $e->getMessage()   ;
} */

$stories = Story::findAll();
foreach ($stories as $s) {
    $prefix = "images/";
    if (str_starts_with($s->image, $prefix)) {
        $s->image = substr($s->image, strlen($prefix));
        $s->save();
        echo $s->image . "<br/>";
    }
}

?>