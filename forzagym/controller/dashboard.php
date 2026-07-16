<?php
use Core\Database;

requireAuth();

$db = new Database($config);

$activeClients = $db->getOne("SELECT COUNT(*) as total FROM clients WHERE status = 'active'")['total'];

$monthlyRevenue = $db->getOne(
    "SELECT COALESCE(SUM(amount),0) as total FROM payments
     WHERE MONTH(payment_date) = MONTH(CURDATE()) AND YEAR(payment_date) = YEAR(CURDATE())"
)['total'];

$totalClasses = $db->getOne("SELECT COUNT(*) as total FROM classes")['total'];

$expiringMemberships = $db->getOne(
    "SELECT COUNT(*) as total FROM memberships
     WHERE status = 'active' AND end_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 14 DAY)"
)['total'];

$todaySchedule = $db->getAll(
    "SELECT classes.name, classes.schedule_time, classes.location,
            CONCAT(trainers.first_name, ' ', trainers.last_name) as trainer_name
     FROM classes
     JOIN trainers ON classes.trainer_id = trainers.id
     ORDER BY classes.schedule_time ASC
     LIMIT 4"
);

$recentPayments = $db->getAll(
    "SELECT payments.amount, payments.payment_date, payments.method,
            CONCAT(clients.first_name, ' ', clients.last_name) as client_name
     FROM payments
     JOIN clients ON payments.client_id = clients.id
     ORDER BY payments.payment_date DESC
     LIMIT 4"
);

view('dashboard.view.php', [
    'heading' => 'Dashboard',
    'activeClients' => $activeClients,
    'monthlyRevenue' => $monthlyRevenue,
    'totalClasses' => $totalClasses,
    'expiringMemberships' => $expiringMemberships,
    'todaySchedule' => $todaySchedule,
    'recentPayments' => $recentPayments,
]);
