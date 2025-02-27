<?php


use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
  $auth = new Authenticator;

  if ($auth->attempt($email, $password)) {
    redirect('/notes-app/');
  } else {
    $form->error('email', 'No user found for that email address and password');
  };
}

Session::flash('errors', $form->getErrors());
Session::flash('old', ['email' => $email]);

redirect('/notes-app/login');
