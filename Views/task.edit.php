<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit List</title>
</head>
<body>

    
    <h1>edit list <?php echo $data['list']; ?> </h1>


    <!-- link helper -->
    <!-- $_SERVER -->
    <!-- go to listController->update() -->
    <form action="/phptodolist/task/update" method="post">

        <input type="text" name="something">

        <input type="submit" value="submit">





    </form>




</body>
</html>