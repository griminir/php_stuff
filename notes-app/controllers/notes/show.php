<?php

use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['database']['username'], $config['database']['password']);


$currentUserId = 3;


$note = $db->query('select * from notes where id = :id', [':id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] == $currentUserId);



view('notes/show.view.php', ['heading' => 'Note', 'note' => $note]);
