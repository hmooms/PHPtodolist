<?php

    
require(ROOT . 'Models/Task.php');
require(ROOT . 'Models/TodoList.php');

class TaskController extends Controller
{
    
    public function edit($request)
    {
        echo "Here you can edit task " . $request['task-id'] . " from list " . $request['list-id'] . ".<br>";
        
        $taskobj = new Task;
        $tasks = $taskobj->all();
        $tasksList2 = $taskobj->where(['list-id' => '2'])->get();


        $listobj = new TodoList;
        $list = $listobj->find($request['list-id']);
        // $tasks = Task::find($request['task-id']);
        // $list = List::find($request['list-id']);
        
        return $this->view('task.edit', ['tasks' => $tasks, 'list' => $list, 'tasks list 2' => $tasksList2]);
        
        /* how i want to be able to do it
        $task = Task::find($request['task-id']);
        $list = TodoList::find($request['list-id']) 

        return $this->view('list.edit', ['task' => $task, 'list' => $list];
        */
    }

    public function update($request)
    {
        // code
        echo $request['something'];

        // validate

        // update

        // redirect
    }
}