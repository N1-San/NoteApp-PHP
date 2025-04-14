<?php


//main pages routes
$router->get('/','index.php');
$router->get('/about','about.php');
$router->get('/contact','contact.php');

//notes listing routes
$router->get('/note','notes/show.php');
$router->get('/notes','notes/index.php')->only('auth');

//notes deletion routes
$router->delete('/note-delete', 'notes/destroy.php');


//notes creation routes
$router->get('/notes/create','notes/create.php');
$router->post('/notes-create','notes/store.php');

//notes update routes
$router->get('/note/edit','notes/edit.php');
$router->patch('/notes-update','notes/update.php');

//registration routes
$router->get('/register','registration/create.php')->only('guest');
$router->post('/register-create','registration/store.php')->only('guest');

//session routes
$router->get('/login','sessions/create.php')->only('guest');
$router->post('/login-create','sessions/store.php')->only('guest');


$router->get('/logout','sessions/destroy.php')->only('auth');

$router->get('/test','test.php');
