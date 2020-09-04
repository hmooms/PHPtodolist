<?php 

class TodoListController extends Controller
{
    public function edit($id)
    {
        // i dont wanna have to do it like this [0]
        echo "You can edit list " . $id[0] . '.';

        // return $this->view()
    }
    
}
?>