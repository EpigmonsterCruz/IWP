<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);

$payment = $db->getOne(
    "SELECT payments.*, CONCAT(clients.first_name, ' ', clients.last_name) as client_name, clients.email as client_email,
            membership_plans.name as plan_name
     FROM payments
     JOIN clients ON payments.client_id = clients.id
     LEFT JOIN memberships ON payments.membership_id = memberships.id
     LEFT JOIN membership_plans ON memberships.plan_id = membership_plans.id
     WHERE payments.id = :id",
    ['id' => $id]
);

if (!$payment){
    abort();
}

view('payments/show.view.php', [
    'heading' => 'Detalle de pago',
    'payment' => $payment,
]);
