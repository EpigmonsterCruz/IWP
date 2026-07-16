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

$error = [];

view('clients/edit.view.php', [
    'heading' => 'Editar cliente',
    'error' => $error,
    'client' => $client,
]);
