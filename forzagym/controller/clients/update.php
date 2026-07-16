<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$existingClient = $db->getOne("SELECT * FROM clients WHERE id = :id", ['id' => $id]);
if (!$existingClient){
    abort();
}

$client = [];
$error = [];
$client['id'] = $id;

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
    $duplicate = $db->getOne("SELECT id FROM clients WHERE email = :email AND id != :id", ['email' => $client['email'], 'id' => $id]);
    if ($duplicate){
        $error['email'] = 'Ya existe otro cliente con ese correo';
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
    $db->runQuery(
        "UPDATE clients SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, status = :status WHERE id = :id",
        [
            'first_name' => $client['first_name'],
            'last_name' => $client['last_name'],
            'email' => $client['email'],
            'phone' => $client['phone'],
            'status' => $client['status'],
            'id' => $id,
        ]
    );

    header('location: ' . BASE_URL . '/clients?msg=updated');
    exit();
}

view('clients/edit.view.php', [
    'heading' => 'Editar cliente',
    'error' => $error,
    'client' => $client,
]);
