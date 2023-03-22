<?php
namespace winestore;

define("APP_ROOT", dirname(__DIR__));
define("APP_URL", "http://localhost/CC-Y1-WebDev/wineshop");

spl_autoload_register(function ($class) {
    $class_path = str_replace('\\', '/', $class);
    
    $file = dirname(__DIR__) . '/classes/' . $class_path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

require_once "global.php";
?>