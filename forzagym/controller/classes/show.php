<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);

$class = $db->getOne(
    "SELECT classes.*, CONCAT(trainers.first_name, ' ', trainers.last_name) as trainer_name
     FROM classes
     JOIN trainers ON classes.trainer_id = trainers.id
     WHERE classes.id = :id",
    ['id' => $id]
);

if (!$class){
    abort();
}

$enrolledClients = $db->getAll(
    "SELECT clients.id, clients.first_name, clients.last_name, class_enrollments.attendance
     FROM class_enrollments
     JOIN clients ON class_enrollments.client_id = clients.id
     WHERE class_enrollments.class_id = :id
     ORDER BY clients.first_name",
    ['id' => $id]
);

view('classes/show.view.php', [
    'heading' => 'Detalle de clase',
    'class' => $class,
    'enrolledClients' => $enrolledClients,
]);
