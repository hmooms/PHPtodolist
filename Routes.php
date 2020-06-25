<?php 

Route::add('index.php', function() {
    index::view('index');
});

Route::add('list/edit', function() {
    todoList::view('list.edit'); // TODO make it pop up with ajax maybe in the future
})

?>