<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);
$class = [];
$error = [];

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
    $db->insertData(
        "INSERT INTO classes (name, trainer_id, location, schedule_time, capacity, price) VALUES (:name, :trainer_id, :location, :schedule_time, :capacity, :price)",
        $class
    );

    header('location: ' . BASE_URL . '/classes?msg=created');
    exit();
}

$trainers = $db->getAll("SELECT id, first_name, last_name FROM trainers ORDER BY first_name");

view('classes/create.view.php', [
    'heading' => 'Nueva clase',
    'error' => $error,
    'class' => $class,
    'trainers' => $trainers,
]);
