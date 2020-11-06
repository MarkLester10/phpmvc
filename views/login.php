<?php

/** 
 * basically tells in which Model belongs the variable $model
 * 
 * @var $model \app\model\User 
 * @var $this \marklester\phpmvc\View
 * 
 * */
$this->title = 'Login';
$this->subheading = 'Get the latest news and information now';
$this->headerBg = '/assets/img/login.jpg';

?>

<div class="container mt-3 mx-auto">
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block">
            <img src="/assets/img/profile.jpg" class="img-fluid w-100 h-100" alt="login image">
        </div>
        <div class="col-lg-6 col-md-12 mx-auto">
            <form action="" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $model->email ?>"
                        class="form-control <?php echo ($model->hasError('email') ? 'is-invalid' : '') ?>">
                    <div class="invalid-feedback"><?php echo $model->getFirstError('email') ?></div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $model->password ?>"
                        class="form-control <?php echo ($model->hasError('password') ? 'is-invalid' : '') ?>">
                    <div class="invalid-feedback"><?php echo $model->getFirstError('password') ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>