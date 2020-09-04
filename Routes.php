<?php 

$route = new Route;

$route->add('index.php', 'Home@index');

// I want named params  \/
$route->add('list/edit/{id}', 'TodoList@edit');

$route->add('task/edit/{task-id}/{list-id}', 'Task@edit');

$route->add('task/update', 'Task@update', 'POST');
// post example?
// $route->add('task/update', 'Task@update', 'POST');

$route->run();

?>