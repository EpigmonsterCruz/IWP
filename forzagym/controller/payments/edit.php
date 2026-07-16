<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$payment = $db->getOne("SELECT * FROM payments WHERE id = :id", ['id' => $id]);
if (!$payment){
    abort();
}

$clients = $db->getAll("SELECT id, first_name, last_name FROM clients ORDER BY first_name");
$memberships = $db->getAll(
    "SELECT memberships.id, membership_plans.name as plan_name, CONCAT(clients.first_name, ' ', clients.last_name) as client_name
     FROM memberships
     JOIN clients ON memberships.client_id = clients.id
     JOIN membership_plans ON memberships.plan_id = membership_plans.id
     ORDER BY clients.first_name"
);
$error = [];

view('payments/edit.view.php', [
    'heading' => 'Editar pago',
    'error' => $error,
    'payment' => $payment,
    'clients' => $clients,
    'memberships' => $memberships,
]);
