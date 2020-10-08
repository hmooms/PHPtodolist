<div class="jumbotron text-center bg-white pb-2">

        <h1>Edit List: <?= $data['list'][0]['name']; ?></h1>

</div>
<div class="container text-center">


<form class="text-left" action="/phptodolist/list/update" method="post">
    <div class="form-group">

        <label for="name">List name: </label>

        <input class="form-control" type="text" required="required" name="name" id="name" value="<?= $data['list'][0]['name'] ?>">
    
    </div>

    <input type="hidden" name="id" value="<?= $data['list'][0]['id']; ?>">

    <input class="btn btn-success" type="submit" value="submit">

</form>


</div>