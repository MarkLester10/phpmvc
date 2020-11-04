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
$this->headerBg = '../assets/img/login.jpg';

?>

<div class="container mt-3 mx-auto">
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block">
            <img src="../assets/img/profile.jpg" class="img-fluid w-100 h-100" alt="login image">
        </div>
        <div class="col-lg-6 col-md-12 mx-auto">
            <?php $form = marklester\phpmvc\form\Form::begin('', "post") ?>

            <?php echo $form->field($model, 'email', 'text') ?>
            <?php echo $form->field($model, 'password', 'password') ?>

            <button type="submit" class="btn btn-primary">Login</button>

            <?php marklester\phpmvc\form\Form::end() ?>
        </div>
    </div>
</div>