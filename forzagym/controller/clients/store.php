<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);
$client = [];
$error = [];

$client['first_name'] = filter_input(INPUT_POST, 'first_name');
if (!Validator::textVal($client['first_name'], 1, 100)){
    $error['first_name'] = 'El nombre debe tener entre 1 y 100 caracteres';
}

$client['last_name'] = filter_input(INPUT_POST, 'last_name');
if (!Validator::textVal($client['last_name'], 1, 100)){
    $error['last_name'] = 'El apellido debe tener entre 1 y 100 caracteres';
}

$client['email'] = filter_input(INPUT_POST, 'email');
if (!Validator::emailVal($client['email'])){
    $error['email'] = 'Correo electrónico inválido';
} else {
    $existing = $db->getOne("SELECT id FROM clients WHERE email = :email", ['email' => $client['email']]);
    if ($existing){
        $error['email'] = 'Ya existe un cliente con ese correo';
    }
}

$client['phone'] = filter_input(INPUT_POST, 'phone');
if (!Validator::textVal($client['phone'], 7, 20)){
    $error['phone'] = 'El teléfono debe tener entre 7 y 20 caracteres';
}

$client['status'] = filter_input(INPUT_POST, 'status');
if (!in_array($client['status'], ['active', 'expired', 'suspended'], true)){
    $error['status'] = 'Selecciona un estado válido';
}

if (empty($error)){
    $db->insertData(
        "INSERT INTO clients (first_name, last_name, email, phone, status) VALUES (:first_name, :last_name, :email, :phone, :status)",
        [
            'first_name' => $client['first_name'],
            'last_name' => $client['last_name'],
            'email' => $client['email'],
            'phone' => $client['phone'],
            'status' => $client['status'],
        ]
    );

    header('location: ' . BASE_URL . '/clients?msg=created');
    exit();
}

view('clients/create.view.php', [
    'heading' => 'Nuevo cliente',
    'error' => $error,
    'client' => $client,
]);
