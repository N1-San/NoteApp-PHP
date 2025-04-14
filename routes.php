<?php


//main pages routes
$router->get('/','controllers/index.php');
$router->get('/about','controllers/about.php');
$router->get('/contact','controllers/contact.php');

//notes listing routes
$router->get('/note','controllers/notes/show.php');
$router->get('/notes','controllers/notes/index.php')->only('auth');

//notes deletion routes
$router->delete('/note-delete', 'controllers/notes/destroy.php');


//notes creation routes
$router->get('/notes/create','controllers/notes/create.php');
$router->post('/notes-create','controllers/notes/store.php');

//notes update routes
$router->get('/note/edit','controllers/notes/edit.php');
$router->patch('/notes-update','controllers/notes/update.php');

//registration routes
$router->get('/register','/controllers/registration/create.php')->only('guest');
$router->post('/register-create','/controllers/registration/store.php');

//session routes
$router->get('/login','/controllers/sessions/create.php')->only('guest');
$router->post('/login-create','/controllers/sessions/store.php')->only('guest');

//this route is not working rightn now
$router->get('/logout','controllers/sessions/destroy.php');

$router->get('/test','controllers/test.php');
