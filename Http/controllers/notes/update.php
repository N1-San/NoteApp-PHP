<?php

// dd('update works');
// dd($_POST);
//find note
use Core\App;
use Core\Database;
use Core\Validator;

// dd('show works');
$db = App::resolve(Database::class);

// dd('show works');
$currentUserId = 1;
// dd('show works');

// dd('working');
$note = $db->query('select * from notes where id = :id', [
    // 'user' => 5,
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1000 characters is required!';
}
//

if (count($errors)) {
    return views('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'error' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);

header('location: /notes');
die();