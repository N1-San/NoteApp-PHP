<?php

use Core\App;
use Core\Database;
use Core\Validator;

// dd("store email works");
// dd($_POST);

$db = App::resolve(Database::class);
$email = $_POST["email"];
$password = $_POST["password"];

//validate form

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email";
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a password of atleast 7 characters";
}

if (! empty($errors)) {
    return views('registration/create.view.php', [
        'errors' => $errors,
    ]);
}
// dd("store email works");

//check if email already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();
// dd("store email works");
// dd($result);

//if yes redirect to login page
if($user){
    header('location: /');
    exit();
} else{
    //if no save new user to database and redirect to login page
    $db->query('insert into users (email, password) values (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    
    login($user);
    
    header('location: /');
    exit();
}

 
 

//

