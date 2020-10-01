<?php 

require(ROOT . 'Models/TodoList.php');

class TodoListController extends Controller
{
    public function create()
    {
        return $this->view('list.create');
    }

    public function store($data)
    {
        $list = new TodoList;
        $list->store([
            'name' => $data['name'],
        ]); 

        return $this->redirect('/'); // home page
    }

    public function edit($data)
    {
        $listObj = new TodoList;
        $list = $listObj->find($data['id']);

        return $this->view('list.edit', ['list' => $list]);
    }

    public function update($data)
    {
        $list = new TodoList;

        $list->update([
            'name' => $data['name'],
        ], $data['id']);
    }
    
}
?>