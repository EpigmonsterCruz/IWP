<?php
use Core\Database;
use Core\Validator;

$db = new Database($config);
$staff = [];
$error = [];

$staff['first_name'] = filter_input(INPUT_POST, 'first_name');
if (!Validator::textVal($staff['first_name'], 1, 100)){
    $error['first_name'] = 'El nombre debe tener entre 1 y 100 caracteres';
}

$staff['last_name'] = filter_input(INPUT_POST, 'last_name');
if (!Validator::textVal($staff['last_name'], 1, 100)){
    $error['last_name'] = 'El apellido debe tener entre 1 y 100 caracteres';
}

$staff['email'] = filter_input(INPUT_POST, 'email');
if (!Validator::emailVal($staff['email'])){
    $error['email'] = 'Correo electrónico inválido';
} else {
    $existing = $db->getOne("SELECT id FROM users WHERE email = :email", ['email' => $staff['email']]);
    if ($existing){
        $error['email'] = 'Ya existe una cuenta con ese correo';
    }
}

$staff['role'] = filter_input(INPUT_POST, 'role');
if (!in_array($staff['role'], ['admin', 'receptionist'], true)){
    $error['role'] = 'Selecciona un rol válido';
}

$password = $_POST['password'] ?? '';
$passwordConfirm = $_POST['password_confirm'] ?? '';
if (!Validator::textVal($password, 6, 255)){
    $error['password'] = 'La contraseña debe tener al menos 6 caracteres';
} elseif (!Validator::equalsVal($password, $passwordConfirm)){
    $error['password_confirm'] = 'Las contraseñas no coinciden';
}

if (empty($error)){
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $userId = $db->insertData(
        "INSERT INTO users (first_name, last_name, email, password, role) VALUES (:first_name, :last_name, :email, :password, :role)",
        [
            'first_name' => $staff['first_name'],
            'last_name' => $staff['last_name'],
            'email' => $staff['email'],
            'password' => $hashed,
            'role' => $staff['role'],
        ]
    );

    $_SESSION['user'] = [
        'id' => $userId,
        'first_name' => $staff['first_name'],
        'last_name' => $staff['last_name'],
        'email' => $staff['email'],
        'role' => $staff['role'],
    ];

    header('location: ' . BASE_URL . '/dashboard');
    exit();
}

view('auth/register.view.php', [
    'heading' => 'Crear cuenta',
    'error' => $error,
    'staff' => $staff,
]);
