<?php
require '../core/Router.php';
require '../app/controllers/Pedido.php';


$url = $_SERVER['QUERY_STRING'];
//echo 'URL = '.$url.'<br>';
$router = new Router();

//GET ALL
$router -> add('/public/pedido/get', array(
    'controller' => 'Pedido',
    'action' => 'getAll')
);
//GET ID
$router -> add('/public/pedido/get/{id}', array(
    'controller' => 'Pedido',
    'action' => 'getPedidosById')
);
//CREATE
$router -> add('/public/pedido/create', array(
    'controller' => 'Pedido',
    'action' => 'newPedido')
);
//UPDATE
$router -> add('/public/pedido/update/{id}', array(
    'controller' => 'Pedido',
    'action' => 'updatePedido')
);
//DELETE
$router -> add('/public/pedido/delete/{id}', array(
    'controller' => 'Pedido',
    'action' => 'deletePedido')
);

//--------MATCH-------------------
$urlParams = explode('/',$url);
$urlArray = array(
    'HTTP'=>$_SERVER['REQUEST_METHOD'],
    'path'=>$url,
    'controller'=>'',
    'action'=>'',
    'params'=>''
);

if (!empty($urlParams[2])){
    $urlArray['controller']= ucwords($urlParams[2]);
    if (!empty($urlParams[3])){
        $urlArray['action'] = $urlParams[3];
        if(!empty($urlParams[4])){
            $urlArray['params'] = $urlParams[4];
        }
    } else {
        $urlArray['action'] = 'index';
    }
} else {
    $urlArray['controller']='Home';
    $urlArray['action'] = 'index';
}

if ($router->matchRoutes($urlArray)){

    $method = $_SERVER['REQUEST_METHOD'];
    $params = [];

    if($method === 'GET'){
        $params[]=intval($urlArray['params']) ?? null;
    } else if($method === 'POST'){
        $json = file_get_contents('php://input');
        $params[]=json_decode($json, true);
    } else if($method === 'PUT'){
        $id = intval($urlArray['params']) ?? null;
        $json = file_get_contents('php://input');
        $params[] = $id;
        $params[]=json_decode($json, true);
    } else if($method === 'DELETE'){
        $params[]=intval($urlArray['params']) ?? null;
    } 

    $controller = $router->getParams()['controller'];
    $action = $router->getParams()['action'];
    $controller = new $controller();
    if(method_exists($controller, $action)){
        $resp = call_user_func_array([$controller, $action], $params);
    } else {
        echo "El metodo no existe";
    }
} else {
    echo 'Route no encontrado: '. $url;
}



?>


