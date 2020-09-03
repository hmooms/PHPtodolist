<?php

class Task extends Controller
{
    public function edit($id)
    {
        echo "Here you can edit task " . $id[0] . " from list " . $id[1] . ".";
    }
}