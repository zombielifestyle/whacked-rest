<?php

$wire = new Wire;

$wire->config = function(){
    require __DIR__.'/config.php';
};

$wire->Params = function() { 
    return new Params(array(
        'get' => $_GET,
        'post' => $_POST,
        'request' => $_REQUEST,
        'server' => $_SERVER,
    ));
};

$wire->Response = function() { 
    return new Response('text/plain');
};

$wire->Router = function() {
    $router = new Router($_SERVER);
    $routes = require __DIR__.'/routes.php';
    foreach ($routes as $route) {
        $router->addRoute($route[0], $route[1], __DIR__.'/lib/controllers/'.$route[2]);
    }
    return $router;
};

$wire->RestController = function() {
    return new RestController($this->Router, $this->Response, $this->Params, $this);
};

return $wire;