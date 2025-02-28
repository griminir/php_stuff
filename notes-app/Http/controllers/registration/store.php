<?php

use Core\Validator;
use Core\App;
use Core\Authenticator;

$db = App::resolve('Core\Database');

$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
};

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Please provide a password between 7 and 255 characters';
};


if (!empty($errors)) {
  return view('registration/create.view.php', ['errors' => $errors]);
}



$user = $db->query('select email from users where email = :email', [':email' => $email])->find();


if ($user) {
  header('location: /notes-app/');
  die();
} else {
  $db->query('insert into users(email, password) values (:email, :password)', [':email' => $email, ':password' => password_hash($password, PASSWORD_BCRYPT)]);

  (new Authenticator())->login(['email' => $email]);

  header('location: /notes-app/');
  die();
}
