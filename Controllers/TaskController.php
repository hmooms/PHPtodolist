<?php

class TaskController extends Controller
{
    public function edit($request)
    {
        echo "Here you can edit task " . $request['task-id'] . " from list " . $request['list-id'] . ".";
        
        // $tasks = Task::find('*')->where('id', $request['task-id'])->get();
        // $list = List::find($request['list-id']);
        
        return $this->view('task.edit', ['task' => $request['task-id'], 'list' => $request['list-id']]);
        
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