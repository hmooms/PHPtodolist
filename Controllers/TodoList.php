<?php 

class TodoList extends Controller
{
    public function edit($id)
    {
        // i dont wanna have to do it like this [0]
        echo $id[0] . ' is Edited';
    }
}

?>