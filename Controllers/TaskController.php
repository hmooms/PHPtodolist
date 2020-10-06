<?php

use Models\Task;
use Models\TodoList;

use Core\Controller;

class TaskController extends Controller
{

    public function create($data)
    {
        $listObj = new TodoList;
        $list = $listObj->find($data['list-id']);

        return $this->view('task.create', ['list' => $list]);
    }

    public function store($data)
    {
        $task = new Task;
        $task->store([
            'name' => $data['name'],
            'description' => $data['description'],
            'list_id' => $data['list_id'],
        ]);

        return $this->redirect(); // homepage 
    }

    public function edit($data)
    {
        $taskObj = new Task;
        $task = $taskObj->find($data['task-id']);

        $listObj = new TodoList;
        $list = $listObj->find($data['list-id']);
        
        return $this->view('task.edit', ['task' => $task, 'list' => $list]);
    }

    public function update($data)
    {
        // code

        $task = new Task;

        $task->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'list_id' => $data['list_id'],
        ], $data['id']);
        
        return $this->redirect();
    }

    public function delete($data)
    {
        $task = new Task;

        $task->delete($data);

        return $this->redirect();
    }
}