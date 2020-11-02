<?php

/** @var $this \app\core\View 
 * @var $model \app\model\ContactForm
 */
$this->title = 'Contact';

use app\core\form\Form;
use app\core\form\TextareaField;
?>


<div class="container mt-3 mx-auto">
    <div class="row">
        <div class="col-lg-6 col-md-12 mx-auto">
            <h1>Contact Us</h1>
            <?php $form = Form::begin('', 'post') ?>
            <?php echo $form->field($model, 'subject', 'text') ?>
            <?php echo $form->field($model, 'email', 'text') ?>
            <?php echo new TextareaField($model, 'body') ?>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php Form::end() ?>
        </div>
    </div>
</div>