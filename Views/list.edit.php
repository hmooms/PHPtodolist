<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>edit list <?php echo $data['list'][0]['name']; ?></h1>

    
    <form action="/phptodolist/list/update" method="post">

        <label for="name">List name: </label>

        <input type="text" name="name" value="<?php echo $data['list'][0]['name']; ?>"> <br>
        
        <input type="hidden" name="id" value="<?php echo $data['list'][0]['id']; ?>">

        <input type="submit" value="submit">
</body>
</html>