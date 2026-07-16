<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);
$membership = [];
$error = [];

$membership['client_id'] = filter_input(INPUT_POST, 'client_id');
if (!Validator::numberVal($membership['client_id'], 1, 11, false)){
    $error['client_id'] = 'Selecciona un cliente';
}

$membership['plan_id'] = filter_input(INPUT_POST, 'plan_id');
if (!Validator::numberVal($membership['plan_id'], 1, 11, false)){
    $error['plan_id'] = 'Selecciona un plan';
}

$membership['start_date'] = filter_input(INPUT_POST, 'start_date');
if (!Validator::textVal($membership['start_date'], 10, 10)){
    $error['start_date'] = 'Selecciona una fecha de inicio';
}

$membership['end_date'] = filter_input(INPUT_POST, 'end_date');
if (!Validator::textVal($membership['end_date'], 10, 10)){
    $error['end_date'] = 'Selecciona una fecha de vencimiento';
} elseif (empty($error['start_date']) && $membership['end_date'] <= $membership['start_date']){
    $error['end_date'] = 'La fecha de vencimiento debe ser posterior al inicio';
}

$membership['status'] = filter_input(INPUT_POST, 'status');
if (!in_array($membership['status'], ['active', 'expired', 'suspended'], true)){
    $error['status'] = 'Selecciona un estado válido';
}

if (empty($error)){
    $db->insertData(
        "INSERT INTO memberships (client_id, plan_id, start_date, end_date, status) VALUES (:client_id, :plan_id, :start_date, :end_date, :status)",
        $membership
    );

    header('location: ' . BASE_URL . '/memberships?msg=created');
    exit();
}

$clients = $db->getAll("SELECT id, first_name, last_name FROM clients ORDER BY first_name");
$plans = $db->getAll("SELECT * FROM membership_plans ORDER BY price");

view('memberships/create.view.php', [
    'heading' => 'Nueva membresía',
    'error' => $error,
    'membership' => $membership,
    'clients' => $clients,
    'plans' => $plans,
]);
