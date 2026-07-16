<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);
$payment = [];
$error = [];

$payment['client_id'] = filter_input(INPUT_POST, 'client_id');
if (!Validator::numberVal($payment['client_id'], 1, 11, false)){
    $error['client_id'] = 'Selecciona un cliente';
}

$membershipId = filter_input(INPUT_POST, 'membership_id');
$payment['membership_id'] = ($membershipId === '' || $membershipId === null) ? null : $membershipId;

$payment['amount'] = filter_input(INPUT_POST, 'amount');
if (!is_numeric($payment['amount']) || (float)$payment['amount'] <= 0){
    $error['amount'] = 'El monto debe ser un número mayor a 0';
}

$payment['payment_date'] = filter_input(INPUT_POST, 'payment_date');
if (!Validator::textVal($payment['payment_date'], 10, 10)){
    $error['payment_date'] = 'Selecciona una fecha de pago';
}

$payment['method'] = filter_input(INPUT_POST, 'method');
if (!in_array($payment['method'], ['Credit Card', 'Cash', 'Bank Transfer'], true)){
    $error['method'] = 'Selecciona un método de pago válido';
}

if (empty($error)){
    $db->insertData(
        "INSERT INTO payments (client_id, membership_id, amount, payment_date, method) VALUES (:client_id, :membership_id, :amount, :payment_date, :method)",
        $payment
    );

    header('location: ' . BASE_URL . '/payments?msg=created');
    exit();
}

$clients = $db->getAll("SELECT id, first_name, last_name FROM clients ORDER BY first_name");
$memberships = $db->getAll(
    "SELECT memberships.id, membership_plans.name as plan_name, CONCAT(clients.first_name, ' ', clients.last_name) as client_name
     FROM memberships
     JOIN clients ON memberships.client_id = clients.id
     JOIN membership_plans ON memberships.plan_id = membership_plans.id
     ORDER BY clients.first_name"
);

view('payments/create.view.php', [
    'heading' => 'Nuevo pago',
    'error' => $error,
    'payment' => $payment,
    'clients' => $clients,
    'memberships' => $memberships,
]);
