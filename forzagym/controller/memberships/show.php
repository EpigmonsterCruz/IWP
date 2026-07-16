<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);

$membership = $db->getOne(
    "SELECT memberships.*, membership_plans.name as plan_name, membership_plans.price as plan_price, membership_plans.duration_days,
            CONCAT(clients.first_name, ' ', clients.last_name) as client_name, clients.email as client_email, clients.id as client_id
     FROM memberships
     JOIN clients ON memberships.client_id = clients.id
     JOIN membership_plans ON memberships.plan_id = membership_plans.id
     WHERE memberships.id = :id",
    ['id' => $id]
);

if (!$membership){
    abort();
}

view('memberships/show.view.php', [
    'heading' => 'Detalle de membresía',
    'membership' => $membership,
]);
