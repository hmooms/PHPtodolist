<div class="navbar navbar-white bg-white ">

<div class="container d-flex justify-content-center">



    <form class="form-inline mx-3" action="/phptodolist/sorted" method="post">

        <label for="list">list: </label>

        <select class="mx-2 custom-select" name="id" id="list">

            <?php foreach ($data['lists'] as $list): ?>
                
                <option value="<?= $list['id']; ?>"><?= $list['name']; ?></option>

            <?php endforeach; ?>

        </select>

        <label for="status">status: </label>

        <select class="mx-2 custom-select" name="status" id="status">

            <?php foreach ($data['tasks'] as $task): ?>

                <option value="<?= $task['status']; ?>"><?= $task['status']; ?></option>
            
            <?php endforeach; ?>

        </select>

        <input class="btn btn-warning" type="submit" value="Sort">

    </form>

    <form class="form-inline" action="/phptodolist/ordered" method="post">
        
        <label for="list">List: </label>

        <select class="mx-2 custom-select" name="id" id="list">

            <?php foreach ($data['lists'] as $list): ?>
                
                <option value="<?= $list['id']; ?>"><?= $list['name']; ?></option>

            <?php endforeach; ?>

        </select>

        <input type="hidden" name="direction" value="<?= $data['direction']? ($data['direction'] == "ASC"? "DESC" : "ASC") : "ASC"; ?>">

        <input class="btn btn-warning" type="submit" value="order">

    </form>


</div>

</div>