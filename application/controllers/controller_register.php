<?php
class Controller_Register extends Controller{

    function __construct(){

        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index(){

        $this->view->generate('view_register.php', 'template_view.php');
    }

    //Регистрация/авторизация
    function action_login(){
        $this->model->login();
        $this->view->generate('view_main.php', 'template_view.php');
    }
}