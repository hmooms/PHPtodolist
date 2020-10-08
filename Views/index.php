<?php
include_once('./Views/Includes/sort.order.php');

if ($data['sortedTasks']){
    $selectedTasks = 'sortedTasks';
}
if ($data['orderedTasks']){
    $selectedTasks = 'orderedTasks';
}
?> 

<div class="album pt-5 bg-light h-100" >

    <div class="container-fluid mx-0 h-100" >
    
        <div class="row flex-row flex-nowrap scroller-x h-100"  >

            <?php foreach ($data['lists'] as $list): ?>
            
                <div class="col-2">

                    <div class="card bg-primary text-white px-2 mb-4 shadow-sm scroller-x">

                        <div class="d-flex justify-content-between card-header bg-primary px-2 pb-1 mb-2">

                            <h4 class="p-0 m-0"><?= $list['name']; ?></h4>

                            <div class="btn-group" role="group">

                                <button id="btnGroup" role="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    
                                        <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    
                                    </svg>

                                </button>

                                    <div class="dropdown-menu" aria-labelledby="btnGroup">

                                        <a class="dropdown-item" href="/phptodolist/list/edit/<?= $list['id']; ?>">edit</a>
                                        
                                        <form action="/phptodolist/list/delete" method="post">

                                            <input type="hidden" name="id" value="<?= $list['id'] ?>">

                                            <input class="dropdown-item" type="submit" value="delete">

                                        </form>
                                        
    
                                    </div>



                            </div>

                        </div>
                        
                            <?php foreach ($data['tasks'] as $task): ?>

                                <?php if ($task['list_id'] == $list['id']): ?>
                                    
                                    <?php if ($data[$selectedTasks][0]['list_id'] == $list['id']): ?>

                                        <?php foreach ($data[$selectedTasks] as $selectedTask): ?>
                                            
                                            <div class="card text-dark bg-light mb-3 shadow-sm">

                                                <div class="card-body">
                                                    
                                                    <h3 class="card-title"><?= $selectedTask['name']; ?></h3>

                                                    <p class="card-text"> <?= $selectedTask['description']; ?></p>

                                                    <p class="card-text">status: <?= $selectedTask['status'] ?></p>

                                                    <p class="card-text">duration: <?= $selectedTask['duration'] ?></p>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                    
                                                        <div class="btn-group">
                                                        
                                                            <a href="/phptodolist/task/edit/<?= $selectedTask['id'] . "/" . $list['id']; ?>" class="btn btn-sm btn-outline-primary">edit</a>

                                                            <form action="/phptodolist/task/delete" method="post">
                                                        
                                                                <input type="hidden" name="id" value="<?= $selectedTask['id']; ?>">
                                                                    
                                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                                            
                                                            </form>
                                                                                                    
                                                        </div>
                                                    
                                                    </div>
                                            
                                                </div>
                                            
                                            </div>
                                        
                                        <?php endforeach; ?>

                                    <?php else: ?>

                                        <div class="card text-dark bg-light mb-3 shadow-sm">

                                            <div class="card-body">
                                                
                                                <h3 class="card-title"><?= $task['name'] ?></h3>

                                                <p class="card-text"><?= $task['description'] ?></p>

                                                <p class="card-text">status: <?= $task['status'] ?></p>

                                                <p class="card-text">duration: <?= $task['duration'] ?></p>

                                                <div class="d-flex justify-content-between align-items-center">
                                                
                                                    <div class="btn-group">
                                                    
                                                        <a href="/phptodolist/task/edit/<?= $task['id'] . "/" . $list['id']; ?>" class="btn btn-sm btn-outline-primary">edit</a>

                                                        <form action="/phptodolist/task/delete" method="post">
                                                    
                                                            <input type="hidden" name="id" value="<?= $task['id']; ?>">
                                                                
                                                            <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                                        
                                                        </form>
                                                                                                
                                                    </div>
                                                
                                                </div>
                                        
                                            </div>
                                        
                                        </div>
                                    
                                    <?php endif; ?>
                                
                                <?php endif; ?>

                            <?php endforeach; ?>
                                

                        <div class="d-flex justify-content-center pb-3">

                            <a class="btn btn-outline-success bg-success text-light" href="/phptodolist/task/create/<?= $list['id'] ?>" >
                            
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>

                                Add Task
                                    
                            </a>

                        </div>
                    
                    </div>
                
                
                </div>
                
            <?php endforeach; ?>

            <div class="col-2">

                <div class="card bg-dark text-white px-2 mb-4 shadow-sm scroller-y">

                    <h4 class="card-header bg-dark px-2 mb-2">Add List</h4>

                    <div class="d-flex justify-content-center pb-3">

                        <a class="btn btn-outline-success bg-success text-light" href="/phptodolist/list/create" >

                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                                
                            Add List

                        </a>

                    </div>
                
                </div>

            </div>
    
        </div>
    
    
    </div>


</div>