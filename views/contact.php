

<div class="container mt-3 mx-auto">
<div class="row">
        <div class="col-lg-6 col-md-12 mx-auto">
        <h1>Contact Us</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea class="form-control" name="body" placeholder="Message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>