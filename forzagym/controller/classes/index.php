<?php
use Core\Database;

requireAuth();

$db = new Database($config);

$classes = $db->getAll(
    "SELECT classes.*, CONCAT(trainers.first_name, ' ', trainers.last_name) as trainer_name,
            (SELECT COUNT(*) FROM class_enrollments WHERE class_enrollments.class_id = classes.id) as enrolled
     FROM classes
     JOIN trainers ON classes.trainer_id = trainers.id
     ORDER BY classes.schedule_time ASC"
);

view('classes/index.view.php', [
    'heading' => 'Clases y horarios',
    'classes' => $classes,
]);
