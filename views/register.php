<div class="row">
    <div class="col-lg-6 col-md-12 mx-auto">
        <h1>Create an Account</h1>
        <?php $form = app\core\form\Form::begin('', "post") ?>

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

        <?php echo app\core\form\Form::end() ?>
    </div>
</div>