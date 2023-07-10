<?php
include 'connect_db.php';

class DataBase{

    static function log_pass($login, $password){

        return "Login: " . $login . "<br>Password: " . $password;
    }

    static function get_user_data($login){

        global $pdo;
        $query_check_reg_user = $pdo->prepare("SELECT * FROM `users` WHERE name = :name"); 
        $query_check_reg_user->execute([':name' => $login]);
        return $query_check_reg_user->fetch(PDO::FETCH_LAZY);
    }

    static function insert_user($login, $password){

        global $pdo;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query_add_user = $pdo->prepare("INSERT INTO `users` (name, password, created_at) VALUES (:name, :password, :created_at)"); 
        $query_add_user->execute([':name' => $login, ':password' => $password_hash, ':created_at' => date("Y-m-d")]);
    }
}
/*
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $created_at = ;
*/