<?php

use Core\App;
use Core\Validator;

$db = App::resolve('Core\Database');
$currentUserId = 3;


$note = $db->query('select * from notes where id = :id', [':id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] == $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'The note body of no more then 1000 characters is required';
}

if (count($errors)) {
  return view('notes/edit.view.php', ['heading' => 'Edit Note', 'errors' =>  $errors, 'note' => $note]);
}

$db->query('update notes set body = :body where id = :id', [
  ':id' => $_POST['id'],
  ':body' => $_POST['body']
]);

header('location: /notes-app/notes');
die();
