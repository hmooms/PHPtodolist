<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
</head>
<body>

    <h1>Index for todolists</h1> <br>

    <a href="/phptodolist/list/create">Create new list</a>

    <?php foreach ($data['lists'] as $list): ?>
        
        <h3><a href="/phptodolist/list/edit/<?php echo $list['id']; ?>">list: <?php echo $list['name']; ?></a></h3>

        <?php foreach ($data['tasks'] as $task): ?>

            <?php if ($task['list_id'] == $list['id']): ?>
            
            <a href="/phptodolist/task/edit/<?php echo $task['id'] . "/" . $list['id']; ?>">Task name: <?php echo $task['name'] ?></a>

            <p>Task description: <?php echo $task['description'] ?></p>

            <form action="/phptodolist/task/delete" method="post">
        
                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    
                <input type="submit" value="Delete task: <?php echo $task['name']; ?>">
            
            </form>
            
            <?php endif; ?>

        <?php endforeach; ?>

        <a href="/phptodolist/task/create/<?php echo $list['id'] ?>" >Create task</a> <br>

        <br>

        <form action="/phptodolist/list/delete" method="post">
        
            <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
                
            <input type="submit" value="Delete list: <?php echo $list['name']; ?>">

        </form>
        
    <?php endforeach; ?>

</body>
</html>