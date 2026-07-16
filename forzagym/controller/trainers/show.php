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

$classes = $db->getAll("SELECT * FROM classes WHERE trainer_id = :id ORDER BY schedule_time", ['id' => $id]);

view('trainers/show.view.php', [
    'heading' => 'Detalle de entrenador',
    'trainer' => $trainer,
    'classes' => $classes,
]);
