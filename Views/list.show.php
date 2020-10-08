<form action="/phptodolist/list/show" method="post">

    <input type="hidden" name="id" value="<?= $data['list'][0]['id'] ?>">
    
    <select name="status">

        <?php foreach ($data['tasks'] as $task): ?>

            <option value="<?= $task['name'] ?>"><?= $task['name'] ?></option>

        <?php endforeach ?>
        
    <input type="submit" value="Filter list">

    </select>

</form>