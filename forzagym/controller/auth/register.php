<?php
if (currentUser()){
    header('location: ' . BASE_URL . '/dashboard');
    exit();
}

$staff = [];
$error = [];

view('auth/register.view.php', [
    'heading' => 'Crear cuenta',
    'error' => $error,
    'staff' => $staff,
]);
