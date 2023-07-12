<?php
class Controller_Main extends Controller{

    function __construct(){

            $this->model = new Model_Main();
            $this->view = new View();
    }

    function action_index(){
        
        $all_user_tasks_data = $this->model->generateTaskList();
        $this->view->generate('view_main.php', 'template_view.php', $all_user_tasks_data);
    }

    function action_add_task(){

        $this->model->add_task();
        //$this->view->generate('view_main.php', 'template_view.php');
    }

    function action_change_all_tasks(){

        $this->model->change_all_tasks();
        //$this->view->generate('view_main.php', 'template_view.php');
    }

    function action_change_one_task(){

        $this->model->change_one_task();
        //$this->view->generate('view_main.php', 'template_view.php');
    }

    function action_exit(){

        $this->model->exit();
        //$this->view->generate('view_register.php', 'template_view.php');
    }

    
}