<div class="jumbotron text-center bg-white pb-2">

        <h1>Create new List</h1>

</div>
<div class="container text-center">


<form class="text-left" action="/phptodolist/list/store" method="post">
    <div class="form-group">

        <label for="name">List name: </label>

        <input class="form-control" required="required" type="text" name="name" id="name" placeholder="name">
    
    </div>
    <input class="btn btn-success" type="submit" value="submit">

</form>


</div>
