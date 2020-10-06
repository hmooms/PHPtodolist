<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit List</title>
</head>
<body>

    
    <h1>edit task <?php echo $data['task'][0]['id']; ?> </h1>

    <?php 
    
        var_dump($data);
    ?>


    <!-- link helper -->
    <!-- $_SERVER -->
    <!-- go to listController->update() -->
    <form action="/phptodolist/task/update" method="post">

        <label for="name">Task name: </label>

        <input type="text" name="name" value="<?php echo $data['task'][0]['name']; ?>"> <br>

        <label for="description">Task description: </label>

        <input type="text" name="description" value="<?php echo $data['task'][0]['description'] ?>"> <br>

        <input type="hidden" name="list_id" value="<?php echo $data['task'][0]['list_id'] ?>">

        <input type="hidden" name="id" value="<?php echo $data['task'][0]['id']; ?>">

        <input type="submit" value="submit">





    </form>




</body>
</html>