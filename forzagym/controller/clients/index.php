<?php
use Core\Database;

requireAuth();

$search = filter_input(INPUT_GET, 'search');

if (!empty($search)){
    $sql = "SELECT * FROM clients WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search ORDER BY id DESC";
    $params = ['search' => "%$search%"];
} else {
    $sql = "SELECT * FROM clients ORDER BY id DESC";
    $params = [];
}

$db = new Database($config);
$clients = $db->getAll($sql, $params);

view('clients/index.view.php', [
    'heading' => 'Clientes',
    'clients' => $clients,
    'search' => $search,
]);
