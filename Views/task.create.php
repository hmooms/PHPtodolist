<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Create new Task for List: <?php echo $data['list'][0]['name'] ?></h1>

    <form action="/phptodolist/task/store" method="post">
    
        <label for="name">Task name: </label>

        <input type="text" name="name" placeholder="name"> <br>

        <input type="hidden" name="list-id" value="<?php echo $data['list'][0]['id']; ?>"> 

        <input type="submit" value="submit">
    
    </form>

</body>
</html>