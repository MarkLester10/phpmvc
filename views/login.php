<?php

/** 
 * basically tells in which Model belongs the variable $model
 * 
 * @var $model \app\model\User 
 * @var $this \app\core\View
 * 
 * */
$this->title = 'Login';

?>

<div class="container mt-3 mx-auto">
    <div class="row">
        <div class="col-lg-6 col-md-12 mx-auto">
            <h1>Login</h1>

            <?php $form = app\core\form\Form::begin('', "post") ?>

            <?php echo $form->field($model, 'email', 'text') ?>
            <?php echo $form->field($model, 'password', 'password') ?>

            <button type="submit" class="btn btn-primary">Login</button>

            <?php app\core\form\Form::end() ?>
        </div>
    </div>
</div>