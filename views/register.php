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
$this->headerBg = '../assets/img/register.jpg';
?>

<div class="row">
    <div class="col-lg-6 col-md-12 mx-auto">
        <?php $form = marklester\phpmvc\form\Form::begin('', "post") ?>

        <div class="row">
            <div class="col">
                <?php echo $form->field($model, 'firstname', 'text') ?>
            </div>
            <div class="col">
                <?php echo $form->field($model, 'lastname', 'text') ?>
            </div>
        </div>
        <?php echo $form->field($model, 'email', 'text') ?>
        <?php echo $form->field($model, 'password', 'password') ?>
        <?php echo $form->field($model, 'confirmPassword', 'password') ?>

        <button type="submit" class="btn btn-primary">Submit</button>

        <?php echo marklester\phpmvc\form\Form::end() ?>
    </div>
</div>