<div class="jumbotron text-center bg-white pb-2">

        <h1>Create new Task for List: <?= $data['list'][0]['name']; ?></h1>

</div>

<div class="container text-center">

<form class="text-left" action="/phptodolist/task/store" method="post">

<div class="form-group ">
    <label for="name">Task name: </label>

    <input class="form-control" required="required" type="text" name="name" id="name" placeholder="name"> <br>
</div>
<div class="form-group">
    <label for="description">Description: </label>

    <textarea class=" form-control" required="required" type="text" name="description" id="name" placeholder="description"></textarea>
</div>

<div class="form-group">

    <label for="status">Status</label>

    <input class="form-control" required="required" placeholder="status" type="text" name="status" id="status">

</div>

<div class="form-group">

    <label for="duration">Duration Points(1-10)</label>

    <input class="form-control" required="required" type="number" min="1" max="10" name="duration" id="duration" placeholder="1-10">

</div>


    <input type="hidden" name="list_id" value="<?php echo $data['list'][0]['id']; ?>"> 

    <input class="btn btn-success" type="submit" value="submit">

</form>


</div>

