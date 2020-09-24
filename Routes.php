<?php 

$route = new Route;

$route->add('index.php', 'Home@index');

$route->add('list/edit/{id}', 'TodoList@edit');

$route->add('task/edit/{task-id}/{list-id}', 'Task@edit');

$route->add('task/create/{list-id}', 'Task@create');
$route->add('task/store', 'Task@store', 'POST');

$route->add('task/update', 'Task@update', 'POST');
// post example?
// $route->add('task/update', 'Task@update', 'POST');

$route->run();

?>