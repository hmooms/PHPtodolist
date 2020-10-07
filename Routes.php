<?php 

use Core\Route;

$route = new Route;

$route->add('index.php', 'Home@index');

$route->add('list/create', 'TodoList@create');
$route->add('list/store', 'TodoList@store', 'POST');
$route->add('list/show', 'TodoList@show', 'POST');
$route->add('list/edit/{id}', 'TodoList@edit');
$route->add('list/update', 'TodoList@update', 'POST');
$route->add('list/delete', 'TodoList@delete', 'POST');

$route->add('task/create/{list-id}', 'Task@create');
$route->add('task/store', 'Task@store', 'POST');
$route->add('task/edit/{task-id}/{list-id}', 'Task@edit');
$route->add('task/update', 'Task@update', 'POST');
$route->add('task/delete', 'Task@delete', 'POST');

$route->run();

?>