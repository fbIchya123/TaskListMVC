<?php
include 'connect_db.php';

class DataBase{

    //Запрос на получение данных пользователя
    static function get_user_data($login){

        global $pdo;
        $query_check_reg_user = $pdo->prepare("SELECT * FROM `users` WHERE name = :name"); 
        $query_check_reg_user->execute([':name' => $login]);
        return $query_check_reg_user->fetch(PDO::FETCH_LAZY);
    }

    //Запрос на добавление нового пользователя
    static function insert_user($login, $password){

        global $pdo;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query_add_user = $pdo->prepare("INSERT INTO `users` (name, password, created_at) VALUES (:name, :password, :created_at)"); 
        $query_add_user->execute([':name' => $login, ':password' => $password_hash, ':created_at' => date("Y-m-d")]);
    }

    //Запрос на получение данных данных всех тасков пользователя
    static function get_user_task_list(){

        global $pdo;
        $query_all_user_tasks = $pdo->prepare("SELECT id, description, status FROM tasks WHERE user_id = :user_id");
        $query_all_user_tasks->execute([':user_id' => $_SESSION['user_id']]);
        $data = $query_all_user_tasks->fetchAll();
        return $data;
    }
    
    //Запрос на добавление нового таска
    static function add_task($user_id, $description){

            global $pdo;
            $query = $pdo->prepare("INSERT INTO `tasks` (user_id, description, created_at, status) VALUES (:user_id, :description, :created_at, 'READY')"); 
            $query->execute([':user_id' => $user_id, ':description' => $description, ':created_at' => date("Y-m-d")]);
        }
    
    //Запрос на удаление всех тасков пользователя
    static function remove_all($user_id){

        global $pdo;
        $query = $pdo->prepare("DELETE FROM `tasks` WHERE user_id = :user_id");
        $query->execute([':user_id' => $user_id]);
    }

    //Запрос на изменение статусов на "UNREADY" всех тасков пользователя
    static function change_all_status($user_id){
        
        global $pdo;
        $query = $pdo->prepare("UPDATE `tasks` SET status = :status WHERE user_id = :user_id");
        $query->execute(['status' => 'UNREADY', ':user_id' => $user_id]);
    }

    //Запрос на удаление одного таска пользователя
    static function delete($user_id){

        global $pdo;
        $query = $pdo->prepare("DELETE FROM `tasks` WHERE id = :id AND user_id = :user_id");
        $query->execute([':id' => $_POST['delete'], ':user_id' => $user_id]);
    }

    //Запрос на получение статуса таска
    static function get_status($user_id){
        
        global $pdo;
        $query = $pdo->prepare("SELECT status FROM `tasks` WHERE id = :id AND user_id = :user_id");
        $query->execute([':id' => $_POST['status'], ':user_id' => $user_id]);
        return $query->fetch(PDO::FETCH_LAZY)->status;
    }

    //Запрос на внесение изменения статуса в таск
    static function insert_status($status){

        global $pdo;
        $query = $pdo->prepare("UPDATE `tasks` SET status = :status WHERE id = :id");
        $query->execute([':id' => $_POST['status'], ':status' => $status]);
    }
}
