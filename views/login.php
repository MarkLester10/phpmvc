

<div class="container mt-3 mx-auto">
<div class="row">
        <div class="col-lg-6 col-md-12 mx-auto">
        <h1>Login</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Log in</button>
        </form>
        </div>
    </div>
</div>