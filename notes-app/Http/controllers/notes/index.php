<?php

use Core\App;

$db = App::resolve('Core\Database');

$notes = $db->query('select * from notes where user_id = :user_id', [':user_id' => 3])->get();


view('notes/index.view.php', ['heading' => 'My Notes', 'notes' => $notes]);
