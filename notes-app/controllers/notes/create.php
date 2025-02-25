<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database'], $config['database']['username'], $config['database']['password']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'The note body of no more then 1000 characters is required';
  }


  if (empty($errors)) {
    $db->query('insert into notes (body, user_id) values (:body, :user_id)', [
      ':body' => $_POST['body'],
      ':user_id' => 3
    ]);
  }
}


view('notes/create.view.php', ['heading' => 'Create a new note', 'errors' => $errors]);
