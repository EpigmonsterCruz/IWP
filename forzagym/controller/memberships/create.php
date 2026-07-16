<?php
use Core\Database;

requireAuth();

$db = new Database($config);
$clients = $db->getAll("SELECT id, first_name, last_name FROM clients ORDER BY first_name");
$plans = $db->getAll("SELECT * FROM membership_plans ORDER BY price");

$membership = [];
$error = [];

view('memberships/create.view.php', [
    'heading' => 'Nueva membresía',
    'error' => $error,
    'membership' => $membership,
    'clients' => $clients,
    'plans' => $plans,
]);
