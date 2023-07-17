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

        //Формирование названий контроллера и действия, которые будут запускаться

        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        //Проверка существования контроллера и действия, которые будут запускаться
        $controller_path = "application/controllers/" . strtolower($controller_name) . '.php';

        if (!file_exists($controller_path)){

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