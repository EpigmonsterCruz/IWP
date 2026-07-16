<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);
$trainer = [];
$error = [];

$trainer['first_name'] = filter_input(INPUT_POST, 'first_name');
if (!Validator::textVal($trainer['first_name'], 1, 100)){
    $error['first_name'] = 'El nombre debe tener entre 1 y 100 caracteres';
}

$trainer['last_name'] = filter_input(INPUT_POST, 'last_name');
if (!Validator::textVal($trainer['last_name'], 1, 100)){
    $error['last_name'] = 'El apellido debe tener entre 1 y 100 caracteres';
}

$trainer['email'] = filter_input(INPUT_POST, 'email');
if (!Validator::emailVal($trainer['email'])){
    $error['email'] = 'Correo electrónico inválido';
} else {
    $existing = $db->getOne("SELECT id FROM trainers WHERE email = :email", ['email' => $trainer['email']]);
    if ($existing){
        $error['email'] = 'Ya existe un entrenador con ese correo';
    }
}

$trainer['phone'] = filter_input(INPUT_POST, 'phone');
if (!Validator::textVal($trainer['phone'], 7, 20)){
    $error['phone'] = 'El teléfono debe tener entre 7 y 20 caracteres';
}

$trainer['specialization'] = filter_input(INPUT_POST, 'specialization');
if (!Validator::textVal($trainer['specialization'], 1, 150)){
    $error['specialization'] = 'Indica la especialización';
}

if (empty($error)){
    $db->insertData(
        "INSERT INTO trainers (first_name, last_name, email, phone, specialization) VALUES (:first_name, :last_name, :email, :phone, :specialization)",
        $trainer
    );

    header('location: ' . BASE_URL . '/trainers?msg=created');
    exit();
}

view('trainers/create.view.php', [
    'heading' => 'Nuevo entrenador',
    'error' => $error,
    'trainer' => $trainer,
]);
