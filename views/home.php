<?php

use app\core\Application;

?>
<h1>Home</h1>
<?php if (Application::$app->user) : ?>
<h2>Hello <?php echo Application::$app->user->getDisplayName() ?></h2>
<?php else : ?>
<h2>Register Now</h2>
<?php endif; ?>