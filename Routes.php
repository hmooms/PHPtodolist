<?php 

$route = new Route;

$route->add('index.php', 'Index@index');

$route->add('list/edit', 'TodoList@edit');

$route->run();

?>