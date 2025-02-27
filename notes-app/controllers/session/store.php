<?php

use Core\App;
use Core\Validator;

$db = App::resolve('Core\Database');

$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
};

if (!Validator::string($password)) {
  $errors['password'] = 'Please provide a valid password';
};


if (!empty($errors)) {
  return view('session/create.view.php', ['errors' => $errors]);
}

$user = $db->query('select * from users where email = :email', [':email' => $email])->find();

if ($user) {
  if (password_verify($password, $user['password'])) {
    login([
      'email' => $email
    ]);

    header('location: /notes-app/');
    die();
  }
}

return view('session/create.view.php', ['errors' => ['email' => 'No user found for that email address and password']]);
