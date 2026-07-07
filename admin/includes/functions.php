<?php

function classAutoLoader($class) {
    $class = strtolower($class);
    $thePath = INCLUDES_PATH . "/{$class}.php";

    if(is_file($thePath) && !class_exists($class)) {
        include $thePath;
    }
}

spl_autoload_register('classAutoLoader');



function redirect($location) {
    header("Location: {$location}");
}