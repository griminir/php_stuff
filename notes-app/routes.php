<?php

$router->get('/notes-app/', 'controllers/index.php');
$router->get('/notes-app/about', 'controllers/about.php');
$router->get('/notes-app/contact', 'controllers/contact.php');

$router->get('/notes-app/notes', 'controllers/notes/index.php');
$router->get('/notes-app/note', 'controllers/notes/show.php');
$router->delete('/notes-app/note', 'controllers/notes/destroy.php');

$router->get('/notes-app/notes/create', 'controllers/notes/create.php');
$router->post('/notes-app/notes', 'controllers/notes/store.php');
