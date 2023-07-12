<?php
session_start();
class Model_Register extends Model{

    //Функция аутентификации
    function auth($row){
        
        $_SESSION['user_id'] = $row->id;
        $_SESSION['user_name'] = $row->name;
        header("Location: /TaskListMVC/main");
    }

    //Функция регистрации/авторизации
    function login(){

        //Проверка на пустые поля
        if ($_POST['login'] != NULL and $_POST['password'] != NULL ){
            $login = $_POST['login'];
            $password = $_POST['password'];
            $row = DataBase::get_user_data($login);

            if ($row){

                //Проверка совпадения паролей
                if (password_verify($password, $row->password)){
                    self::auth($row);
                    
                } else {
                    header("Location: /TaskListMVC");

                }
                
            } else {
                DataBase::insert_user($login, $password);
                self::auth($row);

            }

        } else {
            header("Location: /TaskListMVC");
        
        }
    }
}