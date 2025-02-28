<?php

use Core\App;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve('Core\Database');

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
  return view('session/create.view.php', ['errors' => $form->getErrors()]);
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
