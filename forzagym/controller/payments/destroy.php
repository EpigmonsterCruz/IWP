<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$payment = $db->getOne("SELECT * FROM payments WHERE id = :id", ['id' => $id]);
if (!$payment){
    abort();
}

$db->runQuery("DELETE FROM payments WHERE id = :id", ['id' => $id]);

header('location: ' . BASE_URL . '/payments?msg=deleted');
exit();
