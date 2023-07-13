<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

include 'autoloader.php';
include 'application/lib/connect_db.php';

Route::start();