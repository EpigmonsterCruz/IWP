<?php
use Core\Database;

$db = new Database($config);

$email = filter_input(INPUT_POST, 'email');
$password = $_POST['password'] ?? '';
$error = [];

$user = $db->getOne("SELECT * FROM users WHERE email = :email", ['email' => $email]);

if (!$user || !password_verify($password, $user['password'])){
    $error['login'] = 'Correo o contraseña incorrectos';

    view('auth/login.view.php', [
        'heading' => 'Iniciar sesión',
        'error' => $error,
        'old_email' => $email,
    ]);
    exit();
}

unset($user['password']);
$_SESSION['user'] = $user;

header('location: ' . BASE_URL . '/dashboard');
exit();
