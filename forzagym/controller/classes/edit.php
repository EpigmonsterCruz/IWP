<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$class = $db->getOne("SELECT * FROM classes WHERE id = :id", ['id' => $id]);
if (!$class){
    abort();
}

$trainers = $db->getAll("SELECT id, first_name, last_name FROM trainers ORDER BY first_name");
$error = [];

view('classes/edit.view.php', [
    'heading' => 'Editar clase',
    'error' => $error,
    'class' => $class,
    'trainers' => $trainers,
]);
