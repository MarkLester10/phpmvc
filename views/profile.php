<?php

/** @var $this \app\core\View */

use app\core\Application;

$this->title = 'Profile';
$this->subheading = 'Regularly update your information';
$this->headerBg = '../assets/img/profile.jpg';

?>

<div class="container mt-3 mx-auto">
    <div class="row">
        <div class="mx-auto">
            <h1><?php echo Application::$app->user->getDisplayName() ?></h1>
        </div>
    </div>
</div>