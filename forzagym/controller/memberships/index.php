<?php
use Core\Database;

requireAuth();

$db = new Database($config);

$memberships = $db->getAll(
    "SELECT memberships.*, membership_plans.name as plan_name, membership_plans.price as plan_price,
            CONCAT(clients.first_name, ' ', clients.last_name) as client_name
     FROM memberships
     JOIN clients ON memberships.client_id = clients.id
     JOIN membership_plans ON memberships.plan_id = membership_plans.id
     ORDER BY memberships.end_date ASC"
);

view('memberships/index.view.php', [
    'heading' => 'Membresías',
    'memberships' => $memberships,
]);
