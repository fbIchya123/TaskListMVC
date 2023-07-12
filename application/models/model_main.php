<?php
session_start();
class Model_Main extends Model{

    function generateTaskList(){

        return DataBase::get_user_task_list();
        //return $data = [['id' => 1234, 'description' => "TEST", 'status' => "READY"]];
    }
    
    function change_all_tasks(){
        global $pdo;
        $user_id = $_SESSION['user_id'];
        //Проверка авторизации
        if(isset($user_id)){

            //Удаление всех задач
            if (!empty($_POST['remove_all'])){

                DataBase::remove_all($user_id);

            //Смена статуса всех задач на READY    
            } else {

                DataBase::change_all_status($user_id);
            }
            header("Location: /TaskListMVC/main");

        //Переход на страницу регистрации/авторизации
        } else {

        header("Location: /TaskListMVC");
        }
    }
    
    function change_one_task(){
        
        $user_id = $_SESSION['user_id'];
        if (isset($user_id)){
            
            //Удаление таска
            if (!empty($_POST['delete'])){
                DataBase::delete($user_id);

                //Изменение статуса таска
            } else if (!empty($_POST['status'])){
                
                //Запрос на получение статуса таска
                $status = DataBase::get_status($user_id);
                
                //Изменение значения статуса
                switch ($status){
                    case "READY":
                        $status = "UNREADY";
                        break;
                    case "UNREADY":
                        $status = "READY";
                        break;
                }
                        
                //Занесение значения статуса в бд
                DataBase::insert_status($status);
            }
                    
            header("Location: /TaskListMVC/main");
                    
        } else {

            header("Location: /TaskListMVC");
        }
    }

    function add_task(){

        if (isset($_SESSION['user_id'])){

            DataBase::add_task($_SESSION['user_id'], $_POST['description']);
            header("Location: /TaskListMVC/main");
        } else {

            header("Location: /TaskListMVC");
        }
    }

    function exit(){
    
        $_SESSION['user_id'] = NULL;
        $_SESSION['user_name'] = NULL;
        header("Location: /TaskListMVC");
    }
}