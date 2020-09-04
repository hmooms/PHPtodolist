<?php

class TaskController extends Controller
{
    public function edit($request)
    {
        echo "Here you can edit task " . $request[0] . " from list " . $request[1] . ".";
        
        /* how i want to be able to do it
        $task = Task::find($request['task-id']);
        $list = TodoList::find($request['list-id']) 

        return $this->view('list.edit', ['task' => $task, 'list' => $list];
        */
    }
}