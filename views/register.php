<?php

/** 
 * basically tells in which Model belongs the variable $model
 * 
 * @var $model \app\model\User 
 * @var $this \marklester\phpmvc\View
 * 
 * */

$this->title = 'Register';
$this->subheading = 'Create an Account';
$this->headerBg = '/assets/img/register.jpg';
?>

<div class="row">
    <div class="col-lg-6 d-none d-lg-block">
        <img src="/assets/img/post-bg.jpg" class="img-fluid w-100 h-100" alt="login image">
    </div>
    <div class="col-lg-6 col-md-12 mx-auto">
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" name="firstname" value="<?php echo $model->firstname ?>"
                            class="form-control <?php echo ($model->hasError('firstname') ? 'is-invalid' : '') ?>">
                        <div class="invalid-feedback"><?php echo $model->getFirstError('firstname') ?></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" value="<?php echo $model->lastname ?>"
                            class="form-control <?php echo ($model->hasError('lastname') ? 'is-invalid' : '') ?>">
                        <div class="invalid-feedback"><?php echo $model->getFirstError('lastname') ?></div>
                    </div>
                </div>
            </div>
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
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmPassword" value="<?php echo $model->confirmPassword ?>"
                    class="form-control <?php echo ($model->hasError('confirmPassword') ? 'is-invalid' : '') ?>">
                <div class="invalid-feedback"><?php echo $model->getFirstError('confirmPassword') ?></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>