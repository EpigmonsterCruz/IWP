<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$trainer = $db->getOne("SELECT * FROM trainers WHERE id = :id", ['id' => $id]);

if (!$trainer){
    abort();
}

$error = [];

view('trainers/edit.view.php', [
    'heading' => 'Editar entrenador',
    'error' => $error,
    'trainer' => $trainer,
]);
