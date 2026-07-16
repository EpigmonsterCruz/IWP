<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$membership = $db->getOne("SELECT * FROM memberships WHERE id = :id", ['id' => $id]);
if (!$membership){
    abort();
}

$clients = $db->getAll("SELECT id, first_name, last_name FROM clients ORDER BY first_name");
$plans = $db->getAll("SELECT * FROM membership_plans ORDER BY price");
$error = [];

view('memberships/edit.view.php', [
    'heading' => 'Editar membresía',
    'error' => $error,
    'membership' => $membership,
    'clients' => $clients,
    'plans' => $plans,
]);
