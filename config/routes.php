<?php

$router = new Framework\Router;

$router->add("/twig", ["controller" => "home", "action" => "twig"]);

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "products", "action" => "showPage"]);
$router->add("/product/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
// $router->add("/{controller}/{id:\d+}/{action}");

//$router->add("/{controller}/{id:\d+}/show", ["action" => "show", "middleware" => "message|message|message"]);
$router->add("/{controller}/{id:\d+}/show", ["action" => "show"]);
$router->add("/{controller}/{id:\d+}/edit", ["action" => "edit"]);
$router->add("/{controller}/{id:\d+}/update", ["action" => "update"]);
$router->add("/{controller}/{id:\d+}/delete", ["action" => "delete"]);
$router->add("/{controller}/{id:\d+}/destroy", ["action" => "destroy", "method" => "post"]);


$router->add('login', ['controller' => 'Login', 'action' => 'new']);
$router->add('signup', ['controller' => 'signup', 'action' => 'new']);

$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");

return $router;