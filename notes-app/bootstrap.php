<?php

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();

$container->bind('Core\Database', function () {
  $config = require base_path('config.php');

  return new Database($config['database'], $config['database']['username'], $config['database']['password']);
});

App::setContainer($container);
