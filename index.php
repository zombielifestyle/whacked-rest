<?php

require __DIR__.'/../whack/autoload.php';
$wire = require __DIR__.'/wire.php';

$Response = $wire->RestController->dispatch($_SERVER['REQUEST_URI']);
$Response->debug = true;
$Response->send();