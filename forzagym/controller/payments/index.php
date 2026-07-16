<?php
use Core\Database;

requireAuth();

$db = new Database($config);

$payments = $db->getAll(
    "SELECT payments.*, CONCAT(clients.first_name, ' ', clients.last_name) as client_name
     FROM payments
     JOIN clients ON payments.client_id = clients.id
     ORDER BY payments.payment_date DESC"
);

view('payments/index.view.php', [
    'heading' => 'Pagos',
    'payments' => $payments,
]);
