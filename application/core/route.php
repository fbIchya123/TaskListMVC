<?php

class Route {
    
    static function start(){

        //Дефолтные значение
        $controller_name = 'Register';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //Отслеживание названия контроллера и действия
        if (!empty($routes[2])){

            $controller_name = $routes[2];
        }

        if (!empty($routes[3])){

            $action_name = $routes[3];
        }

        //Формирование названий модели, контроллера и действия, которые будут запускаться
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;

        //Формирование пути к модели, контроллеру и действию, которые будут запускаться
        if (file_exists($model_path)){

            include "application/models/" . $model_file;

        }

        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;

        if (file_exists($controller_path)){

            include "application/controllers/" . $controller_file;

        } else {
            
            Route::ErrorPage404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)){

            $controller->$action();

        } else {

            Route::ErrorPage404();
        }


    }
    
    //Функция вывода ошибки 404
    function ErrorPage404(){

        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }


}