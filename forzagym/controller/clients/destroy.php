<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$client = $db->getOne("SELECT * FROM clients WHERE id = :id", ['id' => $id]);
if (!$client){
    abort();
}

$db->runQuery("DELETE FROM clients WHERE id = :id", ['id' => $id]);

header('location: ' . BASE_URL . '/clients?msg=deleted');
exit();
