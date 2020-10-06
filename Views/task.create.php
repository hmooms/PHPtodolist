
<h1>Create new Task for List: <?php echo $data['list'][0]['name'] ?></h1>

<form action="/phptodolist/task/store" method="post">

    <label for="name">Task name: </label>

    <input type="text" name="name" placeholder="name"> <br>

    <label for="description">Description: </label>

    <input type="text" name="description" placeholder="description"> <br>

    <input type="hidden" name="list_id" value="<?php echo $data['list'][0]['id']; ?>"> 

    <input type="submit" value="submit">

</form>
