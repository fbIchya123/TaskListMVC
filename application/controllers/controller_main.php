<?php
class Controller_Main extends Controller{

    function __construct(){

            $this->model = new Model_Main();
            $this->view = new View();
    }

    function action_index(){
        
        $this->view->generate('view_main.php', 'template_view.php');
    }
}