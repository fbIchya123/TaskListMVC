<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require_once 'application/core/model.php';
require_once 'application/core/view.php';
require_once 'application/core/controller.php';
require_once 'application/core/autoloader.php';
require_once 'application/lib/class_db.php';
Autoloader::start();