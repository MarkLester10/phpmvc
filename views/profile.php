<?php

use app\core\Application;

?>

<div class="container mt-3 mx-auto">
    <div class="row">
        <div class="mx-auto">
            <?php if (Application::$app->user) : ?>
            <h1><?php Application::$app->user->getDisplayName() ?> Profile</h1>
            <?php endif; ?>

        </div>
    </div>
</div>