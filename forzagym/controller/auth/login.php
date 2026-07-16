<?php
if (currentUser()){
    header('location: ' . BASE_URL . '/dashboard');
    exit();
}

$error = [];

view('auth/login.view.php', [
    'heading' => 'Iniciar sesión',
    'error' => $error,
]);
