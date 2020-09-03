<?php 

$route = new Route;

$route->add('index.php', 'Home@index');

// need a way to use POST

// I want named params  \/
$route->add('list/edit/{id}', 'TodoList@edit');

$route->add('task/edit/{task-id}/{list-id}', 'Task@edit');
$route->run();

?>