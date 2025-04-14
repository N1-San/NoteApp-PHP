<?php

use Core\App;
use Core\Database;
// dd('show works');
$db = App::resolve(Database::class);

// dd('show works');
$currentUserId = 1;
// dd('show works');

// dd('working');
    $note = $db->query('select * from notes where id = :id', [
        // 'user' => 5,
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);


    // dd($notes);
    views('notes/show.view.php', [
        'heading' => 'Note',
        'note' => $note
    ]);
// }