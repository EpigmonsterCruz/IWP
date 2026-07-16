<?php
use Core\Database;

requireAuth();

$db = new Database($config);
$clients = $db->getAll("SELECT id, first_name, last_name FROM clients ORDER BY first_name");
$memberships = $db->getAll(
    "SELECT memberships.id, membership_plans.name as plan_name, CONCAT(clients.first_name, ' ', clients.last_name) as client_name
     FROM memberships
     JOIN clients ON memberships.client_id = clients.id
     JOIN membership_plans ON memberships.plan_id = membership_plans.id
     ORDER BY clients.first_name"
);

$payment = [];
$error = [];

view('payments/create.view.php', [
    'heading' => 'Nuevo pago',
    'error' => $error,
    'payment' => $payment,
    'clients' => $clients,
    'memberships' => $memberships,
]);
