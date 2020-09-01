<?php 

$route = new Route;

$route->add('index.php', function() {
    index::view('index');
});

$route->add('list/edit/{list}', function() {
    todoList::view('list.edit'); 
});

$route->run();

?>