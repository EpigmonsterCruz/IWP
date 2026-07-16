<?php
requireAuth();

$client = [];
$error = [];

view('clients/create.view.php', [
    'heading' => 'Nuevo cliente',
    'error' => $error,
    'client' => $client,
]);
