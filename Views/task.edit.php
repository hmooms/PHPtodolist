<div class="jumbotron text-center bg-white pb-2">

        <h1>Edit Task: <?= $data['task'][0]['name']; ?></h1>

</div>

<div class="container text-center">

<form class="text-left" action="/phptodolist/task/update" method="post">

<div class="form-group ">
    <label for="name">Task name: </label>

    <input class="form-control" required="required" type="text" name="name" id="name" value="<?= $data['task'][0]['name']; ?>">
</div>
<div class="form-group">
    <label for="description">Description: </label>

    <textarea class=" form-control" required="required" type="text" id="name"><?= $data['task'][0]['description']; ?> </textarea>
</div>

<div class="form-group">

    <label for="status">Status</label>

    <input class="form-control" required="required" placeholder="status" type="text" name="status" id="status" value="<?= $data['task'][0]['status']; ?> ">

</div>

<div class="form-group">

    <label for="duration">Duration Points(1-10)</label>

    <input class="form-control" required="required" type="number" min="1" max="10" name="duration" id="duration" value="<?= $data['task'][0]['duration']; ?>">

</div>


    <input type="hidden" name="list_id" value="<?= $data['list'][0]['id']; ?>"> 

    <input type="hidden" name="id" value="<?= $data['task'][0]['id']; ?>">

    <input class="btn btn-success" type="submit" value="submit">

</form>


</div>
