<?php
session_start();

function base_url($path = false) {
    if($path):
        return 'http://localhost/fds/'.$path;
    endif;
    return 'http://localhost/fds/';
}

function redirect($route) {
    header('Location: '.$route);
}   

$route = isset($_GET['route']) ? $_GET['route'] : 'Pessoa';

if(mb_strpos($route, '/')):
    $route = explode('/', $route);

    $controller = ucfirst($route[0]);
    array_shift($route);

    $method = !empty($route) && $route[0] != null ? $route[0] : 'index';
    $method != 'index' ? array_shift($route) : null;
    
    $params = array();

    if($method != 'index' && !empty($route)):
        foreach($route as $param):
            array_push($params, $param);
        endforeach;
    endif;
else:
    $controller = ucfirst($route);
    $method = 'index';
    $params = array();
endif;

if(is_file('controllers/'.$controller.'.php')):
    require 'controllers/'.$controller.'.php';
    
    $params = implode(',', $params);

    $controller = new $controller();

    if(method_exists($controller, $method)):
        $controller->$method($params);
    else:
        require 'error/method.php';
    endif;
else:
    require 'error/404.php';
endif;