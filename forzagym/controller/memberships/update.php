<?php
use Core\Database;
use Core\Validator;

requireAuth();

$db = new Database($config);

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$existing = $db->getOne("SELECT * FROM memberships WHERE id = :id", ['id' => $id]);
if (!$existing){
    abort();
}

$membership = [];
$error = [];
$membership['id'] = $id;

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
    $db->runQuery(
        "UPDATE memberships SET client_id = :client_id, plan_id = :plan_id, start_date = :start_date, end_date = :end_date, status = :status WHERE id = :id",
        [
            'client_id' => $membership['client_id'],
            'plan_id' => $membership['plan_id'],
            'start_date' => $membership['start_date'],
            'end_date' => $membership['end_date'],
            'status' => $membership['status'],
            'id' => $id,
        ]
    );

    header('location: ' . BASE_URL . '/memberships?msg=updated');
    exit();
}

$clients = $db->getAll("SELECT id, first_name, last_name FROM clients ORDER BY first_name");
$plans = $db->getAll("SELECT * FROM membership_plans ORDER BY price");

view('memberships/edit.view.php', [
    'heading' => 'Editar membresía',
    'error' => $error,
    'membership' => $membership,
    'clients' => $clients,
    'plans' => $plans,
]);
