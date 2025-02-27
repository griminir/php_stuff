<?php

use Core\App;

$db = App::resolve('Core\Database');


$currentUserId = 3;

$note = $db->query('select * from notes where id = :id', [':id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] == $currentUserId);

$db->query('delete from notes where id = :id', [':id' => $_POST['id']]);

header('location: /notes-app/notes');
exit();
