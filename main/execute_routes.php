<?php

use HandlerPages;

$routeInfo = isset($routes[$_REQUEST['url_param']]) ? $routes[$_REQUEST['url_param']] : null;
$handler = new HandlerPages();

if (!$routeInfo) {
    return $handler->pageNotFound();
}

$controllerName = $routeInfo['controller'];
$action = $routeInfo['action'];

$controller = "actions\\$controllerName" . 'Controller';

if (class_exists($controller) === false) {
    return $handler->pageNotFound();
} elseif (method_exists($controller, $action) === false) {
    return $handler->pageNotFound();
} else {
    $executeController = new $controller;
    $executeController->{$action}();
}
