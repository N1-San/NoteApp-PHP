<?php

use Core\App;
use Core\Database;

// $config = require base_path('config.php');
// $db = new Database($config['database']);
$db = App::resolve(Database::class);

$currentUserId = 1;
// dd('destroy works');
// dd($_POST);
// dd($_SERVER);
$note = $db->query('select * from notes where id = :id', [
    // 'user' => 5,
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

//form was sumitted delete the current note.
$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();
