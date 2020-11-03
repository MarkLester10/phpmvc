<?php

/** @var $exception \Exception 
 * @var $this \app\core\View
 */
$this->title = $exception->getCode();
$this->subheading = $exception->getMessage();
$this->headerBg = "../assets/img/error.jpg";

?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">We are very sorry 😥</h1>
        <?php if ($exception->getCode() === 404) : ?>
        <p class="lead">We'll make sure that this won't happen again.</p>
        <a class="btn btn-dark p-3" href="/" role="button">Back to Home</a>
        <?php else : ?>
        <p class="lead"><?php echo $exception->getMessage() ?></p>
        <a class="btn btn-light p-3" href="/login" role="button">Login</a>
        <a class="btn btn-dark p-3" href="/register" role="button">Register</a>
        <?php endif; ?>
    </div>
</div>