<?php
requireAuth();

$trainer = [];
$error = [];

view('trainers/create.view.php', [
    'heading' => 'Nuevo entrenador',
    'error' => $error,
    'trainer' => $trainer,
]);
