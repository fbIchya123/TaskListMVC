<?php
include 'connect_db.php';

class DataBase{

    static function log_pass($login, $password){
        return "Login: " . $login . "<br>Password: " . $password;
    }

    static function get_user_data($login, $password){
        global $pdo;
        $query_check_reg_user = $pdo->prepare("SELECT * FROM `users` WHERE name = :name"); 
        $query_check_reg_user->execute([':name' => $login]);
        return $query_check_reg_user->fetch(PDO::FETCH_LAZY);
    }
}