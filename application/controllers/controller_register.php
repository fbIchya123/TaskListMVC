<?php
class Controller_Register extends Controller{

    function __construct(){

        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index(){

        $this->view->generate('view_register.php', 'template_view.php');
    }

    function action_login(){
        $login = $_POST['login'];
        $password = $_POST['password'];
        echo DataBase::log_pass($login, $password);
    }
}