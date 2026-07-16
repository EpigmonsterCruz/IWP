<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$existing = $db->getOne("SELECT * FROM classes WHERE id = :id", ['id' => $id]);
if (!$existing){
    abort();
}

$class = [];
$error = [];
$class['id'] = $id;

$class['name'] = filter_input(INPUT_POST, 'name');
if (!Validator::textVal($class['name'], 1, 150)){
    $error['name'] = 'El nombre debe tener entre 1 y 150 caracteres';
}

$class['trainer_id'] = filter_input(INPUT_POST, 'trainer_id');
if (!Validator::numberVal($class['trainer_id'], 1, 11, false)){
    $error['trainer_id'] = 'Selecciona un entrenador';
}

$class['location'] = filter_input(INPUT_POST, 'location');
if (!Validator::textVal($class['location'], 1, 150)){
    $error['location'] = 'Indica la sede o ubicación';
}

$class['schedule_time'] = filter_input(INPUT_POST, 'schedule_time');
if (!Validator::textVal($class['schedule_time'], 4, 5)){
    $error['schedule_time'] = 'Selecciona un horario';
}

$class['capacity'] = filter_input(INPUT_POST, 'capacity');
if (!Validator::numberVal($class['capacity'], 1, 3, false)){
    $error['capacity'] = 'La capacidad debe ser un número válido';
}

$class['price'] = filter_input(INPUT_POST, 'price');
if (!is_numeric($class['price']) || (float)$class['price'] < 0){
    $error['price'] = 'El precio debe ser un número válido';
}

if (empty($error)){
    $db->runQuery(
        "UPDATE classes SET name = :name, trainer_id = :trainer_id, location = :location, schedule_time = :schedule_time, capacity = :capacity, price = :price WHERE id = :id",
        [
            'name' => $class['name'],
            'trainer_id' => $class['trainer_id'],
            'location' => $class['location'],
            'schedule_time' => $class['schedule_time'],
            'capacity' => $class['capacity'],
            'price' => $class['price'],
            'id' => $id,
        ]
    );

    header('location: ' . BASE_URL . '/classes?msg=updated');
    exit();
}

$trainers = $db->getAll("SELECT id, first_name, last_name FROM trainers ORDER BY first_name");

view('classes/edit.view.php', [
    'heading' => 'Editar clase',
    'error' => $error,
    'class' => $class,
    'trainers' => $trainers,
]);
