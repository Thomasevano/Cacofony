<div class="container">
    <div>
        <h2 class="text-center">Register</h2>
        <form action="/create-post" method="POST">
            <div class="mb-3">
                <label for="postTitle" class="form-label">Titre</label>
                <input type="text" class="form-control" name="postTitle" id="postTitle" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="postContent" class="form-label">Password</label>
                <input type="text" class="form-control" name="postContent" id="postContent">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary text-center">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php
var_dump(\Cacofony\Helper\AuthHelper::getLoggedUser());
?>
