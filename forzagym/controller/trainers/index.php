<?php
use Core\Database;

requireAuth();

$db = new Database($config);
$trainers = $db->getAll(
    "SELECT trainers.*, (SELECT COUNT(*) FROM classes WHERE classes.trainer_id = trainers.id) as class_count
     FROM trainers
     ORDER BY first_name"
);

view('trainers/index.view.php', [
    'heading' => 'Entrenadores',
    'trainers' => $trainers,
]);
