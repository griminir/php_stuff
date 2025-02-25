<?php

// need to use define because of the use of a function in params
define('BASE_PATH', str_replace("\\", "/", __DIR__) . '/../');


require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {

  $class = str_replace('\\', '/', $class);

  require base_path("{$class}.php");
});


require base_path('Core/router.php');
