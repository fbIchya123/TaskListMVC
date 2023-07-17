<?php
spl_autoload_register(function ($class_name){

    $folder = strtolower(explode('_', $class_name)[0]);
    include './application/' . $folder . 's' . '/' . strtolower($class_name) . '.php';
});