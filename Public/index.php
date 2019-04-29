<?php

require_once __DIR__ . "/../Boot/Autoloader.php";

use Components\Containers\Container;
use Components\Application\Application;

$app = Container::i()->make(Application::class, [], true);

// GO! GO! GO!
$app->start();
