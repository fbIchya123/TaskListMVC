<?php
spl_autoload_register(function ($class_name){

    include './application/core/' . strtolower($class_name) . '.php';
});