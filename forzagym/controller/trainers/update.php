<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$existingTrainer = $db->getOne("SELECT * FROM trainers WHERE id = :id", ['id' => $id]);
if (!$existingTrainer){
    abort();
}

$trainer = [];
$error = [];
$trainer['id'] = $id;

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
    $duplicate = $db->getOne("SELECT id FROM trainers WHERE email = :email AND id != :id", ['email' => $trainer['email'], 'id' => $id]);
    if ($duplicate){
        $error['email'] = 'Ya existe otro entrenador con ese correo';
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
    $db->runQuery(
        "UPDATE trainers SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, specialization = :specialization WHERE id = :id",
        [
            'first_name' => $trainer['first_name'],
            'last_name' => $trainer['last_name'],
            'email' => $trainer['email'],
            'phone' => $trainer['phone'],
            'specialization' => $trainer['specialization'],
            'id' => $id,
        ]
    );

    header('location: ' . BASE_URL . '/trainers?msg=updated');
    exit();
}

view('trainers/edit.view.php', [
    'heading' => 'Editar entrenador',
    'error' => $error,
    'trainer' => $trainer,
]);
