<?php
use Core\Database;

requireAuth();

$db = new Database($config);
$trainers = $db->getAll("SELECT id, first_name, last_name FROM trainers ORDER BY first_name");

$class = [];
$error = [];

view('classes/create.view.php', [
    'heading' => 'Nueva clase',
    'error' => $error,
    'class' => $class,
    'trainers' => $trainers,
]);
