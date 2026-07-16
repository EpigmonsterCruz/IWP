<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$client = $db->getOne("SELECT * FROM clients WHERE id = :id", ['id' => $id]);

if (!$client){
    abort();
}

$memberships = $db->getAll(
    "SELECT memberships.*, membership_plans.name as plan_name
     FROM memberships
     JOIN membership_plans ON memberships.plan_id = membership_plans.id
     WHERE memberships.client_id = :id
     ORDER BY memberships.start_date DESC",
    ['id' => $id]
);

view('clients/show.view.php', [
    'heading' => 'Detalle del cliente',
    'client' => $client,
    'memberships' => $memberships,
]);
